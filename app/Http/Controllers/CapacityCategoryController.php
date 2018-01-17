<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\CapacityCategory;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\EcoPark;
use Flash;
use Validator;
use Log;

class CapacityCategoryController extends Controller 
{
	public function index()
	{
		$data['categories'] = CapacityCategory::paginate(10);

		return view('capacitycategory.index', $data);
	}

	public function create()
	{
		$category = new CapacityCategory;

		return view('capacitycategory.form', compact('category'));
	}

	public function store(Request $request)
	{
		$category = new CapacityCategory;
		$category->name = (!empty($request->name) ? $request->name : '');
		$category->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $category->name));
	}

	public function edit($id)
	{
		$category = CapacityCategory::find($id);

		return view('capacitycategory.form', compact('category'));
	}

	public function update(Request $request, $id)
	{
		$category = CapacityCategory::find($id);
		$category->name = (!empty($request->name) ? $request->name : '');
		$category->save();

		Flash::success(sprintf('You\'ve successfully updated the %s.', $category->name));
	}

	public function destroy($id)
	{
		$category = CapacityCategory::find($id);
		$category->delete();

		Flash::success(sprintf('You\'ve successfully updated the %s.', $category->name));

		return redirect('capacity-category');
	}
}