<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\ActivityLogDetail;

use Flash;
use Validator;
use Log;

class AuditTrailActivityController extends Controller
{
	public function index()
	{
		$data['logs'] = ActivityLog::paginate(10);

		return view('activitylog.index', $data);
	}

	public function detail($id)
	{
		$data['details'] = ActivityLogDetail::where('activity_log_id', $id)->paginate(10);

		return view('activitylog.detail', $data);
	}

	public function destroy($id)
	{
		$activity = ActivityLog::find($id);
		$activity->delete();

		Flash::success('Delete has been success');
        return redirect('audit-trail-activity');
	}

	public function detailDelete($id)
	{
		$activity = ActivityLogDetail::find($id);
		$activity->delete();

		Flash::success('Delete has been success');
        return redirect('audit-trail-activity/detail/' . $id);
	}
}