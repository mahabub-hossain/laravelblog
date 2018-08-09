<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.category');
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
        $create_category = view('admin.category.create_category');
        return view('admin.layouts.app')
            ->with('main-content', $create_category);
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

        $category = new category();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        Session::put('message','Category Inserted Successfully');
        return Redirect::to('/create-category');
    }

    public  function manageCategory(){
        $allcategories = category::all();

        $show_category = view('admin.category.show_category',['allcategories'=>$allcategories]);
        //->with('alltag',$alltag);
        return view('admin.layouts.app')
            ->with('main-content', $show_category);


    }

    public function editCategory($category_id)
    {
        $category = category::where('id',$category_id)->first();
        $edit_category = view('admin.category.edit_category',['category'=>$category]);
        return view('admin.layouts.app')
            ->with('main-content', $edit_category);
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

        $category =  category::find($id);
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        return Redirect::to('/edit-category/'.$id);
    }

    public function removeCategory($category_id){

        category::where('id',$category_id)->delete();
        return Redirect::to('/manage-category');
//        DB::table('tags')
//            ->where('id', $tag_id)
//            ->delete();
        Session::put('message','Category Deleted Successfully');
        return Redirect::to('/manage-category');


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
