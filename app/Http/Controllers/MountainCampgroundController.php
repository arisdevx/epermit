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
use App\Models\MountainCampground;
use Flash;
use Validator;
use Log;

class MountainCampgroundController extends Controller 
{
	public function index()
	{
		$data['campgrounds'] = MountainCampground::paginate(10);

		return view('mountaincampground.index', $data);
	}

	public function create()
	{
		$data['campground'] = new MountainCampground;
		$data['mountains']  = Mountain::get();

		return view('mountaincampground.form', $data);
	}

	public function store(Request $request)
	{
		$campground              = new MountainCampground;
		$campground->name        = (!empty($request->name) ? $request->name : '');
		$campground->capacity    = (!empty($request->capacity) ? $request->capacity : '0');
		$campground->mountain_id = (!empty($request->mountain) ? $request->mountain : 0);
		$campground->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $campground->name));
	}

	public function edit($id)
	{
		$data['campground'] = MountainCampground::find($id);
		$data['mountains']  = Mountain::get();

		return view('mountaincampground.form', $data);
	}

	public function update(Request $request, $id)
	{
		$campground              = MountainCampground::find($id);
		$campground->name        = (!empty($request->name) ? $request->name : '');
		$campground->capacity    = (!empty($request->capacity) ? $request->capacity : '0');
		$campground->mountain_id = (!empty($request->mountain) ? $request->mountain : 0);
		$campground->save();

		Flash::success(sprintf('You\'ve successfully updated the %s.', $campground->name));
	}

	public function destroy($id)
	{
		$campground = MountainCampground::find($id);
		$campground->delete();

		Flash::success(sprintf('You\'ve successfully deleted the %s.', $campground->name));

		return redirect('campground');
	}

}