<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\State;
use App\Models\Area;
use App\Models\Mountain;
use App\Models\Applicant;
use App\Model\HikingInformation;
use App\Models\HikingInsurance;
use App\Models\HikingBiodata;
use App\Models\HikingEmergency;
use App\Models\HikingHealth;
use App\Models\HikingHealthDetail;
use App\Models\HikingDeclaration;
use Auth;

class ApplicationController extends Controller
{
	public function index()
	{
		$data['states'] = State::get();

		return view('account.application.index');
	}

	public function findArea(Request $request)
	{
		$areas = Area::where('state_id', $request->id)->get();

		$html = '';

		foreach($areas as $area)
		{
			$html = '<option value="'. $area->id .'">'. $area->name .'</option>';
		}

		return $html;
	}
}