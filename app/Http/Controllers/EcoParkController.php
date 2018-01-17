<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\EcoPark;
use App\Models\PermanentForest;
use Flash;
use Validator;
use Log;

class EcoParkController extends Controller
{
	public function index(Request $request)
	{
			
		$data['ecoparks'] = EcoPark::where(function($q) use ($request){
									$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })->paginate(10);

		return view('ecopark.index', $data);
	}

	public function create()
	{
		$states  = State::get();
		$areas   = Area::get();
		$ecopark = new EcoPark;

		return view('ecopark.form', compact('areas', 'states', 'ecopark'));
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
		// 		'state' => 'required',
		// 		'area' => 'required',
		// 		'name' => 'required|max:100'
		// 	]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors() ];
		// }

		$ecopark           = new EcoPark;
		$ecopark->state_id = (!empty($request->state) ? $request->state : '');
		$ecopark->area_id  = (!empty($request->area) ? $request->area : '');
		$ecopark->name     = (!empty($request->name) ? $request->name : '');
		$ecopark->type     = (!empty($request->type) ? $request->type : 'ter');
		$ecopark->permanent_forest_id = (!empty($request->permanentforest) ? $request->permanentforest : '');
		$ecopark->price    = 0;
		$ecopark->active   = (!empty($request->active) ? $request->active : '0');
		$ecopark->capacity = (!empty($request->capacity) ? $request->capacity : '0');
		$ecopark->save();

		activityLog('Tambah Taman Eko-Rimba ' . $ecopark->name);

		Flash::success(sprintf('You\'ve successfully created the %s.', $ecopark->name));

        // return ['errors' => false];

	}

	public function edit($id)
	{
		$states = State::get();
		$areas = Area::get();
		$ecopark = EcoPark::find($id);
		$forests = PermanentForest::where([
					'state_id' => $ecopark->state_id,
					'area_id' => $ecopark->area_id
				   ])->get();

		return view('ecopark.form', compact('areas', 'states', 'ecopark', 'forests'));
	}

	public function update(Request $request, $id)
	{
		// $validate = Validator::make($request->all(), [
		// 		'state' => 'required',
		// 		'area' => 'required',
		// 		'name' => 'required|max:100'
		// 	]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors() ];
		// }

		$ecopark           = EcoPark::find($id);
		$ecopark->state_id = (!empty($request->state) ? $request->state : '');
		$ecopark->area_id  = (!empty($request->area) ? $request->area : '');
		$ecopark->name     = (!empty($request->name) ? $request->name : '');
		$ecopark->type     = (!empty($request->type) ? $request->type : 'ter');
		$ecopark->permanent_forest_id = (!empty($request->permanentforest) ? $request->permanentforest : '');
		$ecopark->price    = 0;
		$ecopark->active   = (!empty($request->active) ? $request->active : '0');
		$ecopark->capacity = (!empty($request->capacity) ? $request->capacity : '0');
		$ecopark->save();

		activityLog('Update Taman Eko-Rimba ' . $ecopark->name);

		Flash::success(sprintf('You\'ve successfully changed the %s.', $ecopark->name));
		// return ['error' => false];
	}

	public function destroy($id)
	{
		$ecopark = EcoPark::find($id);
		activityLog('Hapus Taman Eko-Rimba ' . $ecopark->name);
		$ecopark->delete();

		Flash::success(sprintf('%s has been deleted.', $ecopark->name));
        return redirect()->route('eco-park.index');
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