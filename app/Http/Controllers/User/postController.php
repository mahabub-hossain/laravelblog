<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
class postController extends Controller
{
   public function showpost(post $slug){

       return view('user.post',compact('slug'));
   }

   public  function getAllposts(){
       $posts = post::where('status',1)->orderby('created_at','desc')->paginate(4);

   }
}
