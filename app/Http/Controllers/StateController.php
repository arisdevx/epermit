<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\State;
use Illuminate\Http\Request;
use Flash;
use Validator;
use Log;

class StateController extends Controller
{
	public function index(Request $request)
	{
		$data['states'] = State::where(function($q) use ($request){
									$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
							   })->paginate(10);

		return view('state.index', $data);
	}

	public function create()
	{
		$state = new State;

		return view('state.form', compact('state'));
	}

	public function store(Request $request)
	{
		// $validate = Validator::make($request->all(), [
		// 			'name' => 'required|max:100'
		// ]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$state       = new State;
		$state->name = (!empty($request->name) ? $request->name : '');
		$state->save();

		activityLog('Tambah Negeri ' . $state->name);

		Flash::success(sprintf('You\'ve successfully created the %s negeri.', $state->name));
        // return ['errors' => false];
		
	}

	public function edit($id)
	{
		$state = State::find($id);

		return view('state.form', compact('state'));
	}

	public function update(Request $request, $id)
	{
		// $validate = Validator::make($request->all(), [
		// 				'name' => 'required|max:100'
		// 	]);

		// if($validate->fails())
		// {
		// 	return ['error' => $validate->errors()];
		// }

		$state = State::find($id);
		$state->name = (!empty($request->name) ? $request->name : '');
		$state->save();

		activityLog('Update Negeri ' . $state->name);

		Flash::success(sprintf('You\'ve successfully changed the %s info.', $state->name));
        // return ['errors' => false];
	}

	public function destroy($id)
	{
		$state = State::find($id);
		activityLog('Hapus Negeri ' . $state->name);
		$state->delete();

		Flash::success(sprintf('%s negeri has been deleted.', $state->name));
        return redirect()->route('state.index');
	}
}