<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAccountRequest;
use App\Http\Requests\RegisterCheckRequest;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\State;
use App\Models\Setting;
use Mail;
use DateTime;

class RegisterController extends Controller
{
	public function index()
	{
		$data['countries'] = Country::get();
		$data['states'] = State::get();
		$data['logo']     = Setting::where('setting_key', 'logo')->first();
		return view('account.user.register', $data);
	}

	public function store(RegisterAccountRequest $request)
	{
		$password       = str_random(8);
		$user           = new User;
		$user->name     = (!empty($request->fullname) ? $request->fullname : '');
		$user->username = (!empty($request->usernamecitizen) ? $request->usernamecitizen : $request->usernamenoncitizen);
		$user->email    = (!empty($request->emailcitizen) ? $request->emailcitizen : $request->emailnoncitizen);
		$user->password = Hash::make($password);
		$user->status   = '0';

		if($user->save())
		{
			$user->attachRole(6);

			$id = $user->id;

			$profile            = new UserProfile;
			$profile->user_id   = $id;
			$profile->avatar    = '';
			$profile->address_1 = (!empty($request->address) ? $request->address : '');
			$profile->address_2 = '';
			$profile->postcode  = (!empty($request->postcode) ? $request->postcode : '');
			$profile->city      = (!empty($request->city) ? $request->city : '');
			$profile->state     = (!empty($request->state) ? $request->state: '');
			$profile->country   = (!empty($request->country) ? $request->country : '');
			$profile->passport  = (!empty($request->usernamenoncitizen) ? $request->usernamenoncitizen : '');
 			$profile->nokp      = (!empty($request->usernamecitizen) ? $request->usernamecitizen : '');
			$profile->age       = (!empty($request->age) ? $request->age : '');
			$profile->phonecode = $request->phonecode;
			$profile->phone     = (!empty($request->phone) ? $request->phone : '');
			$profile->mobile    = '';
			$profile->office    = '';
			$profile->birthday  = date('Y-m-d H:i:s', strtotime($request->birthday));
			$profile->citizen   = $request->citizen;
			$profile->save();

			$mail_data = [
				'id' => $id,
				'url'	=> url(''),
				'logo'  => '',
				'full_name' => (!empty($user->name) ? $user->name : 'User'),
				'activated_link' => url('account/activate/' . $user->email),
				'username' => $user->username,
				'password' => $password
			];

			$email = Mail::send('account.partials.email.register', $mail_data , function ($mail) use ($user)
			{
				$mail->from('mail@jpsm.com.my', 'JPSM e-Permit');
				$mail->to($user->email, $user->name);

				$mail->subject('JPSM e-Permit: Activate Account');
			});

			Mail::send('account.partials.email.newuser', $mail_data , function ($mail) use ($user)
			{
				$mail->from(config('mail.from.address'), 'JPSM e-Permit');
				$mail->to('ikhwanzaini.aidan@gmail.com', 'New User');

				$mail->subject('JPSM e-Permit: Akaun Baru');
			});
			$request->session()->flush();
			return redirect('account/register')->with('status', 'success');
		}
		else
		{
			return redirect('account/register')->with('status', 'error');
		}

	}

	public function activated($email)
	{
		$user = User::where('email', $email)->first();
		$user->status = '1';

		if($user->save())
		{
			return redirect(url('login'))->with('active-status', 'success');
		}
		else
		{
			return redirect(url('login'))->with('active-status', 'error');
		}
	}

	public function check(RegisterCheckRequest $request)
	{
		$citizen  = $request->citizencheck;
		$username = $request->usernamecheck;
		$birthday = '';
		$age      = '';

		if($citizen == '1')
		{
			$getDate = substr($username, 0, 6);
			$getStrDate = str_split($getDate, 2);

			if($getStrDate[0] > 60)
			{
				$year = '19' . $getStrDate[0];
			}
			else
			{
				$year = '20' . $getStrDate[0];
			}

			$getBirthday = "$getStrDate[2].$getStrDate[1].$year";

			$getBday = new DateTime($getBirthday);
			$getTday = new DateTime(date('Y-m-d H:i:s'));

			$diff = $getTday->diff($getBday);

			$birthday = "$getStrDate[2]/$getStrDate[1]/$year";
			$age      = $diff->y;
		}

		return redirect(url('account/register'))->with('check', 'ok')
												->with('citizen', $citizen)
												->with('username', $username)
												->with('birthday', $birthday)
												->with('age', $age);
	}
}