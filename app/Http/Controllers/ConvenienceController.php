<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\ModeRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Convenience;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Area;
use App\Models\EcoPark;
use App\Models\ConvenienceCategory;
use App\Models\ConvenienceSubCategory;
use App\Models\ConveniencePrice;
use App\Models\CapacityCategory;
use App\Models\PriceCategory;
use Flash;
use Validator;
use Log;

class ConvenienceController extends Controller
{
	public function index(Request $request)
	{
		$data['conveniences'] = Convenience::paginate(10);

		return view('convenience.index', $data);
	}

	public function create()
	{
		$data['states'] = State::get();
		$data['areas']  = Area::get();
		$data['ecoparks'] = EcoPark::get();
		$data['convenience'] = new Convenience;
		$data['conveniencecategories'] = ConvenienceCategory::get();
		$data['capacitycategories'] = CapacityCategory::get();
		$data['prices'] = PriceCategory::get();

		return view('convenience.form', $data);
	}

	public function store(Request $request)
	{

		$convenience                              = new Convenience;
		$convenience->state_id                    = (!empty($request->state) ? $request->state : '');
		$convenience->area_id                     = (!empty($request->area) ? $request->area : '');
		$convenience->eco_park_id                 = (!empty($request->ecopark) ? $request->ecopark : '');
		$convenience->type 						  = (!empty($request->category) ? $request->category : '');
		$convenience->capacity                    = (!empty($request->capacity) ? $request->capacity : '');
		$convenience->price 					  = (!empty($request->price) ? $request->price : '');
		$convenience->convenience_category_id     = (!empty($request->conveniencecategory) ? $request->conveniencecategory : 0);
		$convenience->save();

		if(!empty($request->convenience_subcategory))
		{
			$convenience_subcategory       = new ConvenienceSubCategory;
			$convenience_subcategory->name = $request->convenience_subcategory;
			$convenience_subcategory->convenience_id = $convenience->id;
			$convenience_subcategory->save();
		}

		activityLog('Tambah Tempah Kemudahan ' . $convenience->name);

		Flash::success(sprintf('You\'ve successfully created the %s.', $convenience->name));

	}

	public function edit($id)
	{
		$data['states']                     = State::get();
		$data['areas']  					= Area::get();
		$data['convenience'] 				= Convenience::find($id);
		$data['ecoparks'] 					= EcoPark::where([
												'state_id' => $data['convenience']->state_id
											  ])->get();
		$data['conveniencecategories'] 		= ConvenienceCategory::get();
		$data['conveniencesubcategories'] 	= ConvenienceSubCategory::where('convenience_id', $data['convenience']->id)->get();
		$data['capacitycategories'] 		= CapacityCategory::get();
		$data['prices'] 					= ConveniencePrice::where('convenience_id', $id)->get();

		return view('convenience.form', $data);
	}

	public function update(Request $request, $id)
	{

		$convenience                              = Convenience::find($id);
		$convenience->state_id                    = (!empty($request->state) ? $request->state : '');
		$convenience->area_id                     = (!empty($request->area) ? $request->area : '');
		$convenience->eco_park_id                 = (!empty($request->ecopark) ? $request->ecopark : '');
		$convenience->type 						  = (!empty($request->category) ? $request->category : '');
		$convenience->capacity                    = (!empty($request->capacity) ? $request->capacity : '');
		$convenience->price 					  = (!empty($request->price) ? $request->price : '');
		$convenience->convenience_category_id     = (!empty($request->conveniencecategory) ? $request->conveniencecategory : 0);
		$convenience->save();

		if(!empty($request->convenience_subcategory))
		{
			$convenience_subcategory                 = ConvenienceSubCategory::where('convenience_id', $convenience->id)->first();
			$convenience_subcategory->name           = $request->convenience_subcategory;
			$convenience_subcategory->convenience_id = $convenience->id;
			$convenience_subcategory->save();
		}

		activityLog('Update Tempah Kemudahan ' . $convenience->name);

		Flash::success(sprintf('You\'ve successfully changed the %s.', $convenience->name));
	}

	public function destroy($id)
	{
		$convenience = Convenience::find($id);
		activityLog('Hapus Tempah Kemudahan ' . $convenience->name);
		$convenience->delete();

		Flash::success(sprintf('%s has been deleted.', $convenience->name));
        return redirect()->route('convenience.index');
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

	public function findEcoPark(Request $request)
	{
		$ecoparks = EcoPark::where([
						'state_id' => $request->state_id,
						'area_id' => $request->area_id,
						'type' => $request->category
					])->get();

		$data[] = [
			'id' => '',
			'text' => ''
		];

		foreach($ecoparks as $ecopark)
		{
			$data[] = [
				'id' => $ecopark->id,
				'text' => $ecopark->name
			];
		}

		return response()->json($data);
	}

	public function findConvenienceSubCategory(Request $request)
	{
		$subcategories = ConvenienceSubCategory::where('convenience_category_id', $request->convenience_category_id)->get();

		if(!$subcategories->isEmpty())
		{
			$data[] = [
				'id' => '',
				'text' => ''
			];

			foreach($subcategories as $category)
			{
				$data[] = [
					'id' => $category->id,
					'text' => $category->name
				];
			}
		}
		else
		{
			$data[] = 'empty';
		}

		return response()->json($data);
	}
}