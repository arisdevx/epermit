<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\UserAccessLog;
use Flash;
use Validator;
use Log;

class AuditTrailAccessController extends Controller
{
	public function index(Request $request)
	{
		$data['logs'] = UserAccessLog::whereHas('user', function($query) use ($request){
										$query->whereRaw('name LIKE ?', ['%'. $request->search .'%']);
									 })
									 ->orderBy('login_date', 'DESC')
									 ->orderBy('logout_date', 'DESC')
									 ->paginate(10);

		return view('useraccesslog.index', $data);
	}

	public function destroy($id)
	{
		$access = UserAccessLog::find($id);
		$access->delete();
		
		Flash::success('Delete has been success');
        return redirect('audit-trail-access');
	}
}