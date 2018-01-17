<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Validator;
use Flash;


class SliderController extends Controller
{
	public function index()
	{
		$data['sliders'] = Slider::paginate(10);

		return view('slider.index', $data);
	}

	public function create()
	{
		$slider = new Slider;

		return view('slider.create', compact('slider'));
	}

	public function store(SliderRequest $request)
	{

		$image =  $request->file('files');
		
		$name  = time().'.'.$image->getClientOriginalExtension();
		$path  = public_path('/img/slider');
		$image->move($path, $name);

		$slider = new Slider;
		$slider->title = (!empty($request->title) ? $request->title : ' ');
		$slider->image = $name;
		$slider->url = url('img/slider/' . $name);
		$slider->save();

		Flash::success(sprintf('You\'ve successfully created the %s slider.', $slider->name));
		return redirect(route('slider-setting.index'));

	}

	public function edit($id)
	{
		$slider = Slider::find($id);

		return view('slider.edit', compact('slider'));
	}

	public function update(SliderRequest $request, $id)
	{
		$slider = Slider::find($id);

		Storage::delete(public_path('img/slider/' . $slider->image));

		if($request->hasFile('files'))
		{
			$image =  $request->file('files');
		
			$name  = time().'.'.$image->getClientOriginalExtension();
			$path  = public_path('/img/slider');
			$image->move($path, $name);
			$slider->image = $name;
			$slider->url = url('img/slider/' . $name);
		}

		$slider->title = (!empty($request->title) ? $request->title : ' ');
		$slider->save();
		Flash::success(sprintf('You\'ve successfully changed the %s slider.', $slider->name));
		return redirect(route('slider-setting.index'));
	}

	public function destroy($id)
	{
		$slider = Slider::find($id);

		Storage::delete(public_path('img/slider/' . $slider->image));
		$slider->forceDelete();

		Flash::success(sprintf('You\'ve successfully remove the %s slider.', $slider->name));
		return redirect(route('slider-setting.index'));
	}
}