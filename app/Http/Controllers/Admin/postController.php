<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\post;
use DB;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    }

    public function create()
    {
        if (Auth::User()->can('posts.create')) {
            $tags = Tag::all();
            $categories = category::all();
            $create_post = view('admin.post.create_post',compact('tags','categories'));
            return view('admin.layouts.app')
                ->with('main-content', $create_post);
        }
        return Redirect::to('admin/home');


    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
        ]);
        // if ($request->hasFile('image')){
        //     $imagename = $request->image->store('public');
        // }
        $productimage = $request->file('image');
        $name = time().'.'.$productimage->getClientOriginalExtension();
        $uploadPath ='public/blogimage/';
        $productimage->move($uploadPath, $name);
         $imgUrl =  $uploadPath.$name;

        $post = new post();
        $post->title=$request->title;
        $post->image=$imgUrl;
        $post->subtitle=$request->subtitle;
        $post->slug=$request->slug;
        $post->body=$request->body;
        $post->status=$request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return Redirect::to('/create-post');
    }
   public function managePost()
   {
        $allposts = post::all();
       $manage_post = view('admin.post.show_post',['allposts'=>$allposts]);
       return view('admin.layouts.app')
           ->with('main-content', $manage_post);
       }



    public function editPost($post_id)
    {
        if (Auth::User()->can('posts.update')) {
            $post = post::with('tags', 'categories')->where('id', $post_id)->first();//for multiple selection used tags and categories

            $tags = Tag::all();
            $categories = category::all();
            $edit_post = view('admin.post.edit_post', compact('tags', 'categories', 'post'));
            return view('admin.layouts.app')
                ->with('main-content', $edit_post);
        }
        return Redirect::to('admin/home');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

       $productimage = $request->file('image');
        if (!empty($productimage)) {
            $name = time().'.'.$productimage->getClientOriginalExtension();
             $uploadPath ='public/blogimage/';
             $productimage->move($uploadPath, $name);
            $imgUrl =  $uploadPath.$name;
            $post =  post::find($id);
            $post->title=$request->title;
            $post->image= $imgUrl;
            $post->subtitle=$request->subtitle;
            $post->slug=$request->slug;
            $post->body=$request->body;
            $post->status=$request->status;
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);
            $post->save();
            return Redirect::to('/edit-post/'.$id);

        } else {

            $post =  post::find($id);
            $post->title=$request->title;
            $post->subtitle=$request->subtitle;
            $post->slug=$request->slug;
            $post->body=$request->body;
            $post->status=$request->status;
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);
            $post->save();
            return Redirect::to('/edit-post/'.$id);

        }

    }

    public function removePost($id)
    {
       $postById = post::find($id);
       $unlinkimage = $postById->image;
       unlink($unlinkimage);
      $postById->delete();
      return Redirect::to('/manage-post')->with('message','Product Deleted Successfully');
    
    }
}
