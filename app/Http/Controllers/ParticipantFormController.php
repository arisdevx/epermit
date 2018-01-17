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
use Flash;
use Validator;
use Log;

class ParticipantFormController extends Controller
{
	public function index()
	{
		return view('participantform.form');
	}

	public function submit(ParticipantRequest $request, $id)
	{
		$applicantParticipant               = new HikingParticipant;
		$applicantParticipant->applicant_id = $id;
		$applicantParticipant->save();

		$applicantBiodata                        = new HikingBiodata;
		$applicantBiodata->fullname              = $request->hiker_fullname;
		$applicantBiodata->ic_number             = $request->hiker_ic;
		$applicantBiodata->birthday              = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->hiker_birthday)));
		$applicantBiodata->age                   = $request->hiker_age;
		$applicantBiodata->gender                = $request->hiker_gender;
		$applicantBiodata->nationality           = (!empty($request->hiker_nationality) ? '1' : '0');
		$applicantBiodata->phone                 = $request->hiker_phone;
		$applicantBiodata->address               = $request->hiker_address;
		$applicantBiodata->state                 = $request->hiker_state;
		$applicantBiodata->postcode              = $request->hiker_postcode;
		$applicantBiodata->applicant_id          = $id;
		$applicantBiodata->user_id               = 0;
		$applicantBiodata->hiking_participant_id = $applicantParticipant->id;
		$applicantBiodata->save();

		$applicantEmergency                        = new HikingEmergency;
		$applicantEmergency->name                  = $request->emergency_fullname;
		$applicantEmergency->phone                 = $request->emergency_phone;
		$applicantEmergency->address               = $request->emergency_address;
		$applicantEmergency->second_address        = (!empty($request->emergency_second_address) ? $request->emergency_second_address : '');
		$applicantEmergency->state                 = $request->emergency_state;
		$applicantEmergency->postcode              = $request->emergency_postcode;
		$applicantEmergency->applicant_id          = $id;
		$applicantEmergency->user_id               = 0;
		$applicantEmergency->hiking_participant_id = $applicantParticipant->id;
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

		return redirect(url('form/completed'));
	}

	public function completed()
	{
		return '<p style="text-align: center; margin-top: 100px;">Pendaftaran telah direkod. Terima kasih</p>';
	}
}