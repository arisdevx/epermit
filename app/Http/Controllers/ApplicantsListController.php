<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Auth;
use Flash;
use Validator;
use Log;

class ApplicantsListController extends Controller
{

	public function index(Request $request)
	{
		$users = User::where('name', 'like', '%'. $request->search .'%')
                        ->whereHas('user_role.role.mode_role.mode', function($q) {
            $q->where('name', 'pemohon');
        })
        ->paginate(20);

        return view('applicant.index', compact('users'));
	}

	public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::whereIn('name', Auth::user()->allowed_roles('update'))
            ->whereHas('mode_role.mode', function($q) {
                $q->where('name', 'customer');
            })
            ->pluck('display_name', 'id');
        $role = $user->roles->first()->id;

        return view('applicant.form', compact('user', 'roles', 'role'));
    }

    public function update(Request $request, $id)
    {
    	$validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$id,id|max:255",
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user = User::find($id);
        $user->username = $request->nokp;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $user->username;
        $user->status = '1';
        $user->save();

        $profile = UserProfile::where('user_id', $id)->first();
        $profile->nokp = $request->nokp;
        $profile->passport = $request->nokp;
        $profile->save();

        Flash::success(sprintf('You\'ve successfully changed the %s info.', $user->name));
        return ['errors' => false];
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->syncRoles([]);
        $user->delete();

        Flash::success(sprintf('Berjaya memadam rekod %s', $user->name));
        return redirect()->route('applicants-list.index');
    }

}