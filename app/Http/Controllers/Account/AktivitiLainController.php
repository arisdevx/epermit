<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantOtherActivityRequest as ActivityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Applicant;
use App\Models\OthersActivity;
use App\Models\ApplicantOtherActivity;
use App\Models\ApplicantOtherActivityDetail;
use App\Models\ApplicantOtherActivityDeclaration;
use App\Models\State;
use App\Models\Area;
use App\Models\HikingParticipant;
use App\Models\EcoPark;
use App\Models\PermanentForest;
use Illuminate\Support\Facades\Storage;
use App\Models\Country;
use App\Models\UserLocation;
use App\Models\RegionalForestry;
use App\Models\Mountain;
use Auth;
use Mail;
use PDF;
use DB;

class AktivitiLainController extends Controller
{
	public function index(Request $request)
	{
		$data['states'] = State::orderBy('name', 'ASC')->get();
		$data['areas']  = Area::where('state_id', $request->old('state'))->get();
		$data['countries'] = Country::orderBy('name', 'ASC')->get();

		if($request->old('category') == 'hsk')
		{
			$places = PermanentForest::where([
							'state_id' => $request->old('state'),
							'area_id'  => $request->old('area')
					  ])->get();
		}
		else
		{
			$places = EcoPark::where([
							'state_id' => $request->old('state'),
							'area_id' => $request->old('area'),
							'type' => $request->old('category')
					  ])->get();

		}

		$data['places'] = $places;

		return view('account.aktivitilain.index', $data);
	}

	public function store(ActivityRequest $request)
	{
		$applicantData      = Applicant::whereRaw("date_format(created_at, '%Y-%m-%d') = date_format(now(), '%Y-%m-%d') && type = 'other'")->count();
		
		$number = ($applicantData+1);

		$applicant          = new Applicant;
		$applicant->user_id = Auth::guard('applicant')->user()->id;
		$applicant->status  = 'processed';
		$applicant->type    = 'other';
		$applicant->amount  = $request->amount;
		$applicant->number  = 'LA' . date('dmY') . '-' . ($number < 10 ? '0' . $number : $number);

		if($applicant->save())
		{
			$activity              = new ApplicantOtherActivity;
			$activity->state_id    = (!empty($request->state) ? $request->state : '');
			$activity->area_id     = (!empty($request->area) ? $request->area : '');
			$activity->type        = (!empty($request->category) ? $request->category : '');
			$activity->relation_id = (!empty($request->place) ? $request->place : '');
			$activity->location    = (!empty($request->location) ? $request->location : '');
			$activity->applicant_id = $applicant->id;
			$activity->amount 		= $request->amount;
			$activity->save();

			$participant_file = '';
			$tentative_program_file = '';

			if($request->hasFile('participant_file'))
			{
				$pf         =  $request->file('participant_file');
				$participant_file = time().'.'.$pf->getClientOriginalExtension();
				$path             = public_path('/files');
				$pf->move($path, $participant_file);
			}

			if($request->hasFile('program_file'))
			{
				$tpf                     =  $request->file('program_file');
				$tentative_program_file = time().'.'.$tpf->getClientOriginalExtension();
				$path                   = public_path('/files');
				$tpf->move($path, $tentative_program_file);
			}

			$detail                              = new ApplicantOtherActivityDetail;
			$detail->applicant_other_activity_id = $activity->id;
			$detail->name                        = (!empty($request->name) ? $request->name : '');
			$detail->agency                      = (!empty($request->agency) ? $request->agency : '');
			$detail->phone                       = (!empty($request->phone) ? $request->phone : '');
			$detail->email                       = (!empty($request->email) ? $request->email : '');
			$detail->fax                         = (!empty($request->fax) ? $request->fax : '');
			$detail->address 					 = (!empty($request->address) ? $request->address : '');
			$detail->postcode                    = (!empty($request->postcode) ? $request->postcode : '');
			$detail->bandar                      = (!empty($request->city) ? $request->city : '');
			$detail->state_id                    = (!empty($request->state_secondary) ? $request->state_secondary : '');
			$detail->country_id                  = (!empty($request->country) ? $request->country : '');
			$detail->starting_date               = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
			$detail->ending_date                 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
			$detail->description                 = (!empty($request->description) ? $request->description : '');
			$detail->participant_file			 = $participant_file;
			$detail->program_file 				 = $tentative_program_file;
			$detail->participant                 = (!empty($request->participant) ? $request->participant : '');
			$detail->day                         = (!empty($request->day) ? $request->day : '');
			$detail->save();

			$declaration                   = new ApplicantOtherActivityDeclaration;
			$declaration->name             = (!empty($request->declaration_name) ? $request->declaration_name : '');
			$declaration->ic_number        = (!empty($request->declaration_ic) ? $request->declaration_ic : '');
			$declaration->application_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
			$declaration->applicant_other_activity_id = $activity->id;
			$declaration->save();

			$user = User::find(Auth::guard('applicant')->user()->id);

			$phd = UserLocation::where([
								'state_id' => $activity->state_id,
								'area_id'  => $activity->area_id
							 ])->first();
			$jpn = UserLocation::where([
								'state_id' => $activity->state_id
							 ])->first();

			$mail_data = [
				'user'	=> $applicant->user,
				'number' =>	$applicant->number,
				'agency'           => $detail->agency,
				'address'          => $detail->address,
				'postcode'         => $detail->postcode,
				'city'             => $detail->bandar, 
				'state'            => (!empty($detail->state) ? $detail->state->name : ''),
				'country'          => (!empty($detail->country->name) ? ucwords(strtolower($detail->country->name)) : ''),
				'phone'            => $detail->phone,
				'fax'              => $detail->fax,
				'email'            => $detail->email,
				'application_date' => date('d/m/Y', strtotime($declaration->application_date)),
				'name'             => $detail->name,
				'starting_date'    => date('d/m/Y', strtotime($detail->starting_date)),
				'ending_date'      => date('d/m/Y', strtotime($detail->ending_date)),
				'day'              => $detail->day,
				'place'            => ($activity->type == 'hsk' ? (!empty($activity->permanent_forest->name) ? $activity->permanent_forest->name : '') : (!empty($activity->eco_park->name) ? $activity->eco_park->name : '')),
				'participant'      => $detail->participant,
				'description'      => $detail->description,
				'declaration_name' => $declaration->name,
				'declaration_ic'   => $declaration->ic_number,
				'declaration_date' => date('d/m/Y', strtotime($declaration->application_date)),
				'staff_name'	   => (!empty($phd) ? (!empty($phd->user->name) ? $phd->user->name : (!empty($jpn->user->name) ? $jpn->user->name : 'Pegawai Hutan Daerah')) : 'Pegawai Hutan Daerah'),
				'area' => $applicant->applicantOtherActivity->area->name,
				'state' => $applicant->applicantOtherActivity->state->name
			];

			$data['applicant'] = Applicant::find($applicant->id);
			$data['other']     = ApplicantOtherActivity::with(['permanent_forest', 'eco_park'])->where('applicant_id', $applicant->id)->first();
			$data['states']    = State::get();
			$data['areas']     = Area::where('state_id', $data['other']->state_id)->get();
			$data['states']    = State::get();
			$data['countries'] = Country::get();
			$data['terlists']  = EcoPark::where('type', 'ter')->get();
			$data['htnlists']  = EcoPark::where('type', 'htn')->get();
			$data['hsklists']  = PermanentForest::get();
			$data['phd'] = UserLocation::where([
								'state_id' => $data['other']->state_id,
								'area_id'  => $data['other']->area_id
							 ])->first();
			$data['jpn'] = UserLocation::where([
								'state_id' => $data['other']->state_id
							 ])->first();

			view()->share($data);
			$pdf = PDF::loadView('account.aktivitilain.download')->save(public_path('files/otheractivity/attachment_' . $applicant->number . '.pdf'));

			$user['file'] = public_path('files/otheractivity/attachment_' . $applicant->number . '.pdf');

			$email = Mail::send('account.partials.email.lainlainaktiviti', $mail_data , function ($mail) use ($user)
			{
				$mail->from(config('mail.from.address'), 'JPSM e-Permit');
				$mail->to($user->email, $user->name);

				$mail->subject('Surat Permohonan Lain-lain Aktiviti');
				$mail->attach($user->file);
			});
		}

		return redirect('account/member-aktiviti-lain/'. $applicant->id .'/view');
	}

	public function edit($id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['other']    = ApplicantOtherActivity::where('applicant_id', $id)->first();
		$data['states']    = State::orderBy('name', 'ASC')->get();
		$data['areas']	   = Area::where('state_id', $data['other']->state_id)->orderBy('name', 'ASC')->get();
		$data['states'] = State::orderBy('name', 'ASC')->get();
		$data['countries'] = Country::orderBy('name', 'ASC')->get();
		$data['terlists'] = EcoPark::where('type', 'ter')->orderBy('name', 'ASC')->get();
		$data['htnlists'] = EcoPark::where('type', 'htn')->orderBy('name', 'ASC')->get();
		$data['hsklists'] = PermanentForest::orderBy('name', 'ASC')->get();

		return view('account.aktivitilain.edit', $data);
	}

	public function update(ActivityRequest $request, $id)
	{
		$applicant          = Applicant::find($id);
		$applicant->user_id = Auth::guard('applicant')->user()->id;
		$applicant->type    = 'other';
		$applicant->amount  = $request->amount;

		if($applicant->save())
		{
			$activity              = ApplicantOtherActivity::where('applicant_id', $id)->first();
			$activity->state_id    = $request->state;
			$activity->area_id     = $request->area;
			$activity->type        = $request->category;
			$activity->relation_id = $request->place;
			$activity->location    = (!empty($request->location) ? $request->location : '');
			$activity->applicant_id = $applicant->id;
			$activity->amount 		= $request->amount;
			$activity->save();

			$detail                              = ApplicantOtherActivityDetail::where('applicant_other_activity_id', $activity->id)->first();

			if(!empty($request->participant_file))
			{
				if(file_exists(public_path('/files/' . $detail->participant_file)))
				{
					unlink(public_path('/files/' . $detail->participant_file));
				}
			}

			if(!empty($request->program_file))
			{
				if(file_exists(public_path('/files/' . $detail->program_file)))
				{
					unlink(public_path('/files/' . $detail->program_file));
				}
			}

			$participant_file = $detail->participant_file;
			$program_file     = $detail->program_file;


			if($request->hasFile('participant_file'))
			{
				$pf         =  $request->file('participant_file');
				$participant_file = time().'.'.$pf->getClientOriginalExtension();
				$path             = public_path('/files/');
				$pf->move($path, $participant_file);
			}

			if($request->hasFile('program_file'))
			{
				$tpf                     =  $request->file('program_file');
				$program_file = time().'.'.$tpf->getClientOriginalExtension();
				$path                   = public_path('/files/');
				$tpf->move($path, $program_file);
			}

			$detail->name                        = $request->name;
			$detail->agency                      = $request->agency;
			$detail->phone                       = $request->phone;
			$detail->email                       = $request->email;
			$detail->fax                         = $request->fax;
			$detail->address 					 = $request->address;
			$detail->postcode                    = $request->postcode;
			$detail->bandar                      = $request->city;
			$detail->state_id                    = (!empty($request->state_secondary) ? $request->state_secondary : '');
			$detail->country_id                  = $request->country;
			$detail->starting_date               = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
			$detail->ending_date                 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
			$detail->description                 = $request->description;
			$detail->participant_file			 = $participant_file;
			$detail->program_file 				 = $program_file;
			$detail->participant                 = $request->participant;
			$detail->day                         = $request->day;
			$detail->save();

			$declaration                              = ApplicantOtherActivityDeclaration::where('applicant_other_activity_id', $activity->id)->first();
			$declaration->name                        = $request->declaration_name;
			$declaration->ic_number                   = $request->declaration_ic;
			$declaration->application_date            = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
			$declaration->save();
		}

		return redirect('account/member-aktiviti-lain/'. $applicant->id .'/edit')->with('success', 'Anda Telah Berjaya Mengemaskini Permohonan Lain-lain Aktiviti');

	}

	public function findArea(Request $request)
	{
		$areas = Area::where('state_id', $request->id)->orderBy('name', 'ASC')->get();

		$data = '';
		$data .= '<option disabled selected value>Daerah</option>';

		foreach($areas as $area)
		{
			$data .= '<option value="'. $area->id .'">'. $area->name .'</option>';
		}

		return $data;
	}

	public function findActivity(Request $request)
	{
		$activities = OthersActivity::where([
					  		'state_id' => $request->state_id,
					  		'area_id' => $request->area_id
					  ])->orderBy('name', 'ASC')->get();

		$data = '';
		$data .= '<option disabled selected value>Kategori</option>';

		foreach($activities as $activity)
		{
			$data .= '<option value="'. $activity->id .'">'. $activity->name .'</option>';
		}

		return $data;
	}

	public function findActivityPrice(Request $request)
	{
		// $hsk = PermanentForest::find($request->id);

		// return $hsk->price;

		$mountain = Mountain::where([
								'state_id' => $request->state,
								'area_id'  => $request->area,
								'permanent_forest_id' => $request->id
							])->first();
		return (!empty($mountain) ? $mountain->price : 0);
	}

	public function findEcoPark(Request $request)
	{
		$ecoparks = EcoPark::where('state_id', $request->state_id)->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($ecoparks as $ecopark)
		{
			$data[] = [
				'id' => $ecopark->id,
				'text' => $ecopark->name
			];
		}

		return response()->json($data);
	}

	public function findPlace(Request $request)
	{
		$data = '';
		$data .= '<option disabled selected value>Tempat Aktiviti</option>';

		if($request->type == 'hsk')
		{
			$places = PermanentForest::where([
							'state_id' => $request->state_id,
							'area_id'  => $request->area_id
					  ])->get();

			foreach($places as $place)
			{
				$data .= '<option value="'. $place->id .'">'. $place->name .'</option>';
			}
		}
		else
		{
			$places = EcoPark::where([
							'state_id' => $request->state_id,
							'area_id' => $request->area_id,
							'type' => $request->type
					  ])->get();

			foreach($places as $place)
			{
				$data .= '<option value="'. $place->id .'">'. $place->name .'</option>';
			}
		}

		return $data;
	}

	public function viewActivity($id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['other']    = ApplicantOtherActivity::where('applicant_id', $id)->first();
		$data['states']    = State::get();
		$data['areas']	   = Area::where('state_id', $data['other']->state_id)->get();
		$data['states'] = State::get();
		$data['countries'] = Country::get();
		$data['terlists'] = EcoPark::where('type', 'ter')->get();
		$data['htnlists'] = EcoPark::where('type', 'htn')->get();
		$data['hsklists'] = PermanentForest::get();
		$data['phd'] = UserLocation::where([
								'state_id' => $data['other']->state_id,
								'area_id'  => $data['other']->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['other']->state_id
							 ])->first();

		$data['phd_data'] = RegionalForestry::where([
											'state_id' => $data['other']->state_id,
											'area_id' => $data['other']->area_id
									    ])
										->first();

		return view('account.aktivitilain.review', $data);
	}

	public function download($id)
	{
		
		$data['applicant'] = Applicant::find($id);
		$data['other']     = ApplicantOtherActivity::with(['permanent_forest', 'eco_park'])->where('applicant_id', $id)->first();
		$data['states']    = State::get();
		$data['areas']     = Area::where('state_id', $data['other']->state_id)->get();
		$data['states']    = State::get();
		$data['countries'] = Country::get();
		$data['terlists']  = EcoPark::where('type', 'ter')->get();
		$data['htnlists']  = EcoPark::where('type', 'htn')->get();
		$data['hsklists']  = PermanentForest::get();
		$checkPHD		   = UserLocation::where([
								'state_id' => $data['other']->state_id,
								'area_id'  => $data['other']->area_id
							 ])->first();

		$data['phd'] = UserLocation::where([
								'state_id' => $data['other']->state_id,
								'area_id'  => $data['other']->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['other']->state_id
							 ])->first();
		$data['phd_data'] = RegionalForestry::where([
											'state_id' => $data['other']->state_id,
											'area_id' => $data['other']->area_id
									    ])
										->first();


		view()->share($data);
		$pdf = PDF::loadView('account.aktivitilain.download');

		return $pdf->download('Lain Aktiviti ' . date('dmY') . '.pdf');

	}

	public function checkCapacity(Request $request)
	{
		$category      = $request->category;
		$place         = $request->place;
		$starting_date = $request->starting_date;

		$available = 0;
		$capacity = 0;

		$getApplicant = ApplicantOtherActivityDetail::selectRaw("SUM(participant) as participant")
													->whereRaw("DATE_FORMAT(starting_date, '%Y-%m-%d') = '" . date('Y-m-d', strtotime(str_replace('/', '-', $starting_date))) . "'")
													->whereHas('applicant_other_activity', function($q) use ($request){
														$q->where('type', $request->category);
														$q->where('relation_id', $request->place);
													})
													->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d')"))
													->first();

		

		if($category == 'ter' OR $category == 'htn')
		{
			$getEcoRimba = EcoPark::find($place);

			$capacity = ($getEcoRimba->capacity-(!empty($getApplicant) ? $getApplicant->participant : 0));
		}
		else
		{
			$getHSK = PermanentForest::find($place);
			$capacity = ($getHSK->capacity-(!empty($getApplicant) ? $getApplicant->participant : 0));
		}

		$data[] = [];

		for($i = 1; $i <= $capacity; $i++)
		{
			$data[] = [
				'id' => $i,
				'text' => $i
			];
		}

		return response()->json($data);
	} 
}