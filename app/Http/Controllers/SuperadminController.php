<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\post;
class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
//post options
    public function createPost()
    {
        $create_post = view('admin.post.create_post');
       return view('admin.layouts.app')
                         ->with('main-content', $create_post);
    }

    public function savePost(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

        $post = new post();
        $post->title=$request->title;
        $post->subtitle=$request->subtitle;
        $post->slug=$request->slug;
        $post->body=$request->body;
        $post->save();
        return Redirect::to('/create-post');
    }


    //category options
    public function createCategory()
    {
        $create_category = view('admin.category.create_category');
        return view('admin.layouts.app')
            ->with('main-content', $create_category);
    }


    //category options
    public function createtag()
    {
        $create_tag = view('admin.tag.create_tag');
        return view('admin.layouts.app')
            ->with('main-content', $create_tag);
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
