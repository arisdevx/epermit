<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\StateForestry;
use Flash;
use Validator;
use Log;

class StateForestryDepartmentController extends Controller
{
	public function index(Request $request)
	{
		$data['stateforestries'] = StateForestry::where(function($q) use ($request){
													$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
											   })->paginate(10);

		return view('stateforestry.index', $data);
	}

	public function create()
	{
		$states = State::get();
		$stateforestry = new StateForestry;

		return view('stateforestry.form', compact('states', 'stateforestry'));
	}

	public function store(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'name' => 'required|max:100',
			'state' => 'required'
		]);

		if($validate->fails())
		{
			return ['error' => $validate->errors()];
		}

		$stateforestry = new StateForestry;
		$stateforestry->name = $request->name;
		$stateforestry->update = (!empty($request->update) ? 'Y' : 'N');
		$stateforestry->delete = (!empty($request->delete) ? 'Y' : 'N');
		$stateforestry->state_id = $request->state;
		$stateforestry->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $stateforestry->name));

        return ['errors' => false];
	}

	public function edit($id)
	{
		$states = State::get();
		$stateforestry = StateForestry::find($id);

		return view('stateforestry.form', compact('states', 'stateforestry'));
	}

	public function update(Request $request, $id)
	{
		$validate = Validator::make($request->all(), [
			'name' => 'required|max:100',
			'state' => 'required'
		]);

		if($validate->fails())
		{
			return ['error' => $validate->errors()];
		}

		$stateforestry           = StateForestry::find($id);
		$stateforestry->name     = $request->name;
		$stateforestry->update   = (!empty($request->update) ? 'Y' : 'N');
		$stateforestry->delete   = (!empty($request->delete) ? 'Y' : 'N');
		$stateforestry->state_id = $request->state;
		$stateforestry->save();

		Flash::success(sprintf('You\'ve successfully changed the %s.', $stateforestry->name));

        return ['errors' => false];
	}

	public function destroy($id)
	{
		$stateforestry = StateForestry::find($id);

		$stateforestry->delete();

		Flash::success(sprintf('%s negeri has been deleted.', $stateforestry->name));
        return redirect()->route('state-forestry-department.index');
	}
}