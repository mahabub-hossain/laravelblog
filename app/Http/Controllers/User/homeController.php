<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\category;
use App\Tag;
class homeController extends Controller
{
    public function index(){
        $posts = post::where('status',1)->orderby('created_at','desc')->paginate(4);
        return view('user.blog',compact('posts'));
    }
    public function tag(Tag $tag){

        $posts = $tag->posts();
        return view('user.blog',compact('posts'));
    }
    public function category(category $category){

       //return $category = category::where('name',$slug)->get();
        $posts = $category->posts();
        return view('user.blog',compact('posts'));
    }
}
