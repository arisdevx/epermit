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
use Flash;
use Validator;
use Log;
use PDF;

class ReportController extends Controller
{
	public function index(Request $request)
	{
		$data['statuses'] = Applicant::where('status', 'finished')
									 ->where(function($q) use ($request){
									 	if(!empty($request->datefrom) and !empty($request->dateuntil))
									 	{
									 		$q->whereRaw("DATE_FORMAT(created_at, '%d/%m/%Y') BETWEEN '". $request->datefrom ."' AND '". $request->dateuntil ."'");
									 	}

									 	if(!empty($request->type))
									 	{
									 		$q->where('type', $request->type);
									 	}
									 })
									 ->paginate(10);

		return view('report.index', $data);
	}

	public function convenience($id, $type)
	{
		$applicant = Applicant::find($id);

		// if($type == 'excel')
		// {
		// 	activityLog('Export Excel: Tempahan Kemudahan');
		// 	header("Content-type: application/pdf");
		// 	header("Content-Disposition: attachment; filename=export_" . time() . ".xls");
		// 	return view('report.convenience', compact('applicant'))->render();
		// }
		// else
		// {
		// 	activityLog('Export Pdf: Tempahan Kemudahan');
		// 	view()->share('applicant', $applicant);
		// 	$pdf = PDF::loadView('report.convenience');
		// 	return $pdf->download('export_'. time() .'.pdf');
		// }

		return view('report.convenience', compact('applicant'))->render();
	}

	public function otherActivities($id, $type)
	{
		$applicant = Applicant::find($id);

		if($type == 'excel')
		{
			activityLog('Export Excel: Lain-lain aktiviti');
			header("Content-type: application/pdf");
			header("Content-Disposition: attachment; filename=export_" . time() . ".xls");
			return view('report.otheractivities', compact('applicant'));
		}
		else
		{
			activityLog('Export Pdf: Lain-lain aktiviti');
			view()->share('applicant', $applicant);
			$pdf = PDF::loadView('report.otheractivities');

			return $pdf->download('export_'. time() .'.pdf');
		}

		return view('report.otheractivities', compact('applicant'));
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

		return view('report.hikerdetail', $data);
	}

	public function hiking($id, $type)
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

		if($type == 'excel')
		{
			activityLog('Export Excel: Aktiviti Pendakian');
			header("Content-type: application/pdf");
			header("Content-Disposition: attachment; filename=export_" . time() . ".xls");
			return view('report.hikingactivity', $data);
		}
		else
		{
			activityLog('Export Pdf: Aktiviti Pendakian');
			view()->share($data);
			$pdf = PDF::loadView('report.hikingactivity');

			return $pdf->download('export_'. time() .'.pdf');
		}

		return view('report.hikingactivity', $data);
	}
}