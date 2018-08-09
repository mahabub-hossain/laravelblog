<?php

namespace App\Http\Controllers\Admin;

use App\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public  function manageUser(){

        $users = admin::all();
        $manage_user = view('admin.user.manage_user',['users'=>$users]);

        return view('admin.layouts.app')
            ->with('main-content', $manage_user);
    }

    public function createUser(){
//        $create_user = view('admin.user.create_user');
//        return view('admin.layouts.app')
//            ->with('main-content',$create_user);
        if (Auth::User()->can('posts.create')) {
            $roles = role::all();
            return view('admin.user.create_user', compact('roles'));
        }
        return Redirect::to('admin/home');
    }

    public function saveUser(Request $request){
       // return $request->all();
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|Unique:admins',
            'phone'=>'required|numeric|Unique:admins',
            'password'=>'required|min:6|confirmed',

        ]);

        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->roles);
        return redirect('create-user')->with('message','User creted Success Fully');

    }

    public function editUser($id){
        if (Auth::User()->can('posts.create')) {
            $user = admin::where('id', $id)->first();
            $roles = role::all();
            return view('admin.user.edit_user', compact('roles', 'user'));
        }
        return Redirect::to('admin/home');
    }

    public function updateUser(Request $request, $user_id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',


        ]);

        $request->status?:$request['status']=0;
        $user = admin::where('id',$user_id)->update($request->except('_token','roles'));
        admin::find($user_id)->roles()->sync($request->roles);
        return redirect('manage-user')->with('message','User Updated Successfully');
    }

    public function removeUser($id)
     {
         if (Auth::User()->can('posts.create')) {
             admin::where('id', $id)->delete();
             return redirect('manage-user')->with('alert', 'User Deleted Successfully');
         }
         return Redirect::to('admin/home');
      }
}
