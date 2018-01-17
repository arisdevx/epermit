<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\Mountain;
use App\Models\PermanentForest;
use App\Models\MountainCampground;
use Flash;
use Validator;
use Log;

class MountainController extends Controller
{
	public function index(Request $request)
	{
		$data['mountains'] = Mountain::where(function($q) use ($request){
											$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
									   })->paginate(10);

		return view('mountain.index', $data);
	}

	public function create()
	{
		$states = State::get();
		$areas = Area::get();
		$mountain = new Mountain;

		return view('mountain.form', compact('states', 'areas', 'mountain'));
	}

	public function findHsk(Request $request)
	{
		$forests = PermanentForest::where([
									'state_id' => $request->state_id,
									'area_id' => $request->area_id
								  ])
								  ->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($forests as $forest)
		{
			$data[] = [
				'id' => $forest->id,
				'text' => $forest->name
			];
		}

		return response()->json($data);
	}

	public function store(Request $request)
	{
		// $validate = Validator::make($request->all(), [
		// 				'name' => 'required|max:200',
		// 				'state' => 'required',
		// 				'area' => 'required',
		// 				'price' => 'required',
		// 				'campground' => 'required',
		// 				'capacity' => 'required',
		// 				'location' => 'required'
		// 			]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$mountain             = new Mountain;
		$mountain->name       = (!empty($request->name) ? $request->name : '');
		$mountain->price      = (!empty($request->price) ? $request->price : '');
		$mountain->campground = (!empty($request->campground) ? $request->campground : '0');
		$mountain->capacity   = (!empty($request->capacity) ? $request->capacity : '');
		$mountain->location   = (!empty($request->location) ? $request->location : '');
		$mountain->state_id   = (!empty($request->state) ? $request->state : '');
		$mountain->area_id    = (!empty($request->area) ? $request->area : '');
		$mountain->permanent_forest_id = (!empty($request->permanentforest) ? $request->permanentforest : '');
		$mountain->travel_day = (!empty($request->travel_day) ? $request->travel_day : '0');
		$mountain->travel_night = (!empty($request->travel_night) ? $request->travel_night : '0');
		$mountain->active       = (!empty($request->active) ? $request->active : '1');
		$mountain->save();

		if(!empty($request->campgrounds))
		{
			foreach($request->campgrounds as $key => $value)
			{
				if(!empty($value['name']))
				{
					$campground              = new MountainCampground;
					$campground->name        = $value['name'];
					$campground->capacity    = $value['capacity'];
					$campground->mountain_id = $mountain->id;
					$campground->save();
				}
			}
		}

		activityLog('Tambah Gunung ' . $mountain->name);

		Flash::success(sprintf('You\'ve successfully created the %s.', $mountain->name));

        // return ['errors' => false];
	}

	public function edit($id)
	{
		$states = State::get();
		$areas = Area::get();
		$mountain = Mountain::find($id);
		$forests = PermanentForest::where([
										'state_id' => $mountain->state_id,
										'area_id'  => $mountain->area_id
								   ])->get();
		$campgrounds = MountainCampground::where('mountain_id', $mountain->id)->get();


		return view('mountain.form', compact('states', 'areas', 'mountain', 'forests', 'campgrounds'));
	}

	public function update(Request $request, $id)
	{
		// $validate = Validator::make($request->all(), [
		// 				'name' => 'required|max:200',
		// 				'state' => 'required',
		// 				'area' => 'required',
		// 				'price' => 'required',
		// 				'campground' => 'required',
		// 				'capacity' => 'required',
		// 				'location' => 'required'
		// 			]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$mountain             = Mountain::find($id);
		$mountain->name       = (!empty($request->name) ? $request->name : '');
		$mountain->price      = (!empty($request->price) ? $request->price : '');
		$mountain->campground = (!empty($request->campground) ? $request->campground : '');
		$mountain->capacity   = (!empty($request->capacity) ? $request->capacity : '0');
		$mountain->location   = (!empty($request->location) ? $request->location : '');
		$mountain->state_id   = (!empty($request->state) ? $request->state : '');
		$mountain->area_id    = (!empty($request->area) ? $request->area : '');
		$mountain->travel_day = (!empty($request->travel_day) ? $request->travel_day : '0');
		$mountain->travel_night = (!empty($request->travel_night) ? $request->travel_night : '0');
		$mountain->active       = (!empty($request->active) ? $request->active : '0');
		$mountain->save();



		if(!empty($request->campgrounds))
		{
			$oldcamp = MountainCampground::where('mountain_id', $mountain->id);
			$oldcamp->forceDelete();

			foreach($request->campgrounds as $key => $value)
			{
				if(!empty($value['name']))
				{
					$campground              = new MountainCampground;
					$campground->name        = $value['name'];
					$campground->capacity    = $value['capacity'];
					$campground->mountain_id = $mountain->id;
					$campground->save();
				}
			}
		}
		activityLog('Update Gunung ' . $mountain->name);

		Flash::success(sprintf('You\'ve successfully changed the %s.', $mountain->name));

        // return ['errors' => false];
	}

	public function destroy($id)
	{
		$mountain = Mountain::find($id);
		activityLog('Hapus Gunung ' . $mountain->name);
		$mountain->delete();


		Flash::success(sprintf('%s has been deleted.', $mountain->name));
        return redirect()->route('hiking.index');
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

	public function findHskPrice(Request $request)
	{
		$hsk = PermanentForest::find($request->id);

		return $hsk->price;
	}
}