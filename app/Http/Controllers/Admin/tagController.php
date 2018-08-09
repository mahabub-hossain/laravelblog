<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Tag;
use DB;
use Harimayco\Menu\Facades\Menu;
use Harimayco\Menu\Models\Menus;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.tag');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create_tag = view('admin.tag.create_tag');
        return view('admin.layouts.app')
            ->with('main-content', $create_tag);
    }

    public function createmenu(){
        return view('admin.tag.create_menu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',

        ]);

        $tag = new Tag();
        $tag->name=$request->name;
        $tag->slug=$request->slug;

        $tag->save();
        Session::put('message','Tag Inserted Successfully');
        return Redirect::to('/create-tag');
    }

    public  function manageTag(){
        $alltag = Tag::all();
        $show_tag = view('admin.tag.show_tag',['alltag'=>$alltag]);
            //->with('alltag',$alltag);
        return view('admin.layouts.app')
            ->with('main-content', $show_tag);


    }

    public function removeTag($tag_id){

      Tag::where('id',$tag_id)->delete();
       return Redirect::to('/manage-tag');
//        DB::table('tags')
//            ->where('id', $tag_id)
//            ->delete();
        Session::put('message','Tag Deleted Successfully');
        return Redirect::to('/manage-tag');

    }

    public function editTag($tag_id)
    {
        $tag =Tag::where('id',$tag_id)->first();
        $edit_tag = view('admin.tag.edit_tag',['tag'=>$tag]);
        return view('admin.layouts.app')
            ->with('main-content', $edit_tag);
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
        $this->validate($request,[
            'name'=>'required',

            'slug'=>'required',

        ]);

        $tag =  Tag::find($id);
        $tag->name=$request->name;
        $tag->slug=$request->slug;
        $tag->save();
        return Redirect::to('/edit-tag/'.$id);
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
