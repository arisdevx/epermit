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
use Flash;
use Validator;
use Auth;
use Hash;

class UserAccessLogController extends Controller {

	public function index()
	{
		return view('useraccesslog.index');
	}

}