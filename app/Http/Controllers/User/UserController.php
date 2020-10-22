<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;

class UserController extends Controller
{

    public function Logout()
    {
    	Auth::logout();

    	return redirect()->route('login');
    }


    public function UserDashboard()
    {
    	$posts = Post::all();

    	return view('user.userdashboard', compact('posts'));
    }



    public function ProfilePicture (Request $request)
    {
      $request->validate([ 'profile_picture' => 'required|image']);

      if ($request->hasFile('profile_picture')) {
            
            $GetPictureWithExt = $request->file('profile_picture')->getClientOriginalName();

            $GetPicture = pathinfo($GetPictureWithExt, PATHINFO_FILENAME);

            $GetPictureExt = $request->file('profile_picture')->getClientOriginalExtension();

            $Store = $GetPicture.'_'.time().'.'.$GetPictureExt;

            $path = $request->file('profile_picture')->storeAs('public/profile_picture', $Store);
        }

        else{
            $Store = 'noimage.jpg';
        }

        $user = Auth::user();

        $user->profile_picture = $Store;

        $user->save();

        return back()->with('success', 'Profile Image was Uploaded Successfully!');


    }
}
