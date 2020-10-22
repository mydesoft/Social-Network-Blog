<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;
use App\Status;
use Auth;

class AdminController extends Controller
{
   public function admindashboard()
   {

    $posts = Post::orderBy('created_at', 'desc')->paginate(3);

   	return view('admin.admindashboard', compact('posts'));
   }


   public function account()
   {
   	 return view('admin.account');
   }


    public function allusers()
   {

    $users = User::paginate(8);

   	 return view('admin.allusers', compact('users'));
   }


    public function suspendedusers()
   {
    $users = User::orderBy('created_at', 'desc')->get();

   	 return view('admin.suspendedusers', compact('users'));
   }

    public function alladmin()
   {

    $users = User::paginate(6);

   	 return view('admin.alladmin', compact('users'));
   }
  

   public function destroy($id)
   {
     $user = User::find($id);

     $user->delete();

     return back()->with('success', 'User has been deleted');
   }
}
