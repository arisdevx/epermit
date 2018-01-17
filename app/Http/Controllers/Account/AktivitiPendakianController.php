<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantHikingRequest as HikingRequest;
use App\Http\Requests\ApplicantHikingParticipantRequest as ParticipantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\State;
use App\Models\Area;
use App\Models\Mountain;
use App\Models\Applicant;
use App\Models\ApplicantConvenience;
use App\Models\HikingInformation;
use App\Models\HikingInsurance;
use App\Models\HikingBiodata;
use App\Models\HikingEmergency;
use App\Models\HikingHealth;
use App\Models\HikingHealthDetail;
use App\Models\HikingDeclaration;
use App\Models\HikingLocation;
use App\Models\HikingParticipant;
use App\Models\HikingCampground;
use App\Models\Convenience;
use App\Models\MountainCampground;
use App\Models\PermanentForest;
use App\Models\EcoPark;
use App\Models\ConvenienceCategory;
use App\Models\ApplicantConveniencePeople;
use App\Models\ApplicantConvenienceUnit;
use Auth;
use Mail;
use DB;

class AktivitiPendakianController extends Controller
{
	public function index()
	{
		$data['states'] = State::get();

		return view('account.aktivitipendakian.index', $data);
	}

	public function store(HikingRequest $request)
	{
		$getInformation = HikingInformation::select(DB::raw('SUM(participants_total) as participant, mountain_id'))
										   ->whereRaw("mountain_id = ". $request->mountain ." && DATE_FORMAT(starting_date, '%Y-%m-%d') = '". date('Y-m-d', strtotime(str_replace('/', '-', $request->starting_date))) ."'") // ->whereRaw("permanent_forest_id = ". $request->permanent_forest ." && mountain_id = ". $request->mountain ." && DATE_FORMAT(starting_date, '%Y-%m-%d') = '". date('Y-m-d', strtotime(str_replace('/', '-', $request->starting_date))) ."'")
										   ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d')"))
										   ->first();

		$participant = ((!empty($getInformation->participant) ? $getInformation->participant : 0)+$request->participant);

		$getCampground = MountainCampground::select(DB::raw("SUM(capacity) as capacity_total"))
										   ->where('mountain_id', $request->mountain)
										   ->groupBy('mountain_id')
										   ->first();
		$getMountain = Mountain::find($request->mountain);
		// $getForest = PermanentForest::find($request->permanent_forest);

		if(($getMountain->capacity == '0') OR ($getCampground->capacity_total >= $participant))
		{
			$amount_total 		= 0;
			$mountainData 		= Mountain::find($request->mountain);

			if(!empty($request->amount_convenience))
			{

				$amount_total = ($request->amount+$getForest->price+$request->amount_convenience);
			}
			else
			{
				$amount_total = ($request->amount);
			}

			$applicantData      = Applicant::whereRaw("date_format(created_at, '%Y-%m-%d') = date_format(now(), '%Y-%m-%d') && type = 'hiking'")->count();
			$number = ($applicantData+1);

			$applicant          = new Applicant;
			$applicant->user_id = Auth::guard('applicant')->user()->id;
			$applicant->status  = 'new';
			$applicant->type    = 'hiking';
			$applicant->amount  = $amount_total;
			$applicant->number  = 'AP' . date('dmY') . '-' . ($number < 10 ? '0' . $number : $number);

			if($applicant->save())
			{
				$applicantLocation               = new HikingLocation;
				$applicantLocation->state_id     = $request->state;
				$applicantLocation->area_id      = $request->area;
				$applicantLocation->applicant_id = $applicant->id;
				$applicantLocation->save();

				$applicantInformation                      = new HikingInformation;
				$applicantInformation->day                 = $request->day;
				$applicantInformation->permanent_forest_id = '';
				$applicantInformation->mountain_id         = $request->mountain;
				$applicantInformation->starting_date       = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
				$applicantInformation->starting_time       = date('Y-m-d H:i:s');
				$applicantInformation->ending_date         = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
				$applicantInformation->arrival_time        = date('Y-m-d H:i:s');
				$applicantInformation->mountain_guide      = $request->mountain_guide;
				$applicantInformation->participants_total  = $request->participant;
				$applicantInformation->amount              = $request->amount;
				$applicantInformation->applicant_id        = $applicant->id;
				$applicantInformation->save();

				$applicantBiodata               = new HikingBiodata;
				$applicantBiodata->fullname     = $request->hiker_fullname;
				$applicantBiodata->ic_number    = $request->hiker_ic;
				$applicantBiodata->birthday     = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->hiker_birthday)));
				$applicantBiodata->age          = $request->hiker_age;
				$applicantBiodata->gender       = $request->hiker_gender;
				$applicantBiodata->nationality  = (!empty($request->hiker_nationality) ? '1' : '0');
				$applicantBiodata->phone        = $request->hiker_phone;
				$applicantBiodata->address      = $request->hiker_address;
				$applicantBiodata->state        = $request->hiker_state;
				$applicantBiodata->postcode     = $request->hiker_postcode;
				$applicantBiodata->applicant_id = $applicant->id;
				$applicantBiodata->user_id      = Auth::guard('applicant')->user()->id;
				$applicantBiodata->hiking_participant_id = 0;
				$applicantBiodata->save();

				$applicantEmergency                 = new HikingEmergency;
				$applicantEmergency->name       = $request->emergency_fullname;
				$applicantEmergency->phone          = $request->emergency_phone;
				$applicantEmergency->address        = $request->emergency_address;
				$applicantEmergency->second_address = (!empty($request->emergency_second_address) ? $request->emergency_second_address : '');
				$applicantEmergency->state          = $request->emergency_state;
				$applicantEmergency->postcode       = $request->emergency_postcode;
				$applicantEmergency->applicant_id   = $applicant->id;
				$applicantEmergency->user_id 		= Auth::guard('applicant')->user()->id;
				$applicantEmergency->hiking_participant_id = 0;
				$applicantEmergency->save();

				$applicantInsurance               = new HikingInsurance;
				$applicantInsurance->name         = (!empty($request->insurance_name) ? $request->insurance_name : '');
				$applicantInsurance->code         = (!empty($request->insurance_code) ? $request->insurance_code : '');
				$applicantInsurance->applicant_id = $applicant->id;
				$applicantInsurance->user_id 	  = Auth::guard('applicant')->user()->id;
				$applicantInsurance->hiking_participant_id = 0;
				$applicantInsurance->save();

				$applicantDeclaration            = new HikingDeclaration;
				$applicantDeclaration->fullname  = $request->declaration_name;
				$applicantDeclaration->ic_number = $request->declaration_ic;
				$applicantDeclaration->date      = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
				$applicantDeclaration->applicant_id = $applicant->id;
				$applicantDeclaration->user_id 	 = Auth::guard('applicant')->user()->id;
				$applicantDeclaration->hiking_participant_id = 0;
				$applicantDeclaration->save();

				$applicantHealth               = new HikingHealth;
				$applicantHealth->applicant_id = $applicant->id;
				$applicantHealth->user_id 	   = Auth::guard('applicant')->user()->id;
				$applicantHealth->hiking_participant_id = 0;
				$applicantHealth->save();

				$order = 1;
				foreach($request->healthy as $key => $value)
				{
					$healthDetail                   = new HikingHealthDetail;
					$healthDetail->name             = $key;
					$healthDetail->detail           = '';
					$healthDetail->status           = (!empty($value['status']) ? $value['status'] : 'N');
					$healthDetail->notes            = (!empty($value['note']) ? $value['note'] : '-');
					$healthDetail->order            = $order;
					$healthDetail->hiking_health_id = $applicantHealth->id;
					$healthDetail->save();

					$order++;
				}

				// if(!empty($convenience_tables))
				// {
				// 	foreach($convenience_tables as $key => $value)
				// 	{
				// 		$convenience                 = new ApplicantConvenience;
				// 		$convenience->state_id       = $request->state;
				// 		$convenience->area_id        = $request->area;
				// 		$convenience->convenience_id = $key;
				// 		$convenience->starting_date  = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
				// 		$convenience->ending_date    = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
				// 		$convenience->participant    = $value['participant'];
				// 		$convenience->days_total     = $value['day'];
				// 		$convenience->amount         = $value['price'];
				// 		$convenience->applicant_id   = $applicant->id;
				// 		$convenience->type           = 'hiking';
				// 		$convenience->save();
				// 	}
				// }

				if(!empty($request->campground))
				{
					for($i = 1; $i <= count($request->campground); $i++)
					{
						$campground                         = new HikingCampground;
						$campground->applicant_id           = $applicant->id;
						$campground->mountain_campground_id = $request->campground[$i];
						$campground->day                 	= '0';
						$campground->status                 = '1';
						$campground->save();
					}
					// foreach($request->campground as $key => $value)
					// {
					// 	$campground                         = new HikingCampground;
					// 	$campground->applicant_id           = $applicant->id;
					// 	$campground->mountain_campground_id = $key;
					// 	$campground->day                 	= (!empty($value) ? $value : '0');
					// 	$campground->status                 = '1';
					// 	$campground->save();
					// }
				}

				$getConvenience = 0;
				$participant_convenience = 0;

				if(!empty($request->amount_convenience))
				{
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

						$participant_convenience = ($children+$student+$adult);
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

						$participant_convenience = $request->unit;
					}

					$convenience                          = new ApplicantConvenience;
					$convenience->state_id                = $request->state;
					$convenience->area_id                 = $request->area;
					$convenience->convenience_id          = $getConvenience->id;
					$convenience->starting_date           = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
					$convenience->ending_date             = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
					$convenience->days_total              = $request->day;
					$convenience->participant             = $participant_convenience;
					$convenience->amount                  = $request->amount_convenience;
					$convenience->applicant_id            = $applicant->id;
					$convenience->type                    = 'hiking';
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
				}

				$user = User::find(Auth::guard('applicant')->user()->id);

				$mail_data = [
						'url'	=> url(''),
						'logo'  => '',
						'full_name' => $user->name,
						'form' => url('form/hiking/' . $applicant->id)
				];

				$email = Mail::send('account.partials.email.aktivitipendakian', $mail_data , function ($mail) use ($user)
				{
					$mail->from('contact@arisdev.id', 'JPSM e-Permit');
					$mail->to($user->email, $user->name);

					$mail->subject('JPSM e-Permit: Aktiviti Pendakian');
				});

				return redirect(url('account/member-aktiviti-pendakian'))->with('status', 'success');
			}
			else
			{
				return redirect(url('account/member-aktiviti-pendakian'))->with('status', 'failed');
			}
		}
		else
		{
			return redirect(url('account/member-aktiviti-pendakian'))->with('status', 'failed-capacity');
		}
	}

	public function edit($id)
	{
		$data['applicant']			= Applicant::find($id);
		$data['states'] 			= State::get();
		$data['location'] 			= HikingLocation::where('applicant_id', $id)->first();
		$data['areas']  			= Area::where('state_id', $data['location']->state_id)->get();
		$data['information'] 		= HikingInformation::where('applicant_id', $id)->first();
		$data['forests']		    = PermanentForest::where([
										'state_id' => $data['location']->state_id,
										'area_id'  => $data['location']->area_id,
										])->get();

		$data['mountains'] 			= Mountain::where([
											'state_id' => $data['location']->state_id,
											'area_id'  => $data['location']->area_id,
											// 'permanent_forest_id' => $data['information']->permanent_forest_id
										])->get();
		

		$data['mountain_selected'] 	= Mountain::where('id', $data['information']->mountain_id)->first();
		$data['biodata']     		= HikingBiodata::where('applicant_id', $id)->first();
		$data['emergency']  		= HikingEmergency::where('applicant_id', $id)->first();
		$data['insurance'] 			= HikingInsurance::where('applicant_id', $id)->first();
		$data['declaration']		= HikingDeclaration::where('applicant_id', $id)->first();
		$data['conveniences'] 		= Convenience::where('area_id', $data['location']->area_id)->get();
		$data['convenience']		= ApplicantConvenience::where('applicant_id', $id)->get();
		$data['health']				= HikingHealth::where('applicant_id', $id)->first();
		$data['healthdetail']		= HikingHealthDetail::where('hiking_health_id', $data['health']->id);
		$data['campgrounds']		= HikingCampground::where('applicant_id', $id)->get();

		$data['convenience_data'] = ApplicantConvenience::where('applicant_id', $id)->first();

		if(!empty($data['convenience_data']))
		{
			$data['convenience_categories'] = ConvenienceCategory::get();
			$data['ecoparks'] = EcoPark::where([
											'state_id' => $data['convenience_data']->state_id,
											'area_id'  => $data['convenience_data']->area_id,
											'type'     => $data['convenience_data']->eco_park_type
										])->get();
			$data['subcategories'] = Convenience::where([
												'state_id'                => $data['convenience_data']->state_id,
												'area_id'                 => $data['convenience_data']->area_id,
												'convenience_category_id' => $data['convenience_data']->convenience_category_id,
												'type'                    => $data['convenience_data']->eco_park_type,
												'eco_park_id'             => $data['convenience_data']->eco_park_id
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
		}

		

		return view('account.aktivitipendakian.edit', $data);
	}

	public function update(HikingRequest $request, $id)
	{
		// $convenience_tables = $request->convenience_table;
		$convenience_price  = 0;
		$amount_total 		= 0;
		$mountainData = Mountain::find($request->mountain);

		if(!empty($request->amount_convenience))
		{

			$amount_total = ($request->amount+$mountainData->other_price+$request->amount_convenience);
		}
		else
		{
			$amount_total = ($request->amount+$mountainData->other_price);
		}

		$applicant          = Applicant::find($id);
		$applicant->user_id = Auth::guard('applicant')->user()->id;
		$applicant->type    = 'hiking';
		$applicant->amount  = $amount_total;

		if($applicant->save())
		{
			$applicantLocation               = HikingLocation::where('applicant_id', $id)->first();
			$applicantLocation->state_id     = $request->state;
			$applicantLocation->area_id      = $request->area;
			$applicantLocation->applicant_id = $applicant->id;
			$applicantLocation->save();

			$applicantInformation                     = HikingInformation::where('applicant_id', $id)->first();
			$applicantInformation->day                 = $request->day;
			$applicantInformation->permanent_forest_id = '';
			$applicantInformation->mountain_id         = $request->mountain;
			$applicantInformation->starting_date       = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
			$applicantInformation->starting_time       = date('Y-m-d H:i:s');
			$applicantInformation->ending_date         = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
			$applicantInformation->arrival_time        = date('Y-m-d H:i:s');
			$applicantInformation->mountain_guide      = $request->mountain_guide;
			$applicantInformation->participants_total  = $request->participant;
			$applicantInformation->amount              = $request->amount;
			$applicantInformation->applicant_id        = $applicant->id;
			$applicantInformation->save();

			$applicantBiodata               = HikingBiodata::where('applicant_id', $id)->first();
			$applicantBiodata->fullname     = $request->hiker_fullname;
			$applicantBiodata->ic_number    = $request->hiker_ic;
			$applicantBiodata->birthday     = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->hiker_birthday)));
			$applicantBiodata->age          = $request->hiker_age;
			$applicantBiodata->gender       = $request->hiker_gender;
			$applicantBiodata->nationality  = $request->hiker_nationality;
			$applicantBiodata->phone        = $request->hiker_phone;
			$applicantBiodata->address      = $request->hiker_address;
			$applicantBiodata->state        = $request->hiker_state;
			$applicantBiodata->postcode     = $request->hiker_postcode;
			$applicantBiodata->applicant_id = $applicant->id;
			$applicantBiodata->save();

			$applicantEmergency                 = HikingEmergency::where('applicant_id', $id)->first();
			$applicantEmergency->name       	= $request->emergency_fullname;
			$applicantEmergency->phone          = $request->emergency_phone;
			$applicantEmergency->address        = $request->emergency_address;
			$applicantEmergency->second_address = $request->emergency_second_address;
			$applicantEmergency->state          = $request->emergency_state;
			$applicantEmergency->postcode       = $request->emergency_postcode;
			$applicantEmergency->applicant_id   = $applicant->id;
			$applicantEmergency->save();

			$applicantInsurance               = HikingInsurance::where('applicant_id', $id)->first();
			$applicantInsurance->name         = $request->insurance_name;
			$applicantInsurance->code         = $request->insurance_code;
			$applicantInsurance->applicant_id = $applicant->id;
			$applicantInsurance->save();

			$applicantDeclaration            = HikingDeclaration::where('applicant_id', $id)->first();
			$applicantDeclaration->fullname  = $request->declaration_name;
			$applicantDeclaration->ic_number = $request->declaration_ic;
			$applicantDeclaration->date      = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
			$applicantDeclaration->applicant_id = $applicant->id;
			$applicantDeclaration->save();

			$applicantHealth               = HikingHealth::where('applicant_id', $id)->first();
			$applicantHealth->applicant_id = $applicant->id;
			$applicantHealth->save();

			$applicantHealthDetail = HikingHealthDetail::where('hiking_health_id', $applicantHealth->id);

			if($applicantHealthDetail->forceDelete())
			{
				$order = 1;
				foreach($request->healthy as $key => $value)
				{
					$healthDetail                   = new HikingHealthDetail;
					$healthDetail->name             = $key;
					$healthDetail->detail           = '';
					$healthDetail->status           = (!empty($value['status']) ? $value['status'] : 'N');
					$healthDetail->notes            = (!empty($value['note']) ? $value['note'] : '-');
					$healthDetail->order            = $order;
					$healthDetail->hiking_health_id = $applicantHealth->id;
					$healthDetail->save();

					$order++;
				}

				echo 'delete';
			}
			else
			{
				echo 'not delete';
			}

			if(!empty($request->amount_convenience))
			{
				$getConvenience = 0;
				$participant_convenience = 0;

				if($request->convenience_category == '2' OR $request->convenience_category == '3')
				{
					$getConvenience = Convenience::where([
						'state_id'                => $request->state,
						'area_id'                 => $request->area,
						'eco_park_id'             => $request->eco_park,
						'convenience_category_id' => $request->convenience_category
					])->first();

					$children = (!empty($request->children) ? $request->children : 0);
					$student  = (!empty($request->student) ? $request->student : 0);
					$adult    = (!empty($request->adult) ? $request->adult : 0);

					$participant_convenience = ($children+$student+$adult);
				}
				else
				{
					$getConvenience = Convenience::where([
						'state_id'                => $request->state,
						'area_id'                 => $request->area,
						'eco_park_id'             => $request->eco_park,
						'convenience_category_id' => $request->convenience_category
					])
					->whereHas('convenience_category', function($q) use ($request){
						$q->where('id', $request->category);
					})
					->first();

					$participant_convenience = $request->unit;
				}

				$convenience                          = ApplicantConvenience::where('applicant_id', $id)->first();
				$convenience->state_id                = $request->state;
				$convenience->area_id                 = $request->area;
				$convenience->convenience_id          = $getConvenience->id;
				$convenience->starting_date           = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
				$convenience->ending_date             = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
				$convenience->days_total              = $request->day;
				$convenience->participant             = $participant_convenience;
				$convenience->amount                  = $request->amount_convenience;
				$convenience->type                    = 'hiking';
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
			}

			// $applicantConvenience = ApplicantConvenience::where('applicant_id', $id);

			// if($applicantConvenience->forceDelete())
			// {
			// 	if(!empty($convenience_tables))
			// 	{
			// 		foreach($convenience_tables as $key => $value)
			// 		{
			// 			$convenience                 = new ApplicantConvenience;
			// 			$convenience->state_id       = $request->state;
			// 			$convenience->area_id        = $request->area;
			// 			$convenience->convenience_id = $key;
			// 			$convenience->starting_date  = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->starting_date)));
			// 			$convenience->ending_date    = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->ending_date)));
			// 			$convenience->participant    = $value['participant'];
			// 			$convenience->days_total     = $value['day'];
			// 			$convenience->amount         = $value['price'];
			// 			$convenience->applicant_id   = $applicant->id;
			// 			$convenience->type           = 'hiking';
			// 			$convenience->save();
			// 		}
			// 	}
			// }

			// if(!empty($request->campground))
			// {
			// 	$campground = HikingCampground::where('applicant_id', $id);
			// 	$campground->forceDelete();

			// 	foreach($request->campground as $key => $value)
			// 	{
			// 		$campground                         = new HikingCampground;
			// 		$campground->applicant_id           = $applicant->id;
			// 		$campground->mountain_campground_id = $key;
			// 		$campground->day                 	= (!empty($value) ? $value : '0');
			// 		$campground->status                 = '1';
			// 		$campground->save();
			// 	}
			// }

			return redirect(url('account/member-aktiviti-pendakian/'. $id .'/edit'))->with('status', 'success');
		}
		else
		{
			return redirect(url('account/member-aktiviti-pendakian/'. $id .'/edit'))->with('status', 'failed');
		}
	}

	public function findHsk(Request $request)
	{
		$forests = PermanentForest::where([
						'state_id' => $request->state_id,
						'area_id'  => $request->area_id
				   ])->get();
		$conveniences = Convenience::select('type')
						->where([
							'state_id' => $request->state_id,
							'area_id' => $request->area_id
						])
						->groupBy('type')
						->get();

		$data['convenience_type'][] = [
			'id' => '',
			'text' => ''
		];

		$data['hsk'][] = [
			'id' => '',
			'text' => ''
		];

		foreach($forests as $forest)
		{
			$data['hsk'][] = [
				'id' => $forest->id,
				'text' => $forest->name
			];
		}

		foreach($conveniences as $convenience)
		{
			$data['convenience_type'][] = [
				'id' => $convenience->type,
				'text' => ($convenience->type == 'ter' ? 'Taman Eko-Rimba (TER)' : 'Hutan Taman Negeri (HTN)')
			];
		}

		return response()->json($data);
	}

	public function findArea(Request $request)
	{
		$areas = Area::where('state_id', $request->id)->get();

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

	public function findMountain(Request $request)
	{
		$mountains = Mountain::where([
							'state_id' => $request->state_id,
							'area_id' => $request->area_id,
							// 'permanent_forest_id' => $request->forest_id
						])->get();
		
		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($mountains as $mountain)
		{
			$data[] = [
				'id' => $mountain->id,
				'text' => $mountain->name
			];
		}

		return response()->json($data);
	}

	public function findAmountMountain(Request $request)
	{
		$mountain = Mountain::find($request->id);
		$starting_date = date('Y-m-d', strtotime($request->starting_date));
		$days     = config('days');
		

		$html = '';

		if($mountain->campground == 'Y')
		{
			$campgrounds = MountainCampground::where('mountain_id', $mountain->id)->get();

			if(!$campgrounds->isEmpty())
			{

				for($i = 1; $i <= count($campgrounds); $i++)
				{
						$html .= '<tr>';
						$html .= ' <td width="20%">'. $days[$i] .'</td>';
						$html .= ' <td>';
						$html .= '		<select class="select2 form-control campground" name="campground['. $i .']" id="campground-'. $i .'" data-id="'. $i .'" style="width: 100%" data-placeholder="Pilih Tapak Perkhemahan">';
						$html .= '		<option></option>';
									foreach($campgrounds as $campground)
									{
						$html .= '		<option value="'. $campground->id .'" data-id="'. $i .'">'. $campground->name .'</option>';
									}
						$html .= ' 		</select>';
						$html .= ' </td>';
						// $html .= '	<td width="15%"></td>';
						// $html .= '	<td width="20%" align="center"><input type="number" class="form-control" name=""></td>';
						$html .= '</tr>';
				}

				// foreach($campgrounds as $campground)
				// {
				// 	$html .= '<tr>';
				// 	$html .= ' <td width="20%">'. $days[$i] .'</td>';
				// 	$html .= '	<td>'. $campground->name .'</td>';
				// 	// $html .= '	<td width="15%">'. $campground->capacity .'</td>';
				// 	$html .= '	<td width="20%" align="center"><input type="number" class="form-control" name="campground['. $campground->id .']"></td>';
				// 	$html .= '</tr>';
				// 	$i++;
				// }
			}
			else
			{
				$html .= '<tr>';
				$html .= '	<td colspan3>Ada</td>';
				// $html .= '	<td width="15%" colspan="2">'. (!empty($mountain->capacity) ? $mountain->capacity : '0') .'</td>';
				// $html .= '	<td></th>';
				$html .= '</tr>';
			}
		}
		else
		{
			$html .= '<tr>';
			$html .= '	<td colspan="3" align="center">Tiada</td>';
			$html .= '</tr>';
		}

		$data = [
			'campground' => $html,
			'amount' => $mountain->price
		];

		return response()->json($data);
	}

	public function findEndingDate(Request $request)
	{
		$mountain = Mountain::find($request->mountain_id);
		$nextDate = ($mountain->travel_day);

		$start_date = date('Y-m-d 00:00:00', strtotime(str_replace('/', '-', $request->starting_date)));
		$ending_date = date('d/m/Y', strtotime($start_date . '+' . $nextDate . ' day'));

		$startTimestamp = strtotime($start_date);
		$endingTimestamp = strtotime(str_replace('/', '-', $ending_date));
		$timeDiff = abs($endingTimestamp - $startTimestamp);
		$findDay = $timeDiff/86400;
		$numberDay = intval($findDay);

		$getHikingInformation = HikingInformation::selectRaw('SUM(participants_total) as participant')
												 ->where('mountain_id', $request->mountain_id)
												 ->whereRaw("DATE_FORMAT(starting_date, '%Y-%m-%d') = '" . date('Y-m-d', strtotime($start_date)) ."'")
												 ->groupBy(DB::raw("DATE_FORMAT(starting_date, '%Y-%m-%d')"))
												 ->first();

		$available_slots = ($mountain->capacity-(!empty($getHikingInformation->participant) ? $getHikingInformation->participant : 0));
		
		$data['ending_date'] = $ending_date;
		$data['day'] = $numberDay;
		$data['slots'][] = [];

		if($available_slots >= 1)
		{
			for($i = 1; $i <= $available_slots; $i++)
			{
				$data['slots'][] = [
					'id' => $i,
					'text' => $i
				];
			}
		}

		return response()->json($data);

	}

	public function findAmount(Request $request)
	{
		$mountain = Mountain::find($request->mountain_id);

		$amount = $mountain->price*$request->participant;

		return $amount;
	}

	public function findAmountConvenience(Request $request)
	{
		$convenience = Convenience::find($request->id);

		return $convenience->price;
	}

	public function addUser($applicant_id)
	{
		$data['applicant'] = Applicant::where('id', $applicant_id)->first();
		$data['participant'] = HikingParticipant::where([
								'applicant_id' => $applicant_id,
								'user_id' => Auth::guard('applicant')->user()->id
							   ])->first();

		return view('account.aktivitipendakian.adduser', $data);
	}

	public function addUserStore(ParticipantRequest $request, $id)
	{

		$applicantParticipant               = new HikingParticipant;
		$applicantParticipant->user_id      = Auth::guard('applicant')->user()->id;
		$applicantParticipant->applicant_id = $id;
		$applicantParticipant->save();

		$applicantBiodata               = new HikingBiodata;
		$applicantBiodata->fullname     = $request->hiker_fullname;
		$applicantBiodata->ic_number    = $request->hiker_ic;
		$applicantBiodata->birthday     = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->hiker_birthday)));
		$applicantBiodata->age          = $request->hiker_age;
		$applicantBiodata->gender       = $request->hiker_gender;
		$applicantBiodata->nationality  = $request->hiker_nationality;
		$applicantBiodata->phone        = $request->hiker_phone;
		$applicantBiodata->address      = $request->hiker_address;
		$applicantBiodata->state        = $request->hiker_state;
		$applicantBiodata->postcode     = $request->hiker_postcode;
		$applicantBiodata->applicant_id = $id;
		$applicantBiodata->user_id      = Auth::guard('applicant')->user()->id;
		$applicantBiodata->save();

		$applicantEmergency                 = new HikingEmergency;
		$applicantEmergency->name           = $request->emergency_fullname;
		$applicantEmergency->phone          = $request->emergency_phone;
		$applicantEmergency->address        = $request->emergency_address;
		$applicantEmergency->second_address = (!empty($request->emergency_second_address) ? $request->emergency_second_address : '');
		$applicantEmergency->state          = $request->emergency_state;
		$applicantEmergency->postcode       = $request->emergency_postcode;
		$applicantEmergency->applicant_id   = $id;
		$applicantEmergency->user_id        = Auth::guard('applicant')->user()->id;
		$applicantEmergency->save();

		$applicantInsurance               = new HikingInsurance;
		$applicantInsurance->name         = (!empty($request->insurance_name) ? $request->insurance_name : '');
		$applicantInsurance->code         = (!empty($request->insurance_code) ? $request->insurance_code : '');
		$applicantInsurance->applicant_id = $id;
		$applicantInsurance->user_id 	  = Auth::guard('applicant')->user()->id;
		$applicantInsurance->save();

		$applicantDeclaration               = new HikingDeclaration;
		$applicantDeclaration->fullname     = $request->declaration_name;
		$applicantDeclaration->ic_number    = $request->declaration_ic;
		$applicantDeclaration->date         = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
		$applicantDeclaration->applicant_id = $id;
		$applicantDeclaration->user_id      = Auth::guard('applicant')->user()->id;
		$applicantDeclaration->save();

		$applicantHealth               = new HikingHealth;
		$applicantHealth->applicant_id = $id;
		$applicantHealth->user_id 	   = Auth::guard('applicant')->user()->id;
		$applicantHealth->save();

		$order = 1;
		foreach($request->healthy as $key => $value)
		{
			$healthDetail                   = new HikingHealthDetail;
			$healthDetail->name             = $key;
			$healthDetail->detail           = '';
			$healthDetail->status           = (!empty($value['status']) ? $value['status'] : 'N');
			$healthDetail->notes            = (!empty($value['note']) ? $value['note'] : '-');
			$healthDetail->order            = $order;
			$healthDetail->hiking_health_id = $applicantHealth->id;
			$healthDetail->save();

			$order++;
		}

		return redirect(url('account/member-aktiviti-pendakian/'. $id .'/'. Auth::guard('applicant')->user()->id .'/edit'));
	}

	public function editUser($applicant_id, $user_id)
	{
		$data['applicant']			= Applicant::find($applicant_id);
		$data['biodata']     		= HikingBiodata::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $user_id
									  ])->first();
		$data['emergency']  		= HikingEmergency::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $user_id
									  ])->first();
		$data['insurance'] 			= HikingInsurance::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $user_id
									  ])->first();
		$data['declaration']		= HikingDeclaration::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $user_id
									  ])->first();
		$data['health']				= HikingHealth::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $user_id
									  ])->first();
		

		return view('account.aktivitipendakian.edituser', $data);
	}

	public function editUserUpdate(ParticipantRequest $request, $applicant_id, $user_id)
	{

		$applicantBiodata               = HikingBiodata::where(['applicant_id' => $applicant_id, 'hiking_participant_id' => $user_id])->first();
		$applicantBiodata->fullname     = $request->hiker_fullname;
		$applicantBiodata->ic_number    = $request->hiker_ic;
		$applicantBiodata->birthday     = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->hiker_birthday)));
		$applicantBiodata->age          = $request->hiker_age;
		$applicantBiodata->gender       = $request->hiker_gender;
		$applicantBiodata->nationality  = $request->hiker_nationality;
		$applicantBiodata->phone        = $request->hiker_phone;
		$applicantBiodata->address      = $request->hiker_address;
		$applicantBiodata->state        = $request->hiker_state;
		$applicantBiodata->postcode     = $request->hiker_postcode;
		$applicantBiodata->applicant_id = $applicant_id;
		$applicantBiodata->save();

		$applicantEmergency                 = HikingEmergency::where(['applicant_id' => $applicant_id, 'hiking_participant_id' => $user_id])->first();
		$applicantEmergency->name       = $request->emergency_fullname;
		$applicantEmergency->phone          = $request->emergency_phone;
		$applicantEmergency->address        = $request->emergency_address;
		$applicantEmergency->second_address = $request->emergency_second_address;
		$applicantEmergency->state          = $request->emergency_state;
		$applicantEmergency->postcode       = $request->emergency_postcode;
		$applicantEmergency->applicant_id   = $applicant_id;
		$applicantEmergency->save();

		$applicantInsurance               = HikingInsurance::where(['applicant_id' => $applicant_id, 'hiking_participant_id' => $user_id])->first();
		$applicantInsurance->name         = $request->insurance_name;
		$applicantInsurance->code         = $request->insurance_code;
		$applicantInsurance->applicant_id = $applicant_id;
		$applicantInsurance->save();

		$applicantDeclaration            = HikingDeclaration::where(['applicant_id' => $applicant_id, 'hiking_participant_id' => $user_id])->first();
		$applicantDeclaration->fullname  = $request->declaration_name;
		$applicantDeclaration->ic_number = $request->declaration_ic;
		$applicantDeclaration->date      = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
		$applicantDeclaration->applicant_id = $applicant_id;
		$applicantDeclaration->save();

		$applicantHealth               = HikingHealth::where(['applicant_id' => $applicant_id, 'hiking_participant_id' => $user_id])->first();
		$applicantHealth->applicant_id = $applicant_id;
		$applicantHealth->save();

		$applicantHealthDetail = HikingHealthDetail::where('hiking_health_id', $applicantHealth->id);

		if($applicantHealthDetail->forceDelete())
		{
			$order = 1;
			foreach($request->healthy as $key => $value)
			{
				$healthDetail                   = new HikingHealthDetail;
				$healthDetail->name             = $key;
				$healthDetail->detail           = '';
				$healthDetail->status           = (!empty($value['status']) ? $value['status'] : 'N');
				$healthDetail->notes            = (!empty($value['note']) ? $value['note'] : '-');
				$healthDetail->order            = $order;
				$healthDetail->hiking_health_id = $applicantHealth->id;
				$healthDetail->save();

				$order++;
			}
		}

		return redirect(url('account/member-aktiviti-pendakian/'. $applicant_id .'/'. $user_id .'/edit'))->with('status', 'success');
	}

	public function process($id)
	{
		$applicant = Applicant::find($id);
		$applicant->status = 'processed';
		$applicant->save();

		return redirect(url('account/member-application-status'))->with('status', 'success-processed');
		// Flash::success('Pemohonan anda telah dihantar');
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

	public function findConvenience(Request $request)
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
		}
		

		return response()->json($data);
	}

	public function findPriceType(Request $request)
	{
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

		$data['price'] = $convenience->price;

		return response()->json($data);
	}
}