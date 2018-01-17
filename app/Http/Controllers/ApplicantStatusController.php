<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
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
use App\Models\Convenience;
use App\Models\ApplicantOtherActivity;
use App\Models\RegionalForestry;
use Flash;
use Validator;
use Log;
use Mail;
use PDF;

class ApplicantStatusController extends Controller
{
	public function index(Request $request)
	{
		if(auth()->user()->hasRole(['super', 'admin']))
		{
			$data['statuses'] = Applicant::with('applicantOtherActivity')->where('status', '!=', 'new')
										 ->where(function($q) use ($request){

										 	if(!empty($request->status))
										 	{
										 		$q->where('status', '=', $request->status);
										 	}
										 	if(!empty($request->type))
										 	{
										 		$q->where('type', '=', $request->type);
										 	}
										 	
										 })
										 ->whereHas('user.profile', function($q) use ($request){
										 	if(!empty($request->ic))
										 	{
										 		$q->where('nokp', $request->ic);
										 		$q->orWhere('passport', $request->ic);
										 	}
										 })
										 ->orderBy('created_at', 'DESC')
										 ->paginate(10);

			// if(!empty($request->ic))
			// {
			// 	$data['statuses']->whereHas('user.profile', function($q) use($request){
			// 		$q->where('nokp', $request->ic);
			// 		$q->orWhere('passport', $request->ic);
			// 	});
			// }
			// elseif(!empty($request->status))
			// {
			// 	$data['statuses']->where('status', $request->status);
			// }
			// elseif(!empty($request->type))
			// {
			// 	$data['statuses']->where('type', $request->type);
			// }


		}
		elseif(auth()->user()->hasRole(['jabatan_perhutanan_negeri']))
		{
			$data['statuses'] = Applicant::where(function($q) use ($request){

								 	if(!empty($request->status))
								 	{
								 		$q->where('status', '=', $request->status);
								 	}
								 	if(!empty($request->type))
								 	{
								 		$q->where('type', '=', $request->type);
								 	}
								 	
								})
								->WhereHas('applicantConvenience', function($q){
									$q->where('state_id', auth()->user()->userLocation->state_id);
								})
								->orWhereHas('applicantOtherActivity', function($q){
									$q->where('state_id', auth()->user()->userLocation->state_id);
								})
								->orWhereHas('hikingLocation', function($q){
									$q->where('state_id', auth()->user()->userLocation->state_id);
								})
								->where(function($q) use ($request){

								 	if(!empty($request->status))
								 	{
								 		$q->where('status', '=', $request->status);
								 	}
								 	if(!empty($request->type))
								 	{
								 		$q->where('type', '=', $request->type);
								 	}
								 	
								 })
								->where('status', '!=', 'new')
								->orderBy('created_at', 'DESC')
								->paginate(10);
		}
		else
		{
			$data['statuses'] = Applicant::where(function($q) use ($request){

								 	if(!empty($request->status))
								 	{
								 		$q->where('status', '=', $request->status);
								 	}
								 	if(!empty($request->type))
								 	{
								 		$q->where('type', '=', $request->type);
								 	}
								 	
								 })
								->WhereHas('applicantConvenience', function($q){
									$q->where('state_id', auth()->user()->userLocation->state_id);
									$q->where('area_id', auth()->user()->userLocation->area_id);
								})
								->orWhereHas('applicantOtherActivity', function($q){
									$q->where('state_id', auth()->user()->userLocation->state_id);
									$q->where('area_id', auth()->user()->userLocation->area_id);
								})
								->orWhereHas('hikingLocation', function($q){
									$q->where('state_id', auth()->user()->userLocation->state_id);
									$q->where('area_id', auth()->user()->userLocation->area_id);
								})
								->where('status', '!=', 'new')
								->orderBy('created_at', 'DESC')
								->paginate(10);
		}

		return view('applicantstatus.index', $data);
	}

	public function edit($id)
	{
		$data['applicant'] = Applicant::find($id);
		return view('applicantstatus.form', $data);
	}

	public function update(Request $request, $id)
	{
		$applicant = Applicant::find($id);
		$applicant->receipt_number = $request->receipt;
		$applicant->status = 'finished';

		if($applicant->save())
		{
			activityLog('Status Permohonan Selesai');

			$type         = '';
			$place        = '';
			$otherecopark = '';
			$price        = '';
			$participant  = '';
			$amount       = '';
			$other_price  = '';
			$activity_date = date('d/m/Y');
			$starting_date = date('d/m/Y');
			$ending_date = date('d/m/Y');
			$phd_name = '';
			$phd_address = '';
			$phd_phone = '';
			$phd_fax = '';
			$phd_email = '';

			if($applicant->type == 'hiking')
			{
				$type = 'Aktiviti Pendakian';
				$place = (!empty($applicant->hikingInformation->permanent_forest->name) ? $applicant->hikingInformation->permanent_forest->name : '');
				$price        = $applicant->hikingInformation->mountain->price;
				$participant  = $applicant->hikingInformation->participants_total;
				$amount       = $applicant->amount;
				$other_price  = 0; //$applicant->hikingInformation->permanent_forest->price;
				$activity_date= date('d/m/Y', strtotime($applicant->hikingDeclaration->date));
				$starting_date = date('d/m/Y', strtotime($applicant->hikingInformation->starting_date));
				$ending_date = date('d/m/Y', strtotime($applicant->hikingInformation->ending_date));
			
				$phd = RegionalForestry::where([
											'state_id' => $applicant->hikingLocation->state_id,
											'area_id' => $applicant->hikingLocation->area_id
									    ])
										->first();
				$phd_name = $phd->name;
				$phd_address = $phd->address;
				$phd_phone = $phd->phone;
				$phd_fax = $phd->fax;
				$phd_email = $phd->email;
			}
			elseif($applicant->type == 'other')
			{
				$type = 'Lain-lain Aktiviti';
				
				if($applicant->applicantOtherActivity->type == 'hsk'){
                    $place = (!empty($applicant->applicantOtherActivity->permanent_forest->name) ? $applicant->applicantOtherActivity->permanent_forest->name : '');
				}else{
					$otherecopark = 'true';
                    $place = (!empty($applicant->applicantOtherActivity->eco_park->name) ? $applicant->applicantOtherActivity->eco_park->name : '');
				}

				$price        = $applicant->applicantOtherActivity->permanent_forest->price;
				$participant  = $applicant->applicantOtherActivity->applicant_other_activity_detail->participant;
				$amount       = $applicant->amount;
				$activity_date= date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_declaration->application_date));
				$starting_date = date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_detail->starting_date));
				$ending_date = date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_detail->ending_date));
			
				$phd = RegionalForestry::where([
											'state_id' => $applicant->applicantOtherActivity->state_id,
											'area_id' => $applicant->applicantOtherActivity->area_id
									    ])
										->first();
				$phd_name = $phd->name;
				$phd_address = $phd->address;
				$phd_phone = $phd->phone;
				$phd_fax = $phd->fax;
				$phd_email = $phd->email;
			}
			elseif($applicant->type == 'convenience')
			{
				$type = 'Tempahan Kemudahan';
				$price = $applicant->applicantConvenience->convenience->price;
				$participant = $applicant->applicantConvenience->participant;
				$amount  = $applicant->amount;
				$activity_date= date('d/m/Y', strtotime($applicant->applicantConvenience->applicant_convenience_declaration->application_date));
				$starting_date = date('d/m/Y', strtotime($applicant->applicantConvenience->starting_date));
				$ending_date = date('d/m/Y', strtotime($applicant->applicantConvenience->ending_date));
			
				$phd = RegionalForestry::where([
											'state_id' => $applicant->applicantConvenience->state_id,
											'area_id' => $applicant->applicantConvenience->area_id
									    ])
										->first();
				$phd_name = $phd->name;
				$phd_address = $phd->address;
				$phd_phone = $phd->phone;
				$phd_fax = $phd->fax;
				$phd_email = $phd->email;
			}

			$email_data = [
				'applicant' => $applicant,
				'number' => $applicant->number,
				'date' => date('d/m/Y', strtotime($applicant->created_at)),
				'type' => $type,
				'place' => $place,
				'status' => 'Selesai',
				'price' => $price,
				'participant' => $participant,
				'amount' => $amount,
				'ecopark' => $otherecopark,
				'other_price' => $other_price,
				'activity_date' => $activity_date,
				'starting_date' => $starting_date,
				'ending_date' => $ending_date,
				'receipt' => $request->receipt,
				'phd_name' => $phd_name,
				'phd_address' => $phd_address,
				'phd_phone' => $phd_phone,
				'phd_fax' => $phd_fax,
				'phd_email' => $phd_email
			];

			view()->share($email_data);
			$pdf = PDF::loadView('applicantstatus.finishemail')->save(public_path('files/lulus_' . $applicant->number . '.pdf'));
			$applicant['file'] = public_path('files/lulus_' . $applicant->number . '.pdf');
			// return view('applicantstatus.finishemail', $email_data);

			$email = Mail::send('applicantstatus.finishemail', $email_data , function ($mail) use ($applicant)
			{
				$mail->from('noreply@jpsm.com.my', 'JPSM e-Permit');
				$mail->to($applicant->user->email, $applicant->user->name);

				$mail->subject('Status Permohonan Diluluskan');
				$mail->attach($applicant->file);
			});

			echo $phd_name;


			// return redirect(url('applicant-status'))->with('status', 'success-finish');
		}
		else
		{
			return redirect(url('applicant-status'))->with('status', 'failed-finish');
		}
	}

	public function complete($id)
	{
		$applicant = Applicant::find($id);
		$applicant->status = 'completed';

		if($applicant->save())
		{
			activityLog('Status Permohonan Diluluskan');

			$type = '';
			$place = '';

			if($applicant->type == 'hiking')
			{
				$type = 'Aktiviti Pendakian';
				$place = (!empty($applicant->hikingInformation->permanent_forest->name) ? $applicant->hikingInformation->permanent_forest->name : '');
			}
			elseif($applicant->type == 'other')
			{
				$type = 'Lain-lain Aktiviti';
				if($applicant->applicantOtherActivity->type == 'hsk'){
                    $place = (!empty($applicant->applicantOtherActivity->permanent_forest->name) ? $applicant->applicantOtherActivity->permanent_forest->name : '');
				}else{
                    $place = (!empty($applicant->applicantOtherActivity->eco_park->name) ? $applicant->applicantOtherActivity->eco_park->name : '');
				}
			}
			elseif($applicant->type == 'convenience')
			{
				$type = 'Tempahan Kemudahan';
				$place = (!empty($applicant->applicantConvenience->eco_park->name) ? $applicant->applicantConvenience->eco_park->name : '-');
			}

			$email_data = [
				'number' => $applicant->number,
				'date' => date('d/m/Y', strtotime($applicant->created_at)),
				'type' => $type,
				'place' => $place,
				'status' => 'Diluluskan'
			];

			$email = Mail::send('applicantstatus.statusemail', $email_data , function ($mail) use ($applicant)
			{
				$mail->from('noreply@jpsm.com.my', 'JPSM e-Permit');
				$mail->to($applicant->user->email, $applicant->user->name);

				$mail->subject('Status Permohonan');
			});

			return redirect(url('applicant-status'))->with('status', 'success-completed')->with('status-text', 'Anda Telah Melulus Permohonan '. $applicant->number .' Dan Menunggu Bayaran Daripada Pemohon');
		}
		else
		{
			return redirect(url('applicant-status'))->with('status', 'failed-completed');
		}
	}

	public function finish($id)
	{
		$applicant = Applicant::find($id);
		$applicant->status = 'finished';

		if($applicant->save())
		{
			activityLog('Status Permohonan Selesai');

			$type         = '';
			$place        = '';
			$otherecopark = '';
			$price        = '';
			$participant  = '';
			$amount       = '';
			$other_price  = '';
			$activity_date = date('d/m/Y');
			$starting_date = date('d/m/Y');
			$ending_date = date('d/m/Y');
			$phd_name = '';
			$phd_address = '';
			$phd_phone = '';
			$phd_fax = '';
			$phd_email = '';

			if($applicant->type == 'hiking')
			{
				$type = 'Aktiviti Pendakian';
				$place = (!empty($applicant->hikingInformation->permanent_forest->name) ? $applicant->hikingInformation->permanent_forest->name : '');
				$price        = $applicant->hikingInformation->mountain->price;
				$participant  = $applicant->hikingInformation->participants_total;
				$amount       = $applicant->amount;
				$other_price  = $applicant->hikingInformation->permanent_forest->price;
				$activity_date= date('d/m/Y', strtotime($applicant->hikingDeclaration->date));
				$starting_date = date('d/m/Y', strtotime($applicant->hikingInformation->starting_date));
				$ending_date = date('d/m/Y', strtotime($applicant->hikingInformation->ending_date));
				$phd = RegionalForestry::where([
											'state_id' => $applicant->hikingLocation->state_id,
											'area_id' => $applicant->hikingLocation->area_id
									    ])
										->first();
				$phd_name = $phd->name;
				$phd_address = $phd->address;
				$phd_phone = $phd->phone;
				$phd_fax = $phd->fax;
				$phd_email = $phd->email;
			}
			elseif($applicant->type == 'other')
			{
				$type = 'Lain-lain Aktiviti';
				
				if($applicant->applicantOtherActivity->type == 'hsk'){
                    $place = (!empty($applicant->applicantOtherActivity->permanent_forest->name) ? $applicant->applicantOtherActivity->permanent_forest->name : '');
				}else{
					$otherecopark = 'true';
                    $place = (!empty($applicant->applicantOtherActivity->eco_park->name) ? $applicant->applicantOtherActivity->eco_park->name : '');
				}

				$price        = $applicant->applicantOtherActivity->permanent_forest->price;
				$participant  = $applicant->applicantOtherActivity->applicant_other_activity_detail->participant;
				$amount       = $applicant->amount;
				$activity_date= date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_declaration->application_date));
				$starting_date = date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_detail->starting_date));
				$ending_date = date('d/m/Y', strtotime($applicant->applicantOtherActivity->applicant_other_activity_detail->ending_date));
				
				$phd = RegionalForestry::where([
											'state_id' => $applicant->applicantOtherActivity->state_id,
											'area_id' => $applicant->applicantOtherActivity->area_id
									    ])
										->first();
				$phd_name = $phd->name;
				$phd_address = $phd->address;
				$phd_phone = $phd->phone;
				$phd_fax = $phd->fax;
				$phd_email = $phd->email;
			}
			elseif($applicant->type == 'convenience')
			{
				$type = 'Tempahan Kemudahan';
				$price = $applicant->applicantConvenience->convenience->price;
				$participant = $applicant->applicantConvenience->participant;
				$amount  = $applicant->amount;
				$activity_date= date('d/m/Y', strtotime($applicant->applicantConvenience->applicant_convenience_declaration->application_date));
				$starting_date = date('d/m/Y', strtotime($applicant->applicantConvenience->starting_date));
				$ending_date = date('d/m/Y', strtotime($applicant->applicantConvenience->ending_date));
			
				$phd = RegionalForestry::where([
											'state_id' => $applicant->applicantConvenience->state_id,
											'area_id' => $applicant->applicantConvenience->area_id
									    ])
										->first();
				$phd_name = $phd->name;
				$phd_address = $phd->address;
				$phd_phone = $phd->phone;
				$phd_fax = $phd->fax;
				$phd_email = $phd->email;
			}

			$email_data = [
				'applicant' => $applicant,
				'number' => $applicant->number,
				'date' => date('d/m/Y', strtotime($applicant->created_at)),
				'type' => $type,
				'place' => $place,
				'status' => 'Selesai',
				'price' => $price,
				'participant' => $participant,
				'amount' => $amount,
				'ecopark' => $otherecopark,
				'other_price' => $other_price,
				'activity_date' => $activity_date,
				'starting_date' => $starting_date,
				'ending_date' => $ending_date,
				'phd_name' => $phd_name,
				'phd_address' => $phd_address,
				'phd_phone' => $phd_phone,
				'phd_fax' => $phd_fax,
				'phd_email' => $phd_email
			];

			echo $phd_name;

			// view()->share($email_data);
			// $pdf = PDF::loadView('applicantstatus.finishemail')->save(public_path('files/lulus_' . $applicant->number . '.pdf'));
			// $applicant['file'] = public_path('files/lulus_' . $applicant->number . '.pdf');
			// // return view('applicantstatus.finishemail', $email_data);

			// $email = Mail::send('applicantstatus.finishemail', $email_data , function ($mail) use ($applicant)
			// {
			// 	$mail->from('noreply@jpsm.com.my', 'JPSM e-Permit');
			// 	$mail->to($applicant->user->email, $applicant->user->name);

			// 	$mail->subject('Status Permohonan Diluluskan');
			// 	$mail->attach($applicant->file);
			// });


			// return redirect(url('applicant-status'))->with('status', 'success-finish');
		}
		else
		{
			return redirect(url('applicant-status'))->with('status', 'failed-finish');
		}
	}

	public function cancel($id)
	{
		$applicant = Applicant::find($id);
		$applicant->status = 'canceled';

		if($applicant->save())
		{
			activityLog('Status Permohonan Dibatalkan');

			$type = '';
			$place = '';

			if($applicant->type == 'hiking')
			{
				$type = 'Aktiviti Pendakian';
				$place = (!empty($applicant->hikingInformation->permanent_forest->name) ? $applicant->hikingInformation->permanent_forest->name : '');
			}
			elseif($applicant->type == 'other')
			{
				$type = 'Lain-lain Aktiviti';
				if($applicant->applicantOtherActivity->type == 'hsk'){
                    $place = (!empty($applicant->applicantOtherActivity->permanent_forest->name) ? $applicant->applicantOtherActivity->permanent_forest->name : '');
				}else{
                    $place = (!empty($applicant->applicantOtherActivity->eco_park->name) ? $applicant->applicantOtherActivity->eco_park->name : '');
				}
			}
			elseif($applicant->type == 'convenience')
			{
				$type = 'Tempahan Kemudahan';
			}

			$email_data = [
				'number' => $applicant->number,
				'date' => date('d/m/Y', strtotime($applicant->created_at)),
				'type' => $type,
				'place' => $place,
				'status' => 'Dibatalkan'
			];

			$email = Mail::send('applicantstatus.statusemail', $email_data , function ($mail) use ($applicant)
			{
				$mail->from('noreply@jpsm.com.my', 'JPSM e-Permit');
				$mail->to($applicant->user->email, $applicant->user->name);

				$mail->subject('Status Permohonan');
			});


			return redirect(url('applicant-status'))->with('status', 'success-cancel');
		}
		else
		{
			return redirect(url('applicant-status'))->with('status', 'failed-cancel');
		}
	}

	// review

	public function convenience($id)
	{
		$applicant = Applicant::find($id);

		return view('applicantreview.convenience', compact('applicant'));
	}

	public function otherActivities($id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['other']    = ApplicantOtherActivity::where('applicant_id', $id)->first();

		
		return view('applicantreview.otheractivities', $data);
	}

	public function hiker($applicant_id, $participant_id)
	{
		$data['applicant']			= Applicant::find($applicant_id);
		$data['biodata']     		= HikingBiodata::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $participant_id
									  ])->first();
		$data['emergency']  		= HikingEmergency::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $participant_id
									  ])->first();
		$data['insurance'] 			= HikingInsurance::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $participant_id
									  ])->first();
		$data['declaration']		= HikingDeclaration::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $participant_id
									  ])->first();
		$data['health']				= HikingHealth::where([
										'applicant_id' => $applicant_id,
										'hiking_participant_id' => $participant_id
									  ])->first();

		return view('applicantreview.hikerdetail', $data);
	}

	public function hiking($id)
	{
		$data['applicant']			= Applicant::find($id);
		$data['biodata']     		= HikingBiodata::where([
										'applicant_id' => $id,
										'user_id' => $data['applicant']->user_id
									  ])->first();
		$data['emergency']  		= HikingEmergency::where([
										'applicant_id' => $id,
										'user_id' => $data['applicant']->user_id
									  ])->first();
		$data['location']			= HikingLocation::where('applicant_id', $id)->first();
		$data['information']		= HikingInformation::where('applicant_id', $id)->first();
		$data['insurance'] 			= HikingInsurance::where([
										'applicant_id' => $id,
										'user_id' => $data['applicant']->user_id
									  ])->first();
		$data['declaration']		= HikingDeclaration::where([
										'applicant_id' => $id,
										'user_id' => $data['applicant']->user_id
									  ])->first();
		$data['health']				= HikingHealth::where([
										'applicant_id' => $id,
										'user_id' => $data['applicant']->user_id
									  ])->first();
		$data['conveniences']		= ApplicantConvenience::where('applicant_id', $id)->get();

		return view('applicantreview.hikingactivity', $data);
	}

	public function review($type, $id)
	{
		if($type == 'hiking')
		{
			$data['applicant']			= Applicant::find($id);
			$data['biodata']     		= HikingBiodata::where([
											'applicant_id' => $id,
											'user_id' => $data['applicant']->user_id
										  ])->first();
			$data['emergency']  		= HikingEmergency::where([
											'applicant_id' => $id,
											'user_id' => $data['applicant']->user_id
										  ])->first();
			$data['location']			= HikingLocation::where('applicant_id', $id)->first();
			$data['information']		= HikingInformation::where('applicant_id', $id)->first();
			$data['insurance'] 			= HikingInsurance::where([
											'applicant_id' => $id,
											'user_id' => $data['applicant']->user_id
										  ])->first();
			$data['declaration']		= HikingDeclaration::where([
											'applicant_id' => $id,
											'user_id' => $data['applicant']->user_id
										  ])->first();
			$data['health']				= HikingHealth::where([
											'applicant_id' => $id,
											'user_id' => $data['applicant']->user_id
										  ])->first();
			$data['conveniences']		= ApplicantConvenience::where('applicant_id', $id)->get();

			return view('applicantstatusview.hikingactivity', $data);
		}
		elseif($type == 'convenience')
		{
			$applicant = Applicant::find($id);

			return view('applicantstatusview.convenience', compact('applicant'));
		}
		elseif($type == 'other')
		{
			$data['applicant'] = Applicant::find($id);
			$data['other']    = ApplicantOtherActivity::where('applicant_id', $id)->first();

			
			return view('applicantstatusview.otheractivity', $data);
		}
	}

	public function delete($id)
	{
		$applicant = Applicant::find($id);

		$applicant->delete();

		return redirect(url('applicant-status'))->with('status', 'success-delete');
	}

	public function deleteBatch(Request $request)
	{
		$ids = json_decode($request->ids);

		$error = 'false';

		if(count($ids) > 0)
		{
			for($i = 0; $i < count($ids); $i++)
			{
				$applicant = Applicant::find($ids[$i]);
				$applicant->delete();
			}

			$error = 'false';
		}
		else
		{
			$error = 'true';
		}

		return $error;
	}
}