<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\FollowNotification;
use Auth;
use App\User;
use App\Friend;	
use App\Nptification;

class AddFriendController extends Controller
{
    public function follow($id){

        $follwedUser = Auth::user(); 

    	$user = User::find($id);

    	$user->followers()->attach(Auth::user()->id);

        $user->notify(new FollowNotification($follwedUser));

    	return back()->with('success', 'You have followed '.$user->name );
    }

  

    public function unfollow($id)
    {
    	$user = User::find($id);

    	$user->followers()->detach(Auth::user()->id);

        $user->notifications()->where('type','App\Notifications\FollowNotification')
                ->where('data->id', Auth::user()->id)->delete();

    	return back()->with('success', 'You have Unfollowed '.$user->name );

    }

    public function followers()
    {
    	return view('Friends.followers');
    }

     public function following()
    {
    	return view('Friends.following');
    }


    public function userposts($id)
    {
    	$user = User::find($id);

    	return view('Friends.friends_user_post', compact('user'));
    }
}
