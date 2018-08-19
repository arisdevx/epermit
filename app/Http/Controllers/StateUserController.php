<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\StateUser;
use Illuminate\Http\Request;
use Flash;
use Validator;
use Log;

class StateUserController extends Controller
{
	public function index(Request $request)
	{
		$data['states'] = StateUser::whereRaw('name LIKE ?', ['%'. $request->search .'%'])->paginate(10);

		return view('stateuser.index', $data);
	}

	public function create()
	{
		$state = new StateUser;

		return view('stateuser.form', compact('state'));
	}

	public function store(Request $request)
	{
		$name = $request->name;

		$state = new StateUser;
		$state->name = $name;
		$state->save();

		activityLog('Tambah Negeri ' . $state->name);

		Flash::success(sprintf('You\'ve successfully created the %s negeri.', $state->name));
	}

	public function edit($id)
	{
		$state = StateUser::find($id);

		return view('stateuser.form', compact('state'));
	}

	public function update(Request $request, $id)
	{
		$name = $request->name;

		$state = StateUser::find($id);
		$state->name = $name;
		$state->save();

		activityLog('Kemaskini Negeri ' . $state->name);

		Flash::success(sprintf('Anda telah berjaya mengemaskini maklumat negeri %s.', $state->name));
	}

	public function destroy($id)
	{
		$state = StateUser::find($id);
		$state->delete();

		Flash::success(sprintf('You\'ve successfully deleted the %s negeri.', $state->name));

		return redirect(route('state-user.index'));
	}
}