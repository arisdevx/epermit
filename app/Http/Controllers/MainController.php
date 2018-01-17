<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Post;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homepage'] = Setting::where('setting_key', 'homepage')->first();
        $data['footer']   = Setting::where('setting_key', 'footer')->first();
        $data['logo']     = Setting::where('setting_key', 'logo')->first();
        $data['sliders']  = Slider::get();
        $data['posts'] = Post::get();

        return view('account.main.index', $data);
    }

    public function getContent()
    {
        $data = [
            [
                'title' => 'text',
                'link' => 'https://asdasd.com/'
            ],
            [
                'title' => 'text 2',
                'link' => 'https://asdasd.com/'
            ],
        ];

        return response()->json($data);
    }

    public function getInformation($id)
    {
        $post = Post::find($id);

        return view('account.main.content', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
