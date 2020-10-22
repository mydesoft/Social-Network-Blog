<?php
namespace App\Validations;
use Illuminate\Http\Request;


trait ValidatePasswordUpdate{


	public function ValidatePasswordUpdate(Request $request)
	{
		return $request->validate([
			'old_password' => 'required',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',
			
			

		],

		[
			
			'old_password.required' => 'Input Your Old Password in the Required Field', 
			'password.required' => 'Input Your Password in the Required Field',
			'passowrd.confirmed' => 'Password does not Match',
			'password_confirmation.required' => 'Password Confirmation cannot be Blank',
			

		]	
		);
	}
}