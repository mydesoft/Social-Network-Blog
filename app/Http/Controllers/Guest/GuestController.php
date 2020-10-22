<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\CreateNewUserEvent;
use App\Validations\ValidateRegistrationRequest;
use App\Validations\ValidateLoginRequest;
use App\Creation\CreateNewUser;
use App\User;
use Auth;
use App\Status;


class GuestController extends Controller
{
	use ValidateRegistrationRequest, CreateNewUser, ValidateLoginRequest;


    public function Register()
    {
    	return view('guest.register');
    }



      public function UserRegistration(Request $request, User $user)
    {
    	$this->CheckRegistrationRequest($request);

        $userEmail = User::pluck('email');
        $userUsername = User::pluck('username');


        if($userEmail->contains($request->email)){

            return back()->with('error', 'Email Already Exists, please choose a new email!');
        }

         elseif($userUsername->contains($request->username)){

            return back()->with('error', 'Username Already Exists, please choose a different username!');
        }

        else{
           $user = $this->AddNewUser($request->name, $request->email, $request->password, $request->username, 
                                  $request->state);

        event(new CreateNewUserEvent($user));

        return redirect()->route('login'); 
        }

    	
    }



      public function Login()
    {
    	return view('guest.login');
    }


    public function UserLogin(Request $request)
    {
        $this->CheckLoginRequest($request);

        $username = $request->username;

        $statuses = Status::where('id', 1)->firstOrFail();

        $userNames = array();

        foreach ($statuses->user as $user) {

            array_push($userNames, $user->username);
         }

        if(!in_array($username, $userNames)){

            return back()->with('error', "Sorry You Cant't Login at this time, You've been Suspended!");

         }


        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

            return redirect()->route('homepage');
            
        }

        else{

            return back()->with('error', 'Login Details Does Not Match!');
        }

}

}
