<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class LoginUser extends Controller
{
	public function index()
	{
		return view('account.user.login');
	}

	public function store(LoginRequest $request)
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
						'password' => Hash::make($request->password)
					]);

					if($attempt)
					{
						return redirect('account/home');
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
}