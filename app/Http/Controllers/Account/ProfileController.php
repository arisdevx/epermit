<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Models\State;
use App\Models\Country;
use Auth;

class ProfileController extends Controller
{
	public function index()
	{
		$data['user'] = User::with(['profile'])
							->find(Auth::guard('applicant')->user()->id);
		$data['states'] = State::get();
		$data['countries'] = Country::get();

		return view('account.profile.index', $data);
	}

	public function update(ProfileRequest $request, $id)
	{
		$user        = User::find($id);
		$user->name  = (!empty($request->name) ? $request->name : '');
		$user->email = (!empty($request->email) ? $request->email : '');

		if(!empty($request->password))
		{
			$user->password = bcrypt($request->password);
		}

		if($user->save())
		{
			$profile            = UserProfile::where('user_id', $id)->first();
			$profile->avatar    = '';
			$profile->address_1 = (!empty($request->address) ? $request->address : '');
			$profile->address_2 = '';
			$profile->postcode  = (!empty($request->postcode) ? $request->postcode : '');
			$profile->city      = (!empty($request->city) ? $request->city : '');
			$profile->state     = (!empty($request->state) ? $request->state : '');
			$profile->country   = (!empty($request->country) ? $request->country : '');
			$profile->nokp      = (!empty($request->nokp) ? $request->nokp : '');
			$profile->age       = (!empty($request->age) ? $request->age : '');
			$profile->phonecode	= $request->phonecode;
			$profile->phone     = (!empty($request->phone) ? $request->phone : '');
			$profile->birthday  = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->birthday)));
			$profile->save();
			
			return redirect('account/member-profile')->with('status', 'success');
		}
		else
		{
			return redirect('account/member-profile')->with('status', 'error');
		}

	}
}