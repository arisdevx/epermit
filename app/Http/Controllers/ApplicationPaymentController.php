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

class ApplicationPaymentController extends Controller
{
	public function index()
	{
		$data['statuses'] = Applicant::whereIn('status', ['2', '3'])->paginate(10);

		return view('applicationpayment.index', $data);
	}
}