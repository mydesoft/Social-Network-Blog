<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class SearchFriendController extends Controller
{
    public function byname(Request $request)
    {
    	$request->validate(['friend' => 'required']);

    	$query = $request->friend;

    	$users = User::where('name', 'like', '%'. $request->friend .'%')->get();

    	return view('user.name_result', compact('users', 'query'));
    	

    	
    }

    public function bylocation(Request $request){
        $query = $request->location;

        $users = User::where('state', 'like', '%'. $request->location .'%')->get();

        $nearbyFriends = User::inRandomOrder()->take(2)->get();

        return view('user.friends_nearby', compact('users', 'query', 'nearbyFriends'));
    }


    public function showfriend($id)
    {
    	$user = User::find($id);

    	return view('user.show_friend', compact('user'));
    }
}
