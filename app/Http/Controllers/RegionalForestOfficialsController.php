<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\RegionalForestry;
use Flash;
use Validator;
use Log;

class RegionalForestOfficialsController extends Controller
{
	public function index(Request $request)
	{
		$data['regionalforestries'] = RegionalForestry::where(function($q) use ($request){
											$q->whereRaw('LOWER(name) LIKE ?', ['%'.strtolower($request->search).'%']);
									   })->paginate(10);

		return view('regionalforestry.index', $data);
	}

	public function create()
	{
		$states = State::get();
		$areas  = Area::get();
		$regionalforestry = new RegionalForestry;

		return view('regionalforestry.form', compact('states', 'areas', 'regionalforestry'));
	}

	public function store(Request $request)
	{
		$validate = Validator::make($request->all(), [
						'name' => 'required|max:100',
						'state' => 'required',
						'area' => 'required'
					]);

		if($validate->fails())
		{
			return ['error' => $validate->errors()];
		}

		$regionalforestry           = new RegionalForestry;
		$regionalforestry->name     = $request->name;
		$regionalforestry->state_id = $request->state;
		$regionalforestry->area_id  = $request->area;
		$regionalforestry->update   = (!empty($request->update) ? 'Y' : 'N');
		$regionalforestry->delete   = (!empty($request->delete) ? 'Y' : 'N');
		$regionalforestry->address = (!empty($request->address) ? $request->address : '');
		$regionalforestry->phone = (!empty($request->phone) ? $request->phone : '');
		$regionalforestry->fax = (!empty($request->fax) ? $request->fax : '');
		$regionalforestry->email = (!empty($request->email) ? $request->email : '');
		$regionalforestry->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $regionalforestry->name));

        return ['errors' => false];
	}

	public function edit($id)
	{
		$states = State::get();
		$areas  = Area::get();
		$regionalforestry = RegionalForestry::find($id);

		return view('regionalforestry.form', compact('states', 'areas', 'regionalforestry'));
	}

	public function update(Request $request, $id)
	{
		$validate = Validator::make($request->all(), [
						'name' => 'required|max:100',
						'state' => 'required',
						'area' => 'required'
					]);

		if($validate->fails())
		{
			return ['error' => $validate->errors()];
		}

		$regionalforestry           = RegionalForestry::find($id);
		$regionalforestry->name     = $request->name;
		$regionalforestry->state_id = $request->state;
		$regionalforestry->area_id  = $request->area;
		$regionalforestry->update   = (!empty($request->update) ? 'Y' : 'N');
		$regionalforestry->delete   = (!empty($request->delete) ? 'Y' : 'N');
		$regionalforestry->address = (!empty($request->address) ? $request->address : '');
		$regionalforestry->phone = (!empty($request->phone) ? $request->phone : '');
		$regionalforestry->fax = (!empty($request->fax) ? $request->fax : '');
		$regionalforestry->email = (!empty($request->email) ? $request->email : '');
		$regionalforestry->save();

		Flash::success(sprintf('You\'ve successfully changed the %s.', $regionalforestry->name));

        return ['errors' => false];
	}

	public function destroy($id)
	{
		$regionalforestry = RegionalForestry::find($id);
		$regionalforestry->delete();

		Flash::success(sprintf('%s has been deleted.', $regionalforestry->name));
        return redirect()->route('regional-forest-officials.index');
	}

	public function findArea(Request $request)
	{
		$areas = Area::where('state_id', $request->id)->get();

		$html = '';

		foreach($areas as $area)
		{
			$html .= '<option value="'. $area->id .'">'. $area->name .'</option>';
		}

		return $html;
	}
}