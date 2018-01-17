<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\OthersActivity;
use Flash;
use Validator;
use Log;

class OthersActivityController extends Controller
{
	public function index(Request $request)
	{
		$data['activities'] = OthersActivity::where(function($q) use ($request){
									$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })->paginate(10);

		return view('othersactivity.index', $data);
	}

	public function create()
	{
		$states = State::get();
		$areas  = Area::get();
		$activity = new OthersActivity;

		return view('othersactivity.form', compact('states', 'areas', 'activity'));
	}

	public function store(Request $request)
	{
		// $validate = Validator::make($request->all(), [
		// 		'state' => 'required',
		// 		'area' => 'required',
		// 		'name' => 'required|max:100',
		// 		'price' => 'required',
		// 		'capacity' => 'required|numeric'
		// 	]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$activity           = new OthersActivity;
		$activity->state_id = (!empty($request->state) ? $request->state : '');
		$activity->area_id  = (!empty($request->area) ? $request->area : '');
		$activity->name     = (!empty($request->name) ? $request->name : '');
		$activity->price    = (!empty($request->price) ? $request->price : '');
		$activity->capacity = (!empty($request->capacity) ? $request->capacity : '');
		$activity->save();

		activityLog('Tambah Lain-lain Aktiviti ' . $activity->name);

		Flash::success(sprintf('You\'ve successfully created the %s.', $activity->name));

        // return ['errors' => false];
	}

	public function edit($id)
	{
		$states = State::get();
		$areas  = Area::get();
		$activity = OthersActivity::find($id);

		return view('othersactivity.form', compact('states', 'areas', 'activity'));
	}

	public function update(Request $request, $id)
	{
		$validate = Validator::make($request->all(), [
				'state' => 'required',
				'area' => 'required',
				'name' => 'required|max:100',
				'price' => 'required',
				'capacity' => 'required|numeric'
			]);

		if($validate->fails())
		{
			return ['error' => $validate->errors()];
		}

		$activity           = OthersActivity::find($id);
		$activity->state_id = $request->state;
		$activity->area_id  = $request->area;
		$activity->name     = $request->name;
		$activity->price    = $request->price;
		$activity->capacity = $request->capacity;
		$activity->save();
		activityLog('Update Lain-lain Aktiviti ' . $activity->name);

		Flash::success(sprintf('You\'ve successfully changed the %s.', $activity->name));

        return ['errors' => false];
	}

	public function destroy($id)
	{
		$activity = OthersActivity::find($id);
		activityLog('Hapus Lain-lain Aktiviti ' . $activity->name);
		$activity->delete();

		Flash::success(sprintf('%s has been deleted.', $activity->name));
        return redirect()->route('others-activity.index');
	}

	public function findArea(Request $request)
	{
		$areas = Area::where('state_id', $request->id)->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($areas as $area)
		{
			$data[] = [
				'id' => $area->id,
				'text' => $area->name
			];
		}

		return response()->json($data);
	}
}