<?php

namespace App\Creation;
use Illuminate\Support\Facades\Hash;

use App\User;

trait CreateNewUser{

	public function AddNewUser($name, $email, $password, $username, $state){
    
        return User::create([
        'name' =>  $name,
        'email' => $email,
        'password' => Hash::make($password),
        'username' => $username,
        'state' => $state
        
    ]);

        
    }
}