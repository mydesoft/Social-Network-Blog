<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Status;
use Auth;

class AdminActionsController extends Controller
{
     public function suspend($id)
   {


     $user = User::where('id', $id)->firstOrFail();

     if(!$user->isActive()){
     	return back();
     }
     else{
     	 	$statuse = Status::where('status', 'active')->firstOrFail();
     		$user->statuses()->detach($statuse->id);

     		$status = Status::where('status', 'suspended')->firstOrFail();
     		$user->statuses()->attach($status->id);

     		 return back()->with('success', 'User Suspended!');
     }

   }


  public function unban($id)
   {
     $user = User::where('id', $id)->firstOrFail();

     $statuse = Status::where('status', 'suspended')->firstOrFail();
     $user->statuses()->detach($statuse->id);

     $status = Status::where('status', 'active')->firstOrFail();
	 $user->statuses()->attach($status->id);

     return back()->with('success', 'User Removed from suspension!');
     

   }


   public function removeadmin($id)
   {
   	  $user = User::where('id', $id)->firstOrFail();

   	  $role = Role::where('name', 'admin')->firstOrFail();
   	  $user->roles()->detach($role->id);


   	  $userRole = Role::where('name', 'user')->firstOrFail();
   	  $user->roles()->attach($userRole->id);

   	  return back()->with('success', 'Admin Priviledge Removed!');
   }


   public function createadmin(Request $request)
   {
   	$request->validate([

   		'name' => 'required',
   		'email' => 'required',
   		'username' => 'required',
   		'password' => 'required'
   	]);

   	$user = new User;
   	$user->name = $request->name;
   	$user->email = $request->email;
   	$user->username = $request->username;
   	$user->password = Hash::make($request->password);
   	$user->save();

   	$role = Role::where('name', 'admin')->firstOrFail();
   	$user->roles()->attach($role->id);

   	$status = Status::where('status', 'active')->firstOrFail();
    $user->statuses()->attach($status->id);

    return back()->with('success', 'Admin have been Created!');
   }
}
