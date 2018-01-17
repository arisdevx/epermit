<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Applicant;
use Flash;
use Validator;
use Log;

class ApplicationCanceledController extends Controller
{
	public function index()
	{
		$data['statuses'] = Applicant::where([
								'status' => '5'
							])->paginate(10);

		return view('applicationcanceled.index', $data);
	}
}