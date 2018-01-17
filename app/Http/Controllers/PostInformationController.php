<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Validator;
use Flash;


class PostInformationController extends Controller
{
	public function index()
	{
		$data['posts'] = Post::paginate(10);

		return view('postinformation.index', $data);

	}

	public function create()
	{
		$post = new Post;

		return view('postinformation.form', compact('post'));
	}

	public function store(Request $request)
	{
		$post = new Post;
		$post->title = (!empty($request->title) ? $request->title : '');
		$post->content = (!empty($request->content) ? $request->content : '');
		$post->save();

		Flash::success(sprintf('You\'ve successfully created the %s.', $post->title));
	}

	public function edit($id)
	{
		$post = Post::find($id);

		return view('postinformation.form', compact('post'));
	}

	public function update(Request $request, $id)
	{
		$post = Post::find($id);
		$post->title = (!empty($request->title) ? $request->title : '');
		$post->content = (!empty($request->content) ? $request->content : '');
		$post->save();

		Flash::success(sprintf('You\'ve successfully updated the %s.', $post->title));
	}

	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();

		Flash::success(sprintf('You\'ve successfully deleted the %s.', $post->title));
		return redirect()->route('post-information.index');
	}
}