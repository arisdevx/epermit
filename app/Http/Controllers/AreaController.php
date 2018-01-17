<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\State;
use App\Models\Area;
use Illuminate\Http\Request;
use Flash;
use Validator;
use Log;

class AreaController extends Controller {

	public function index(Request $request)
	{
		$data['areas'] = Area::where(function($q) use ($request){
									$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })->paginate(10);

		return view('area.index', $data);
	}

	public function create()
	{
		$area = new Area;
		$states = State::get();

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

		Flash::success(sprintf('You\'ve successfully created the %s daerah.', $area->name));
        // return ['errors' => false];
	}

	public function edit($id)
	{
		$area = Area::find($id);
		$states = State::get();

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

		Flash::success(sprintf('You\'ve successfully changed the %s daerah.', $area->name));
        // return ['errors' => false];
	}

	public function destroy($id)
	{
		$area = Area::find($id);
		activityLog('Hapus Daerah ' . $area->name);
		$area->delete();

		Flash::success(sprintf('%s has been deleted.', $area->name));
        return redirect()->route('area.index');
	}

}