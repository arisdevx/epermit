<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\State;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\UserLocation;
use Flash;
use Validator;
use Log;

class AreaController extends Controller {

	public function index(Request $request)
	{
		$location = UserLocation::where('user_id', auth()->user()->id)->first();

		if(!empty($location))
		{
			if(!empty($location->state_id) AND $location->area_id == 0)
			{
				$data['areas'] = Area::where(function($q) use ($request){
									$q->whereRaw('LOWER(areas.name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })
							   ->where('state_id', $location->state_id)->paginate(10);
			}
			else
			{
				$data['areas'] = Area::where(function($q) use ($request){
									$q->whereRaw('LOWER(areas.name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })
								->paginate(10);
			}
		}
		else
		{
			$data['areas'] = Area::where(function($q) use ($request){
									$q->whereRaw('LOWER(areas.name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })
								->paginate(10);
		}

		return view('area.index', $data);
	}

	public function create()
	{
		$area = new Area;
		$location = UserLocation::where('user_id', auth()->user()->id)->first();

		if(!empty($location))
		{
			if($location->state_id != 0 AND $location->area_id == 0)
			{
				$states    = State::where('id', $location->state_id)->get();
			}
			else
			{
				$states    = State::get();
			}
		}
		else
		{
			$states    = State::get();
		}

		return view('area.form', compact('area', 'states'));
	}

	public function store(Request $request)
	{
		// $validate = Validator::make($request->all(), [
		// 		'state' => 'required',
		// 		'name' => 'required|max:100'
		// 	]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors];
		// }

		$area           = new Area;
		$area->name     = (!empty($request->name) ? $request->name : '');
		$area->state_id = (!empty($request->state) ? $request->state : '');
		$area->save();

		activityLog('Tambah Daerah ' . $area->name);

		Flash::success(sprintf('Anda telah berjaya menambah maklumat %s.', $area->name));
        // return ['errors' => false];
	}

	public function edit($id)
	{
		$area = Area::find($id);
		$location = UserLocation::where('user_id', auth()->user()->id)->first();

		if(!empty($location))
		{
			if($location->state_id != 0 AND $location->area_id == 0)
			{
				$states    = State::where('id', $location->state_id)->get();
			}
			else
			{
				$states    = State::get();
			}
		}
		else
		{
			$states    = State::get();
		}

		return view('area.form', compact('area', 'states'));
	}

	public function update(Request $request, $id)
	{
		// $validate = Validator::make($request->all(), [
		// 		'state' => 'required',
		// 		'name' => 'required|max:100'
		// 	]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors];
		// }

		$area           = Area::find($id);
		$area->name     = (!empty($request->name) ? $request->name : '');
		$area->state_id = (!empty($request->state) ? $request->state : '');

		$area->save();

		activityLog('Update Daerah ' . $area->name);

		Flash::success(sprintf('Anda telah berjaya mengemaskini maklumat %s.', $area->name));
        // return ['errors' => false];
	}

	public function destroy($id)
	{
		$area = Area::find($id);
		activityLog('Hapus Daerah ' . $area->name);
		$area->delete();

		Flash::success(sprintf('Anda telah berjaya memadam maklumat %s.', $area->name));
        return redirect()->route('area.index');
	}

}