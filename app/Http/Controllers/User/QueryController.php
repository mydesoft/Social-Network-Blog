<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ContactAdminNotification;
use App\User;
use App\Role;
use App\Query;
use Auth;
use Carbon\carbon;

class QueryController extends Controller
{
	public function contactadmin(Request $request)
	{

  		 $admin =  User::where('username', 'qAdmin')->firstOrFail();
  		 $user = Auth::user();

  		 $request->validate([

  		 	'name' => 'required',
  		 	'email' => 'required',
  		 	'message' => 'required'
  		 ]);

  		 	$query = new Query;
  		 	$query->name = $request->name;
  		 	$query->email = $request->email;
  		 	$query->message = $request->message;
  		 	$query->user_id = Auth::user()->id;
  		 	$query->save();
  		 

  		 $admin->notify(new ContactAdminNotification($user));
		
		return back()->with('success', 'Your Message has been sent, Admin will get back to you!');
	}



	

}
