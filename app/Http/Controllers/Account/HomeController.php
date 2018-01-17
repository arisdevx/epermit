<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Auth;

class HomeController extends Controller
{
	public function index()
	{
		return view('account.home.index');
	}
}