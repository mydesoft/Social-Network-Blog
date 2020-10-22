<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validations\ValidateUpdateProfile;
use App\Validations\ValidatePasswordUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
	use ValidateUpdateProfile, ValidatePasswordUpdate;

    public function Profile()
    {
    	return view('user.profile');
    }


    public function ProfileUpdate(Request $request, User $user)
    {
    	$this->ValidateUpdateProfile($request);

    	$user = Auth::user();

    	$user->update($this->ValidateUpdateProfile($request));

    	return back()->with('success', 'Your Profile has been Updated!');
    }


    public function PasswordUpdate(Request $request, User $user)
    {
    	$this->ValidatePasswordUpdate($request);

    	$user = Auth::user();

    	if (Hash::check($request->old_password, $user->password)) {
    		
    		$user->fill(['password'=>Hash::make($request->password)])->save();

    		return back()->with('success', 'Password Updated Successfully!');

    	}

    	else{
    		return back()->with('error', 'Old password is Incorrect!');
    	}
    }
}
