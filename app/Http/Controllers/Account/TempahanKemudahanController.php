<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantConvenienceRequest as ConvenienceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\State;
use App\Models\Area;
use App\Models\Convenience;
use App\Models\ConvenienceCategory;
use App\Models\ConvenienceSubCategory;
use App\Models\ConveniencePrice;
use App\Models\ApplicantConvenience;
use App\Models\Applicant;
use App\Models\HikingParticipant;
use App\Models\EcoPark;
use App\Models\ApplicantConveniencePeople;
use App\Models\ApplicantConvenienceUnit;
use App\Models\ApplicantConvenienceDeclaration;
use App\Models\UserLocation;
use Auth;
use PDF;
use Mail;
use DB;

class TempahanKemudahanController extends Controller
{
	public function index()
	{
		$data['states'] = State::get();
		$data['convenience_categories'] = ConvenienceCategory::get();

		return view('account.tempahankemudahan.index', $data);
	}

	public function store(ConvenienceRequest $request)
	{
		$getConvenience = 0;
		$participant    = 0;

		if($request->convenience_category == '2' OR $request->convenience_category == '3')
		{
			$getConvenience = Convenience::where([
				'state_id'    => $request->state,
				'area_id'     => $request->area,
				'eco_park_id' => $request->eco_park,
				'convenience_category_id' => $request->convenience_category
			])->first();

			$children = (!empty($request->children) ? $request->children : 0);
			$student = (!empty($request->student) ? $request->student : 0);
			$adult = (!empty($request->adult) ? $request->adult : 0);

			$participant = ($children+$student+$adult);
		}
		else
		{
			$getConvenience = Convenience::where([
				'state_id'    => $request->state,
				'area_id'     => $request->area,
				'eco_park_id' => $request->eco_park,
				'convenience_category_id' => $request->convenience_category
			])
			->whereHas('convenience_sub_category', function($q) use ($request){
				$q->where('id', $request->category);
			})
			->first();

			$participant = $request->unit;
		}

		$getApplicantConvenience = ApplicantConvenience::select(DB::raw('sum(participant) as total'))
													   ->where('convenience_id', $getConvenience->id)
													   ->whereRaw("DATE_FORMAT(starting_date, '%Y-%m-%d') = " . date('Y-m-d', strtotime(str_replace('/', '-', $request->starting_date))))
													   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d')"))
													   ->first();


		$useCapacity = 0;

		if(!empty($getApplicantConvenience))
		{
			$useCapacity = $getApplicantConvenience->total;
		}

		if($getConvenience->capacity >= ($participant+$useCapacity))
		{
			$applicantData = Applicant::whereRaw("date_format(created_at, '%Y-%m-%d') = date_format(now(), '%Y-%m-%d') && type = 'convenience'")->count();
			$number        = ($applicantData+1);

			$applicant          = new Applicant;
			$applicant->user_id = Auth::guard('applicant')->user()->id;
			$applicant->status  = 'processed';
			$applicant->type    = 'convenience';
			$applicant->amount  = $request->amount;
			$applicant->number  = 'TK' . date('dmY') . '-' . ($number < 10 ? '0' . $number : $number);

			if($applicant->save())
			{
				

				$convenience                          = new ApplicantConvenience;
				$convenience->state_id                = $request->state;
				$convenience->area_id                 = $request->area;
				$convenience->convenience_id          = $getConvenience->id;
				$convenience->starting_date           = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
				$convenience->ending_date             = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
				$convenience->days_total              = $request->day;
				$convenience->participant             = $participant;
				$convenience->amount                  = $request->amount;
				$convenience->applicant_id            = $applicant->id;
				$convenience->type                    = 'convenience';
				$convenience->eco_park_type           = $request->type;
				$convenience->eco_park_id             = $request->eco_park;
				$convenience->convenience_category_id = $request->convenience_category;
				$convenience->nationality             = (!empty($request->nationality) ? $request->nationality : 0);
				$convenience->save();

				if($request->convenience_category == '2' OR $request->convenience_category == '3')
				{
					$conveniencePeople                           = new ApplicantConveniencePeople;
					$conveniencePeople->applicant_convenience_id = $convenience->id;
					$conveniencePeople->person                   = 'children';
					$conveniencePeople->capacity                 = (!empty($request->children) ? $request->children : 0);
					$conveniencePeople->save();

					$conveniencePeople2                           = new ApplicantConveniencePeople;
					$conveniencePeople2->applicant_convenience_id = $convenience->id;
					$conveniencePeople2->person                   = 'student';
					$conveniencePeople2->capacity                 = (!empty($request->student) ? $request->student : 0);
					$conveniencePeople2->save();

					$conveniencePeople3                           = new ApplicantConveniencePeople;
					$conveniencePeople3->applicant_convenience_id = $convenience->id;
					$conveniencePeople3->person                   = 'adult';
					$conveniencePeople3->capacity                 = (!empty($request->adult) ? $request->adult : 0);
					$conveniencePeople3->save();
				}
				else
				{
					$convenienceUnit                              = new ApplicantConvenienceUnit;
					$convenienceUnit->applicant_convenience_id    = $convenience->id;
					$convenienceUnit->convenience_sub_category_id = $request->category;
					$convenienceUnit->save();
				}

				$declaration                   = new ApplicantConvenienceDeclaration;
				$declaration->name             = $request->declaration_name;
				$declaration->ic_number        = $request->declaration_ic;
				$declaration->application_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
				$declaration->applicant_convenience_id = $convenience->id;
				$declaration->save();

				$phd = UserLocation::where([
									'state_id' => $convenience->state_id,
									'area_id'  => $convenience->area_id
								 ])->first();
				$jpn = UserLocation::where([
									'state_id' => $convenience->state_id
								 ])->first();

				$mail_data = [
					'number' 		   => $applicant->number,
					'state'            => $convenience->state->name,
					'area'			   => $convenience->area->name,
					'email'            => $applicant->user->email,
					'application_date' => date('d/m/Y', strtotime($declaration->application_date)),
					'name'             => 'Tempahan Kemudahan',
					'starting_date'    => date('d/m/Y', strtotime($convenience->starting_date)),
					'ending_date'      => date('d/m/Y', strtotime($convenience->ending_date)),
					'day'              => $convenience->days_total,
					'place'            => $convenience->eco_park->name,
					'participant'      => $convenience->participant,
					'participant_type' => ((($request->convenience_category == '2') OR ($request->convenience_category == '3')) ? 'Peserta' : 'Unit'),
					'declaration_name' => $declaration->name,
					'declaration_ic'   => $declaration->ic_number,
					'declaration_date' => date('d/m/Y', strtotime($declaration->application_date)),
					'staff_name'	   => (!empty($phd) ? (!empty($phd->user->name) ? $phd->user->name : (!empty($jpn->user->name) ? $jpn->user->name : 'Pegawai Hutan Daerah')) : 'Pegawai Hutan Daerah')
				];

				$data['applicant'] = Applicant::find($applicant->id);
				$data['applicant_convenience']  = ApplicantConvenience::where('applicant_id', $applicant->id)->first();
				$checkPHD		   = UserLocation::where([
										'state_id' => $data['applicant_convenience']->state_id,
										'area_id'  => $data['applicant_convenience']->area_id
									 ])->first();

				$data['phd'] = UserLocation::where([
										'state_id' => $data['applicant_convenience']->state_id,
										'area_id'  => $data['applicant_convenience']->area_id
									 ])->first();
				$data['jpn'] = UserLocation::where([
										'state_id' => $data['applicant_convenience']->state_id
									 ])->first();


				view()->share($data);
				$pdf = PDF::loadView('account.tempahankemudahan.download')->save(public_path('files/convenience/attachment_' . $applicant->number . '.pdf'));

				$applicant['file'] = public_path('files/convenience/attachment_' . $applicant->number . '.pdf');

				// $data['applicant'] = Applicant::find($applicant->id);
				// $data['other']     = ApplicantOtherActivity::with(['permanent_forest', 'eco_park'])->where('applicant_id', $applicant->id)->first();
				// $data['states']    = State::get();
				// $data['areas']     = Area::where('state_id', $data['other']->state_id)->get();
				// $data['states']    = State::get();
				// $data['countries'] = Country::get();
				// $data['terlists']  = EcoPark::where('type', 'ter')->get();
				// $data['htnlists']  = EcoPark::where('type', 'htn')->get();
				// $data['hsklists']  = PermanentForest::get();
				// $data['phd'] = UserLocation::where([
				// 					'state_id' => $data['other']->state_id,
				// 					'area_id'  => $data['other']->area_id
				// 				 ])->first();
				// $data['jpn'] = UserLocation::where([
				// 					'state_id' => $data['other']->state_id
				// 				 ])->first();

				// view()->share($data);
				// $pdf = PDF::loadView('account.aktivitilain.download')->save(public_path('files/otheractivity/attachment_' . $applicant->number . '.pdf'));

				// $user['file'] = public_path('files/otheractivity/attachment_' . $applicant->number . '.pdf');

				$email = Mail::send('account.partials.email.tempahankemudahan', $mail_data , function ($mail) use ($applicant)
				{
					$mail->from('noreply@jpsm.com.my', 'JPSM e-Permit');
					$mail->to($applicant->user->email, $applicant->user->name);

					$mail->subject('Surat Permohonan Tempahan Kemudahan');
					$mail->attach($applicant->file);
				});
				
				$redirect = redirect('account/member-tempahan-kemudahan/'. $applicant->id .'/view');
			}
			else
			{
				$redirect = redirect(route('member-tempahan-kemudahan.index'))->with('status', 'failed');
			}
		}
		else
		{
			$redirect = redirect(route('member-tempahan-kemudahan.index'))->with('status', 'failed-capacity');
		}

		

		return $redirect;
	}

	public function edit($id)
	{
		$data['states']            = State::get();
		$data['applicant']         = Applicant::find($id);
		$data['convenience_data'] = ApplicantConvenience::where('applicant_id', $id)->first();
		$data['convenience_categories'] = ConvenienceCategory::get();
		$data['areas'] = Area::get();
		$data['ecoparks'] = EcoPark::where([
								'state_id' => $data['convenience_data']->state_id,
								'area_id'  => $data['convenience_data']->area_id,
								'type' => $data['convenience_data']->eco_park_type
							])->get();
		$data['subcategories'] = Convenience::where([
									'state_id' => $data['convenience_data']->state_id,
									'area_id' => $data['convenience_data']->area_id,
									'convenience_category_id' => $data['convenience_data']->convenience_category_id,
									'type' => $data['convenience_data']->eco_park_type,
									'eco_park_id' => $data['convenience_data']->eco_park_id
								 ])->get();
		$data['types'] = Convenience::select('type')
						->where([
							'state_id' => $data['convenience_data']->state_id,
							'area_id' => $data['convenience_data']->area_id
						])
						->groupBy('type')
						->get();
		$data['categories'] = Convenience::where([
								  'state_id' => $data['convenience_data']->state_id,
								  'area_id' => $data['convenience_data']->area_id,
								  'type' => $data['convenience_data']->eco_park_type,
								  'eco_park_id' => $data['convenience_data']->eco_park_id
							  ])
							  ->groupBy('convenience_category_id')
							  ->get();
		$data['slots'] = [];



		if($data['convenience_data']->convenience_category_id == '2' OR $data['convenience_data']->convenience_category_id == '3')
		{

			// $getConvenience = Convenience::where([
			// 	'state_id'    => $data['convenience_data']->state_id,
			// 	'area_id'     => $data['convenience_data']->area_id,
			// 	'eco_park_id' => $data['convenience_data']->eco_park_id,
			// 	'convenience_category_id' => $data['convenience_data']->convenience_category_id
			// ])->first();

			// $getApplicantConvenience = ApplicantConvenience::selectRaw("SUM(participant) as participant")
			// 											   ->whereRaw("convenience_id = ". $getConvenience->id ." AND DATE_FORMAT(starting_date, '%Y-%m-%d') = '" . date('Y-m-d', strtotime($data['convenience_data']->starting_date)) . "'")
			// 											   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d') "))
			// 											   ->first();
			// $slots = ($getConvenience->capacity-(!empty($getApplicantConvenience) ? $getApplicantConvenience->participant : 0));

			// echo $slots;
			// dd($getApplicantConvenience);
			// $data['slots'] = $slots;
		}
		else
		{
			$getConvenience = Convenience::where([
				'state_id'    => $data['convenience_data']->state_id,
				'area_id'     => $data['convenience_data']->area_id,
				'eco_park_id' => $data['convenience_data']->eco_park_id,
				'convenience_category_id' => $data['convenience_data']->convenience_category_id
			])->first();

			$getApplicantConvenience = ApplicantConvenience::selectRaw("SUM(participant) as participant")
														   ->whereRaw("convenience_id = ". $getConvenience->id ." AND DATE_FORMAT(starting_date, '%Y-%m-%d') = '" . date('Y-m-d', strtotime($data['convenience_data']->starting_date)) . "'")
														   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d') "))
														   ->first();
			$slots = ($getConvenience->capacity-(!empty($getApplicantConvenience) ? $getApplicantConvenience->participant : 0));

			$data['slots'] = $slots;
		}

		return view('account.tempahankemudahan.edit', $data);
	}

	public function update(ConvenienceRequest $request, $id)
	{
		$getConvenience = 0;
		$participant = 0;

		if($request->convenience_category == '2' OR $request->convenience_category == '3')
		{
			$getConvenience = Convenience::where([
				'state_id'    => $request->state,
				'area_id'     => $request->area,
				'eco_park_id' => $request->eco_park,
				'convenience_category_id' => $request->convenience_category
			])->first();

			$children = (!empty($request->children) ? $request->children : 0);
			$student = (!empty($request->student) ? $request->student : 0);
			$adult = (!empty($request->adult) ? $request->adult : 0);

			$participant = ($children+$student+$adult);
		}
		else
		{
			$getConvenience = Convenience::where([
				'state_id'    => $request->state,
				'area_id'     => $request->area,
				'eco_park_id' => $request->eco_park,
				'convenience_category_id' => $request->convenience_category
			])
			->whereHas('convenience_sub_category', function($q) use ($request){
				$q->where('id', $request->category);
			})
			->first();

			$participant = $request->unit;
		}

		$getApplicantConvenience = ApplicantConvenience::select(DB::raw('sum(participant) as total'))
													   ->where('convenience_id', $getConvenience->id)
													   ->whereRaw("DATE_FORMAT(starting_date, '%Y-%m-%d') = " . date('Y-m-d', strtotime(str_replace('/', '-', $request->starting_date))))
													   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d')"))
													   ->first();


		$useCapacity = 0;

		if(!empty($getApplicantConvenience))
		{
			$useCapacity = $getApplicantConvenience->total;
		}

		if($getConvenience->capacity >= ($participant+$useCapacity))
		{
			$applicantData = Applicant::whereRaw("date_format(created_at, '%Y-%m-%d') = date_format(now(), '%Y-%m-%d') && type = 'hiking'")->count();
			$number        = ($applicantData+1);

			$applicant          = Applicant::find($id);
			$applicant->user_id = Auth::guard('applicant')->user()->id;
			$applicant->type    = 'convenience';
			$applicant->amount  = $request->amount;

			if($applicant->save())
			{
				

				$convenience                          = ApplicantConvenience::where('applicant_id', $applicant->id)->first();
				$convenience->state_id                = $request->state;
				$convenience->area_id                 = $request->area;
				$convenience->convenience_id          = $getConvenience->id;
				$convenience->starting_date           = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
				$convenience->ending_date             = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
				$convenience->days_total              = $request->day;
				$convenience->participant             = $participant;
				$convenience->amount                  = $request->amount;
				$convenience->type                    = 'convenience';
				$convenience->eco_park_type           = $request->type;
				$convenience->eco_park_id             = $request->eco_park;
				$convenience->convenience_category_id = $request->convenience_category;
				$convenience->nationality             = (!empty($request->nationality) ? $request->nationality : 0);
				$convenience->save();

				if($request->convenience_category == '2' OR $request->convenience_category == '3')
				{
					$getPeople = ApplicantConveniencePeople::where('applicant_convenience_id', $convenience->id);
					$getPeople->forceDelete();

					$conveniencePeople                           = new ApplicantConveniencePeople;
					$conveniencePeople->applicant_convenience_id = $convenience->id;
					$conveniencePeople->person                   = 'children';
					$conveniencePeople->capacity                 = (!empty($request->children) ? $request->children : 0);
					$conveniencePeople->save();

					$conveniencePeople2                           = new ApplicantConveniencePeople;
					$conveniencePeople2->applicant_convenience_id = $convenience->id;
					$conveniencePeople2->person                   = 'student';
					$conveniencePeople2->capacity                 = (!empty($request->student) ? $request->student : 0);
					$conveniencePeople2->save();

					$conveniencePeople3                           = new ApplicantConveniencePeople;
					$conveniencePeople3->applicant_convenience_id = $convenience->id;
					$conveniencePeople3->person                   = 'adult';
					$conveniencePeople3->capacity                 = (!empty($request->adult) ? $request->adult : 0);
					$conveniencePeople3->save();
				}
				else
				{
					$getUnit = ApplicantConvenienceUnit::where('applicant_convenience_id', $convenience->id);
					$getUnit->forceDelete();

					$convenienceUnit                              = new ApplicantConvenienceUnit;
					$convenienceUnit->applicant_convenience_id    = $convenience->id;
					$convenienceUnit->convenience_sub_category_id = $request->category;
					$convenienceUnit->save();
				}

				$declaration                   = ApplicantConvenienceDeclaration::where('applicant_convenience_id', $convenience->id)->first();
				$declaration->name             = $request->declaration_name;
				$declaration->ic_number        = $request->declaration_ic;
				$declaration->application_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
				$declaration->applicant_convenience_id = $convenience->id;
				$declaration->save();
				
				$redirect = redirect('account/member-tempahan-kemudahan/'. $applicant->id .'/view');
			}
			else
			{
				$redirect = redirect('account/member-tempahan-kemudahan/'. $id .'/edit')->with('status', 'failed');
			}
		}
		else
		{
			$redirect = redirect('account/member-tempahan-kemudahan/'. $id .'/edit')->with('status', 'failed-capacity');
		}

		return $redirect;
	}

	public function setConvenience(Request $request)
	{
		$convenience = Convenience::where([
							'state_id' => $request->state_id,
							'eco_park_id' => $request->ecopark_id,
							'convenience_category_id' => $request->convenience_category_id,
							'convenience_sub_category_id' => (!empty($request->convenience_sub_category_id) ? $request->convenience_sub_category_id : 0)
					   ])->first();
		$price       = ConveniencePrice::where([
							'convenience_id' => $convenience->id,
							'price_category_id' => $request->price_category_id,
					   ])->first();
		$starting_date = $request->starting_date;
		$ending_date   = $request->ending_date;
		$participant   = $request->participant;
		$measurement   = $request->measurement;
		$amount        = $request->amount;

		$data = [
			'state_id'                    => $convenience->state_id,
			'state_name'                  => $convenience->state->name,
			'area_id'                     => $convenience->area_id,
			// 'area_name'                   => $convenience->area->name,
			'eco_park_id'				  => $convenience->ecoPark->id,
			'eco_park' 				      => $convenience->ecoPark->name,
			'convenience_id'              => $convenience->id,
			'convenience_category_id'     => $convenience->convenience_category_id,
			'convenience_category'        => $convenience->convenience_category->name,
			'convenience_sub_category_id' => $convenience->convenience_sub_category_id,
			'convenience_sub_category'    => (!empty($convenience->convenience_sub_category->name) ? $convenience->convenience_sub_category->name : ''),
			'convenience_price_id'        => $price->id,
			'starting_date'               => $starting_date,
			'ending_date'                 => $ending_date,
			'participant'                 => $participant,
			'measurement'                 => $measurement,
			'amount'                      => $amount, 
		];

		$html = '';
		$html .= '<tr class="convenience_data_table" id="cdt'. $data['convenience_id'] .'">';
		$html .= '	<td>'. $request->number;
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][state]" value="'. $data['state_id'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][area]" value="'. $data['area_id'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][starting_date]" value="'. $data['starting_date'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][ending_date]" value="'. $data['ending_date'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][days_total]" value="'. $data['measurement'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][participant]" value="'. $data['participant'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][amount]" value="'. $data['amount'] .'">';
		$html .= '	<input type="hidden" name="convenience['. $data['convenience_id'] .'][convenience_price_id]" value="'. $data['convenience_price_id'] .'">';
		$html .= '  </td>';
		$html .= '	<td>'. $data['state_name'] .'</td>';
		$html .= '	<td>'. $data['eco_park'] .'</td>';
		$html .= '	<td>'. $data['convenience_category'] . ' ' . $data['convenience_sub_category'] .'</td>';
		$html .= '	<td>'. $data['starting_date'] .'</td>';
		$html .= '	<td>'. $data['ending_date'] .'</td>';
		// $html .= '	<td>'. $data['participant'] .'</td>';
		$html .= '	<td>'. $data['measurement'] . ' ' . $convenience->capacity_category->name .'</td>';
		$html .= '	<td>'. $data['amount'] .'</td>';
		$html .= '	<td><a href="javascript:void(0)" data-id="'. $data['convenience_id'] .'" class="delete btn btn-danger btn-sm">Delete</a></td>';
		$html .= '</tr>';

		return $html;
	}

	public function findArea(Request $request)
	{
		$areas = Area::where('state_id', $request->state_id)->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($areas as $area)
		{
			$data[] = [
				'id' => $area->id,
				'text' => $area->name
			];
		}

		return response()->json($data);
	}

	public function findConvenience(Request $request)
	{
		$conveniences = Convenience::where([
							'state_id' => $request->state_id,
							'eco_park_id' => $request->ecopark_id
						])->get();

		$data[] = [
			'id' => '',
			'text' => '',
		];

		foreach($conveniences as $convenience)
		{
			$data[] = [
				'id' => $convenience->convenience_category->id,
				'text' => $convenience->convenience_category->name
			];
		}

		return response()->json($data);
	}

	public function getConvenienceCategory(Request $request)
	{
		$conveniences = Convenience::select('type')
						->where([
							'state_id' => $request->state_id,
							'area_id' => $request->area_id
						])
						->groupBy('type')
						->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($conveniences as $convenience)
		{
			$data[] = [
				'id' => $convenience->type,
				'text' => ($convenience->type == 'ter' ? 'Taman Eko-Rimba (TER)' : 'Hutan Taman Negeri (HTN)')
			];
		}

		return response()->json($data);
	}

	public function getConvenience(Request $request)
	{
		$conveniences = Convenience::where([
							'state_id' => $request->state_id,
							'area_id' => $request->area_id,
							'type' => $request->type,
							'eco_park_id' => $request->eco_park_id
						])
						->groupBy('convenience_category_id')
						->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($conveniences as $convenience)
		{
			$data[] = [
				'id' => $convenience->convenience_category->id,
				'text' => $convenience->convenience_category->name
			];
		}

		return response()->json($data);
	}

	public function findConvenienceSubCategory(Request $request)
	{
		$data['data'][]  	= [
								'id' => '',
								'text' => '',
							  ];
		$data['slots'][] = [];

		if($request->convenience_category_id == '2' OR $request->convenience_category_id == '3')
		{
			$convenience = Convenience::where([
							'state_id'                => $request->state_id,
							'area_id'                 => $request->area_id,
							'eco_park_id'             => $request->ecopark_id,
							'convenience_category_id' => $request->convenience_category_id
						])->first();

			$data['price'] 		= $convenience->price;
			$data['id'] 		= $request->convenience_category_id;

			$getConvenience = Convenience::where([
				'state_id'    => $request->state_id,
				'area_id'     => $request->area_id,
				'eco_park_id' => $request->ecopark_id,
				'convenience_category_id' => $request->convenience_category_id
			])->first();

			$getApplicantConvenience = ApplicantConvenience::selectRaw("SUM(participant) as participant")
														   ->whereRaw("convenience_id = ". $getConvenience->id ." AND DATE_FORMAT(starting_date, '%Y-%m-%d') = '" . date('Y-m-d', strtotime($request->starting_date)) . "'")
														   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d') "))
														   ->first();
			$slots = ($getConvenience->capacity-(!empty($getApplicantConvenience) ? $getApplicantConvenience->participant : 0));


			if($slots >= 1)
			{
				for($i = 1; $i <= $slots; $i++)
				{
					$data['slots'][] = [
						'id' => $i,
						'text' => $i
					];
				}
			}
		}
		else
		{
			$convenience = Convenience::where([
							'state_id'                => $request->state_id,
							'area_id'                 => $request->area_id,
							'eco_park_id'             => $request->ecopark_id,
							'convenience_category_id' => $request->convenience_category_id
						])->get();

			$data['id'] 		= $request->convenience_category_id;
			
			foreach($convenience as $conve)
			{
				$data['data'][] = [
					'id'   => $conve->convenience_sub_category->id,
					'text' => $conve->convenience_sub_category->name
				];
			}

			$getConvenience = Convenience::where([
				'state_id'    => $request->state_id,
				'area_id'     => $request->area_id,
				'eco_park_id' => $request->ecopark_id,
				'convenience_category_id' => $request->convenience_category_id
			])
			->whereHas('convenience_sub_category', function($q) use ($request){
				$q->where('id', $request->category);
			})
			->first();
		}


		return response()->json($data);
	}

	public function findPriceType(Request $request)
	{
		$data['slots'][] = [];
		
		$convenience = Convenience::where([
							'state_id'                => $request->state_id,
							'area_id'                 => $request->area_id,
							'eco_park_id'             => $request->ecopark_id,
							'convenience_category_id' => $request->convenience_category_id
						])
						->whereHas('convenience_sub_category', function($q) use ($request){
							$q->where('id', $request->convenience_sub_category_id);
						})
						->first();

		$getApplicantConvenience = ApplicantConvenience::selectRaw("SUM(participant) as participant")
														   ->whereRaw("convenience_id = ". $convenience->id ." AND DATE_FORMAT(starting_date, '%Y-%m-%d') = '". date('Y-m-d', strtotime(str_replace('/', '-', $request->starting_date))) ."'")
														   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d') "))
														   ->first();
		$participant = 0;
		if(!empty($getApplicantConvenience->participant))
		{
			$participant = $getApplicantConvenience->participant;
		}

		$slots = ($convenience->capacity-$participant);
		// print_r($getApplicantConvenience);
		// echo $slots;

		if($slots >= 1)
		{
			for($i = 1; $i <= $slots; $i++)
			{
				$data['slots'][] = [
					'id' => $i,
					'text' => $i
				];
			}
		}

		$data['price'] = $convenience->price;

		return response()->json($data);
	}

	public function findPrice(Request $request)
	{
		$convenience = Convenience::where([
							'state_id'                => $request->state_id,
							'area_id'                 => $request->area_id,
							'eco_park_id'             => $request->ecopark_id,
							'convenience_category_id' => $request->convenience_category_id
						])->first();

		print_r($convenience);
	}

	public function findEcoPark(Request $request)
	{
		$ecoparks = EcoPark::where([
						'state_id' => $request->state_id,
						'area_id'  => $request->area_id,
						'type' => $request->type
					])->get();

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

	public function review($id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['applicant_convenience']  = ApplicantConvenience::where('applicant_id', $id)->first();
		$checkPHD		   = UserLocation::where([
								'state_id' => $data['applicant_convenience']->state_id,
								'area_id'  => $data['applicant_convenience']->area_id
							 ])->first();

		$data['phd'] = UserLocation::where([
								'state_id' => $data['applicant_convenience']->state_id,
								'area_id'  => $data['applicant_convenience']->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['applicant_convenience']->state_id
							 ])->first();
		return view('account.tempahankemudahan.review', $data);
	}

	public function download($id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['applicant_convenience']  = ApplicantConvenience::where('applicant_id', $id)->first();
		$checkPHD		   = UserLocation::where([
								'state_id' => $data['applicant_convenience']->state_id,
								'area_id'  => $data['applicant_convenience']->area_id
							 ])->first();

		$data['phd'] = UserLocation::where([
								'state_id' => $data['applicant_convenience']->state_id,
								'area_id'  => $data['applicant_convenience']->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['applicant_convenience']->state_id
							 ])->first();


		view()->share($data);
		$pdf = PDF::loadView('account.tempahankemudahan.download');

		return $pdf->download('download_'. $data['applicant']->number .'.pdf');

		// return view('account.tempahankemudahan.download', $data);
	}


}