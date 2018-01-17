<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Setting;
use Flash;
use Validator;
use Log;

class HomepageController extends Controller
{
	public function index()
	{
		$data['homepage'] = Setting::where([
										'setting_key' => 'homepage'
								   ])->first();
		$data['footer']   = Setting::where([
										'setting_key' => 'footer'
								   ])->first();
		$data['logo']     = Setting::where([
										'setting_key' => 'logo'
									])->first();

		return view('homepage.index', $data);
	}

	public function store(Request $request)
	{
		
		$check = Setting::whereIn('setting_key', ['homepage', 'footer'])->get();
		$checkLogo = Setting::where('setting_key', 'logo')->first();

		if(count($check) == 0)
		{
			$homepage = new Setting;
			$homepage->setting_key = 'homepage';
			$homepage->setting_value = (!empty($request->homepage) ? $request->homepage : '');
			$homepage->save();

			$footer = new Setting;
			$footer->setting_key = 'footer';
			$footer->setting_value = (!empty($request->footer) ? $request->footer : '');
			$footer->save();

		}
		else
		{
			$homepage = Setting::where('setting_key', 'homepage')->first();
			$homepage->setting_key = 'homepage';
			$homepage->setting_value = (!empty($request->homepage) ? $request->homepage : '');
			$homepage->save();

			$footer = Setting::where('setting_key', 'footer')->first();;
			$footer->setting_key = 'footer';
			$footer->setting_value = (!empty($request->footer) ? $request->footer : '');
			$footer->save();
		}

		if(empty($checkLogo))
		{
			$image =  $request->file('logo');
		
			$name  = time().'.'.$image->getClientOriginalExtension();
			$path  = public_path('/img');
			$image->move($path, $name);

			$homepage = new Setting;
			$homepage->setting_key = 'logo';
			$homepage->setting_value = '/img/' . $name;
			$homepage->save();
		}
		else
		{
			if($request->hasFile('logo'))
			{
				$image =  $request->file('logo');
		
				$name  = time().'.'.$image->getClientOriginalExtension();
				$path  = public_path('/img');
				$image->move($path, $name);

				$homepage = Setting::where('setting_key', 'logo')->first();
				$homepage->setting_key = 'logo';
				$homepage->setting_value = '/img/' . $name;
				$homepage->save();
			}
		}

		Flash::success('Success');

		return redirect(route('homepage-setting.index'));
	}
}