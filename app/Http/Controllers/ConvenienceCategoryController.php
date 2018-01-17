<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\ConvenienceCategory;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\EcoPark;
use Flash;
use Validator;
use Log;

class ConvenienceCategoryController extends Controller
{
	public function index()
	{
		$data['categories'] = ConvenienceCategory::paginate(10);

		return view('conveniencecategory.index', $data);
	}

	public function create()
	{
		$category = new ConvenienceCategory;

		return view('conveniencecategory.form', compact('category'));
	}

	public function store(Request $request)
	{
		$category = new ConvenienceCategory;
		$category->name = (!empty($request->name) ? $request->name : '');
		$category->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $category->name));
	}

	public function edit($id)
	{
		$category = ConvenienceCategory::find($id);

		return view('conveniencecategory.form', compact('category'));
	}

	public function update(Request $request, $id)
	{
		$category = ConvenienceCategory::find($id);
		$category->name = (!empty($request->name) ? $request->name : '');
		$category->save();

		Flash::success(sprintf('You\'ve successfully updated the %s.', $category->name));
	}

	public function destroy($id)
	{
		$category = ConvenienceCategory::find($id);
		$category->delete();

		Flash::success(sprintf('You\'ve successfully deleted the %s.', $category->name));

		return redirect('convenience-category');
	}
}