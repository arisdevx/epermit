<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\UserLocation;
use App\Models\UserAccessLog;
use App\Models\ActivityLog;
use App\Models\ActivityLogDetail;
use App\Models\Setting;
use Illuminate\Support\Facades\Cookie;
use Flash;
use Validator;
use Auth;
use Hash;
use Session;

class AuthController extends Controller
{

	public function login(Request $request)
	{
		$user = User::where('username', $request->username)->first();

		if(!empty($user))
		{
			if($user->status == '1')
			{
				if(Hash::check($request->password, $user->password))
				{
					if($user->user_role2->role_id != '6')
					{
						$attempt = Auth::attempt([
							'id'       => $user->id,
							'email'	   => $user->email,
							'username' => $user->username,
							'password' => $request->password
						], false, false);

						if($attempt)
						{
							$access              = new UserAccessLog;
							$access->user_id     = $user->id;
							$access->login_date  = date('Y-m-d H:i:s');
							$access->logout_date = '';
							$access->save();

							$activity              = new ActivityLog;
							$activity->user_id     = $user->id;
							$activity->ip_address  = request()->ip();
							$activity->login_date  = date('Y-m-d H:i:s');
							$activity->logout_date = '';

							if($activity->save())
							{
								$activityDetail                = new ActivityLogDetail;
								$activityDetail->activity      = 'Mulai log masuk';
								$activityDetail->activity_log_id = $activity->id;
								$activityDetail->save();

							}

							Cookie::queue('logs_id', implode(',', [$access->id, $activity->id]), 480);

							return redirect('home');
						}
						else
						{
							return redirect('login')->with('status', 'auth-false');
						}
					}
					else
					{
						$attempt = Auth::guard('applicant')->attempt([
							'id'       => $user->id,
							'email'	   => $user->email,
							'username' => $user->username,
							'password' => $request->password
						], false, false);

						if($attempt)
						{
							$access = new UserAccessLog;
							$access->user_id = $user->id;
							$access->login_date = date('Y-m-d H:i:s');
							$access->logout_date = '';
							$access->save();

							$activity              = new ActivityLog;
							$activity->user_id     = $user->id;
							$activity->ip_address  = request()->ip();
							$activity->login_date  = date('Y-m-d H:i:s');
							$activity->logout_date = '';

							if($activity->save())
							{
								$activityDetail                = new ActivityLogDetail;
								$activityDetail->activity      = 'Mulai log masuk';
								$activityDetail->activity_log_id = $activity->id;
								$activityDetail->save();

							}

							Cookie::queue('logs_id', implode(',', [$access->id, $activity->id]), 480);

							return redirect('account/member-home');
						}
						else
						{
							return redirect('login')->with('status', 'auth-false');
						}
					}
				}
				else
				{
					return redirect('login')->with('status', 'auth-false');
				}
			}
			else
			{
				return redirect('login')->with('status', 'auth-false');
			}
		}
		else
		{
			return redirect('login')->with('status', 'auth-false');
		}
	}

}