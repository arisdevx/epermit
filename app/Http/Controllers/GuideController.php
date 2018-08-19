<?php 

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Flash;

class GuideController extends Controller 
{
	protected $setting;
	protected $guide;

	public function __construct(Setting $setting)
	{
		$this->setting = $setting;
		$this->guide   = $setting->where('setting_key', 'guide')->first();
	}

	public function index()
	{
		$data['guide'] = json_decode($this->guide->setting_value);

		return view('guide.index', $data);
	}

	public function store(Request $request)
	{
		$guides = [
			'participant' => $request->participant,
			'guide'		  => $request->guide,
		];

		if(!empty($this->guide))
		{
			$this->guide->setting_value = json_encode($guides);
			$this->guide->save();
		}
		else
		{
			$this->setting->setting_key = 'guide';
			$this->setting->setting_value = json_encode($guides);
			$this->setting->save();
		}

		Flash::success(sprintf('Anda telah berjaya mengemaskini maklumat malim'));

		return redirect(route('guide.index'));
	}
}