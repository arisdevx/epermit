<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserAccessLog;
use App\Models\ActivityLog;
use App\Models\ActivityLogDetail;
use App\Models\Setting;
use Illuminate\Support\Facades\Cookie;
use Auth;
use Session;

class LoginController extends Controller
{
	public function index()
	{
		if(Auth::guard('applicant')->check())
		{
			return redirect('account/member-home');
		}
		else
		{
			return view('account.user.login');
		}
		
	}

	public function Login(LoginRequest $request)
	{
		$user = User::where('username', $request->username)->first();

		if(!empty($user))
		{
			if($user->status == '1')
			{
				if(Hash::check($request->password, $user->password))
				{
					$attempt = Auth::guard('applicant')->attempt([
						'id'       => $user->id,
						'email'	   => $user->email,
						'username' => $user->username,
						'password' => $request->password
					], false, false);

					if($attempt)
					{
						return redirect('account/member-home');
					}
					else
					{
						return redirect('account/login')->with('status', 'auth-false');
					}
				}
				else
				{
					return redirect('account/login')->with('status', 'wrong-password');
				}
			}
			else
			{
				return redirect('account/login')->with('status', 'account-inactive');
			}
		}
		else
		{
			return redirect('account/login')->with('status', 'no-account');
		}
	}

	public function logout()
	{
		$access              = UserAccessLog::find(log_access_id());
		if(!empty($access))
		{
			$access->logout_date = date('Y-m-d H:i:s');
			$access->save();

			$activity              = ActivityLog::find(log_activity_id());
			$activity->logout_date = date('Y-m-d H:i:s');
			$activity->save();
			
			$activityDetail                  = new ActivityLogDetail;
			$activityDetail->activity        = 'Log Keluar';
			$activityDetail->activity_log_id = log_activity_id();
			$activityDetail->save();
		}

		Cookie::queue(Cookie::forget('logs_id'));

		Auth::guard('applicant')->logout();
		Auth::logout();
		Session::flush();

		return redirect(url('login'))->with('status', 'logout');
	}
}