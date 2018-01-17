<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\ConvenienceSubCategory;
use App\Models\ConvenienceCategory;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\EcoPark;
use Flash;
use Validator;
use Log;

class ConvenienceSubCategoryController extends Controller
{
	public function index()
	{
		$data['subcategories'] = ConvenienceSubCategory::paginate(10);

		return view('conveniencesubcategory.index', $data);
	}

	public function create()
	{
		$subcategory = new ConvenienceSubCategory;
		$categories  = ConvenienceCategory::get();

		return view('conveniencesubcategory.form', compact('subcategory', 'categories'));
	}

	public function store(Request $request)
	{
		$subcategory                          = new ConvenienceSubCategory;
		$subcategory->convenience_category_id = (!empty($request->conveniencecategory) ? $request->conveniencecategory : '');
		$subcategory->name                    = (!empty($request->name) ? $request->name : '');
		$subcategory->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $subcategory->name));
	}

	public function edit($id)
	{
		$subcategory = ConvenienceSubCategory::find($id);
		$categories  = ConvenienceCategory::get();

		return view('conveniencesubcategory.form', compact('subcategory', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$subcategory                          = ConvenienceSubCategory::find($id);
		$subcategory->convenience_category_id = (!empty($request->conveniencecategory) ? $request->conveniencecategory : '');
		$subcategory->name                    = (!empty($request->name) ? $request->name : '');
		$subcategory->save();

		Flash::success(sprintf('You\'ve successfully updated the %s.', $subcategory->name));
	}

	public function destroy($id)
	{
		$subcategory = ConvenienceSubCategory::find($id);
		$subcategory->delete();

		Flash::success(sprintf('You\'ve successfully deleted the %s.', $subcategory->name));

		return redirect('convenience-sub-category');
	}
}