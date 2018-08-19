<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Applicant;
use App\Models\HikingParticipant;
use App\Models\HikingBiodata;
use App\Models\HikingEmergency;
use App\Models\HikingLocation;
use App\Models\HikingInformation;
use App\Models\HikingInsurance;
use App\Models\HikingDeclaration;
use App\Models\HikingHealth;
use App\Models\ApplicantConvenience;
use App\Models\OthersActivity;
use App\Models\ApplicantOtherActivity;
use App\Models\ApplicantOtherActivityDetail;
use App\Models\ApplicantOtherActivityDeclaration;
use App\Models\State;
use App\Models\Area;
use App\Models\Country;
use App\Models\EcoPark;
use App\Models\PermanentForest;
use Auth;
use Flash;

class Applications extends Controller
{
	public function index()
	{

		$data['statuses'] = Applicant::where('user_id', Auth::user()->id)
									 ->orderBy('created_at', 'DESC')
									 ->paginate(10);

		return view('application.status', $data);
	}

	public function edit($id)
	{
		return view('application.edit');
	}

	public function destroy($id)
	{
		$applicant = Applicant::find($id);
		$applicant->status = 'canceled';
		$applicant->save();

		Flash::success('Permohonan Telah Dibatalkan');
        return redirect()->route('member-application-status.index');
	}

	public function viewHiking($id)
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

		return view('application.hiking', $data);
	}

	public function viewConvenience($id)
	{
		$applicant = Applicant::find($id);

		return view('application.convenience', compact('applicant'));
	}

	public function viewOther($id)
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

		return view('application.other', $data);
	}
}