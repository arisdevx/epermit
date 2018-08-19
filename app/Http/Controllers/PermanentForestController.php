<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\State;
use App\Models\Area;
use App\Models\PermanentForest;
use App\Models\Mountain;
use Illuminate\Http\Request;
use App\Models\UserLocation;
use Flash;
use Validator;
use Log;
use DB;

class PermanentForestController extends Controller
{
	public function index(Request $request)
	{
		$location = UserLocation::where('user_id', auth()->user()->id)->first();

		if(!empty($location))
		{
			if($location->state_id != 0 AND $location->area_id == 0)
			{
				$data['forests'] = PermanentForest::select(DB::raw('permanent_forests.*, states.name as state_name'))
											->join('states', 'states.id', '=', 'permanent_forests.state_id')
											->join('areas', 'areas.id', '=', 'permanent_forests.area_id')
											->where(function($q) use ($request){
												$q->whereRaw('LOWER(permanent_forests.name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   				})
							   				->whereRaw("permanent_forests.state_id = " . $location->state_id)
							   				->orderBy('states.name', 'ASC')
							   				->orderBy('areas.name', 'ASC')
											->has('state')->paginate(10);
			}
			else
			{
				$data['forests'] = PermanentForest::select(DB::raw('permanent_forests.*, states.name as state_name'))
											->join('states', 'states.id', '=', 'permanent_forests.state_id')
											->join('areas', 'areas.id', '=', 'permanent_forests.area_id')
											->where(function($q) use ($request){
												$q->whereRaw('LOWER(permanent_forests.name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   				})
							   				->orderBy('states.name', 'ASC')
							   				->orderBy('areas.name', 'ASC')
											->has('state')->paginate(10);
			}
		}
		else
		{
			$data['forests'] = PermanentForest::select(DB::raw('permanent_forests.*, states.name as state_name'))
											->join('states', 'states.id', '=', 'permanent_forests.state_id')
											->join('areas', 'areas.id', '=', 'permanent_forests.area_id')
											->where(function($q) use ($request){
												$q->whereRaw('LOWER(permanent_forests.name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   				})
							   				->orderBy('states.name', 'ASC')
							   				->orderBy('areas.name', 'ASC')
											->has('state')->paginate(10);
		}

		return view('permanentforest.index', $data);
	}

	public function create()
	{
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

		
		$areas     = Area::get();
		// $mountains = Mountain::get();
		$forest = new PermanentForest;

		return view('permanentforest.form', compact('states', 'areas', 'forest'));
	}

	public function store(Request $request)
	{
		// $validate = Validator::make($request->all(), [
		// 		'name'  => 'required|max:200',
		// 		'state' => 'required',
		// 		'area'  => 'required',
		// 		'location' => 'required',
		// 		'price' => 'required',
		// 		'mountain' => 'required'
		// ]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$forest              = new PermanentForest;
		$forest->name        = (!empty($request->name) ? $request->name : '');
		// $forest->location    = (!empty($request->location) ? $request->location : '');
		$forest->price       = (!empty($request->price) ? $request->price : '');
		$forest->state_id    = (!empty($request->state) ? $request->state : '');
		$forest->area_id     = (!empty($request->area) ? $request->area : '');
		// $forest->mountain_id = (!empty($request->mountain) ? $request->mountain : '');
		$forest->capacity     = (!empty($request->capacity) ? $request->capacity : '0');
		$forest->save();

		activityLog('Tambah Hutan Simpan Kekal ' . $forest->name);

		Flash::success(sprintf('Anda telah berjaya menambah maklumat %s.', $forest->name));

        // return ['errors' => false];
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

	public function findMountain(Request $request)
	{
		$mountains = Mountain::where(['state_id' => $request->state_id,
									  'area_id'  => $request->area_id])
							  ->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($mountains as $mountain)
		{
			$data[] = [
				'id' => $mountain->id,
				'text' => $mountain->name
			];
		}

		return response()->json($data);
	}

	public function edit($id)
	{
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
		$areas   = Area::get();
		
		$forest = PermanentForest::find($id);

		return view('permanentforest.form', compact('states', 'areas', 'forest'));
	}

	public function update(Request $request, $id)
	{
		// $validate = Validator::make($request->all(), [
		// 		'name'  => 'required|max:200',
		// 		'state' => 'required',
		// 		'area'  => 'required',
		// 		'location' => 'required',
		// 		'price' => 'required',
		// 		'mountain' => 'required'
		// ]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$forest              = PermanentForest::find($id);
		$forest->name        = (!empty($request->name) ? $request->name : '');
		// $forest->location    = (!empty($request->location) ? $request->location : '');
		$forest->price       = (!empty($request->price) ? $request->price : '');
		$forest->state_id    = (!empty($request->state) ? $request->state : '');
		$forest->area_id     = (!empty($request->area) ? $request->area : '');
		// $forest->mountain_id = (!empty($request->mountain) ? $request->mountain : '');
		$forest->capacity     = (!empty($request->capacity) ? $request->capacity : '0');
		$forest->save();

		activityLog('Update Hutan Simpan Kekal ' . $forest->name);

		Flash::success(sprintf('Anda telah berjaya mengemaskini maklumat %s.', $forest->name));

        // return ['errors' => false];
	}

	public function destroy($id)
	{
		$forest = PermanentForest::find($id);
		activityLog('Hapus Hutan Simpan Kekal ' . $forest->name);
		$forest->delete();

		Flash::success(sprintf('Anda telah berjaya memadam maklumat %s.', $forest->name));
        return redirect()->route('permanent-forest.index');
	}
}