<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuideConfig;
use App\Http\Requests\GuideConfigRequest;
use Flash;

class GuideConfigController extends Controller
{
    public function index()
    {
    	$data['guides'] = GuideConfig::paginate(10);

    	return view('guideconfig.index', $data);
    }

    public function create()
    {
    	$data['guide'] = new GuideConfig;

    	return view('guideconfig.form', $data);
    }

    public function store(GuideConfigRequest $request)
    {
    	$guide = new GuideConfig;
    	$guide->participant = $request->participant;
    	$guide->guides = $request->guide;
    	$guide->save();

    	Flash::success(sprintf('You\'ve successfully created the guide'));
    }

    public function edit($id)
    {
    	$data['guide'] = GuideConfig::find($id);

    	return view('guideconfig.form', $data);
    }

    public function update(GuideConfigRequest $request, $id)
    {
    	$guide = GuideConfig::find($id);
    	$guide->participant = $request->participant;
    	$guide->guides = $request->guide;
    	$guide->save();

    	Flash::success(sprintf('You\'ve successfully updated the guide'));
    }

    public function destroy($id)
    {
    	$guide = GuideConfig::find($id);

    	$guide->delete();
    	Flash::success(sprintf('You\'ve successfully delete the guide'));
    	return redirect(route('guide-config.index'));
    }
}
