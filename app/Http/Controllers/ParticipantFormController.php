<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicantHikingParticipantRequest as ParticipantRequest;
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
use App\Models\State;
use App\Models\Country;
use App\Models\UserLocation;
use App\Models\RegionalForestry;
use App\Models\HikingGuide;
use App\Models\GuideConfig;
use App\Models\Setting;
use Flash;
use Validator;
use Log;
use Mail;
use PDF;

class ParticipantFormController extends Controller
{
	public function index($id)
	{
		// dd(Setting::where('setting_key', 'guide')->first()->setting_value);
		$setting = json_decode(Setting::where('setting_key', 'guide')->first()->setting_value);
		
		$data['applicant'] = Applicant::find($id);
		$data['states'] = State::get();
		$data['countries'] = Country::get();
		$data['malim_available'] = ceil($data['applicant']->hikingInformation->participants_total/$setting->participant)*$setting->guide;
		$data['malim_ready'] = $data['applicant']->hikingGuide->count();

		return view('participantform.form', $data);
	}

	public function submit(ParticipantRequest $request, $id)
	{

		$applicant = Applicant::find($id);

		$applicantParticipant               = new HikingParticipant;
		$applicantParticipant->applicant_id = $id;
		$applicantParticipant->save();

		if(!empty($request->guide))
		{
			$hikingGuide = new HikingGuide;
			$hikingGuide->applicant_id = $id;
			$hikingGuide->participant_id = $applicantParticipant->id;
			$hikingGuide->save();
		}

		$applicantBiodata                        = new HikingBiodata;
		$applicantBiodata->fullname              = $request->hiker_fullname;
		$applicantBiodata->ic_number             = $request->hiker_ic;
		$applicantBiodata->birthday              = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->hiker_birthday)));
		$applicantBiodata->age                   = $request->hiker_age;
		$applicantBiodata->gender                = $request->hiker_gender;
		$applicantBiodata->nationality           = (!empty($request->hiker_nationality) ? '1' : '0');
		$applicantBiodata->phone                 = $request->hiker_phone;
		$applicantBiodata->address               = $request->hiker_address;
		$applicantBiodata->state_id                 = $request->hiker_state;
		$applicantBiodata->postcode              = $request->hiker_postcode;
		$applicantBiodata->country_id			= $request->hiker_country;
		$applicantBiodata->applicant_id          = $id;
		$applicantBiodata->user_id               = 0;
		$applicantBiodata->hiking_participant_id = $applicantParticipant->id;
		$applicantBiodata->save();

		$applicantEmergency                        = new HikingEmergency;
		$applicantEmergency->name                  = $request->emergency_fullname;
		$applicantEmergency->phone                 = $request->emergency_phone;
		$applicantEmergency->address               = $request->emergency_address;
		$applicantEmergency->second_address        = (!empty($request->emergency_second_address) ? $request->emergency_second_address : '');
		$applicantEmergency->state_id                 = $request->emergency_state;
		$applicantEmergency->postcode              = $request->emergency_postcode;
		$applicantEmergency->country_id                 = $request->emergency_country;
		$applicantEmergency->applicant_id          = $id;
		$applicantEmergency->user_id               = 0;
		$applicantEmergency->hiking_participant_id = $applicantParticipant->id;
		$applicantEmergency->relationship = $request->emergency_relationship;
		$applicantEmergency->save();

		$applicantInsurance                        = new HikingInsurance;
		$applicantInsurance->name                  = (!empty($request->insurance_name) ? $request->insurance_name : '');
		$applicantInsurance->code                  = (!empty($request->insurance_code) ? $request->insurance_code : '');
		$applicantInsurance->applicant_id          = $id;
		$applicantInsurance->user_id               = 0;
		$applicantInsurance->hiking_participant_id = $applicantParticipant->id;
		$applicantInsurance->save();

		$applicantDeclaration                        = new HikingDeclaration;
		$applicantDeclaration->fullname              = $request->declaration_name;
		$applicantDeclaration->ic_number             = $request->declaration_ic;
		$applicantDeclaration->date                  = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->declaration_date)));
		$applicantDeclaration->applicant_id          = $id;
		$applicantDeclaration->user_id               = 0;
		$applicantDeclaration->hiking_participant_id = $applicantParticipant->id;
		$applicantDeclaration->save();

		$applicantHealth                        = new HikingHealth;
		$applicantHealth->applicant_id          = $id;
		$applicantHealth->user_id               = 0;
		$applicantHealth->hiking_participant_id = $applicantParticipant->id;
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

		$mail_data = [
			'full_name' => $applicant->user->name,
			'participant' => $request->declaration_name,
			'number' => $applicant->number
		];

		Mail::send('account.partials.email.newparticipant', $mail_data , function ($mail) use ($applicant)
		{
			$mail->from('mail@jpsm.com.my', 'JPSM e-Permit');
			$mail->to($applicant->user->email, $applicant->user->email);

			$mail->subject('JPSM e-Permit: Pendaftaran Peserta Baru');
		});

		return redirect(url('form/completed/' . $id . '/' . $applicantParticipant->id));
	}

	public function completed($id, $participant_id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['biodata'] = HikingBiodata::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['emergency'] = HikingEmergency::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['insurance'] = HikingInsurance::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['declaration'] = HikingDeclaration::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['health']				= HikingHealth::where([
										'applicant_id' => $id,
										'hiking_participant_id' => $participant_id
									  ])->first();
		
		$checkPHD		   = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id,
								'area_id'  => $data['applicant']->hikingLocation->area_id
							 ])->first();

		$data['phd'] = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id,
								'area_id'  => $data['applicant']->hikingLocation->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id
							 ])->first();
		$data['phd_data'] = RegionalForestry::where([
											'state_id' => $data['applicant']->hikingLocation->state_id,
											'area_id' => $data['applicant']->hikingLocation->area_id
									    ])
										->first();

		return view('participantform.finish', $data);
	}

	public function view($id)
	{
		$data['applicant'] = Applicant::find($id);
		
		$checkPHD		   = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id,
								'area_id'  => $data['applicant']->hikingLocation->area_id
							 ])->first();

		$data['phd'] = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id,
								'area_id'  => $data['applicant']->hikingLocation->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id
							 ])->first();
		$data['phd_data'] = RegionalForestry::where([
											'state_id' => $data['applicant']->hikingLocation->state_id,
											'area_id' => $data['applicant']->hikingLocation->area_id
									    ])
										->first();
		return view('account.aktivitipendakian.review', $data);
	}

	public function download($id, $participant_id)
	{
		$data['applicant'] = Applicant::find($id);
		$data['biodata'] = HikingBiodata::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['emergency'] = HikingEmergency::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['insurance'] = HikingInsurance::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['declaration'] = HikingDeclaration::where([
											'applicant_id' => $id,
											'hiking_participant_id' => $participant_id
										])->first();
		$data['health']				= HikingHealth::where([
										'applicant_id' => $id,
										'hiking_participant_id' => $participant_id
									  ])->first();
		
		$checkPHD		   = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id,
								'area_id'  => $data['applicant']->hikingLocation->area_id
							 ])->first();

		$data['phd'] = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id,
								'area_id'  => $data['applicant']->hikingLocation->area_id
							 ])->first();
		$data['jpn'] = UserLocation::where([
								'state_id' => $data['applicant']->hikingLocation->state_id
							 ])->first();
		$data['phd_data'] = RegionalForestry::where([
											'state_id' => $data['applicant']->hikingLocation->state_id,
											'area_id' => $data['applicant']->hikingLocation->area_id
									    ])
										->first();

		view()->share($data);

		$pdf = PDF::loadView('participantform.download');

		return $pdf->download('download_'. $data['applicant']->number .'.pdf');

		// return view('participantform.download', $data);
	}
}