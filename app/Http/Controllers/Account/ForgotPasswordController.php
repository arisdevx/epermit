<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;
use Mail;
use DateTime;

class ForgotPasswordController extends Controller
{
	public function index()
	{
		return view('account.user.forgotpassword');
	}

	public function action(ForgotPasswordRequest $request)
	{
		$user = User::where('email', $request->email)->first();

		if(!empty($user))
		{
			$password       = str_random(8);
			$user->password = Hash::make($password);

			if($user->save())
			{
				$mail_data = [
					'url'	=> url(''),
					'logo'  => '',
					'full_name' => (!empty($user->name) ? $user->name : 'User'),
					'password' => $password
				];

				$email = Mail::send('account.partials.email.forgotpassword', $mail_data , function ($mail) use ($user)
				{
					$mail->from('contact@arisdev.id', 'JPSM e-Permit');
					$mail->to($user->email, $user->name);

					$mail->subject('JPSM e-Permit: Forgot Password');
				});

				return redirect(url('account/forgot-password'))->with('status', 'success');
			}
			else
			{
				return redirect(url('account/forgot-password'))->with('status', 'failed');
			}
		}
		else
		{
			return redirect(url('account/forgot-password'))->with('status', 'empty');
		}
	}
}