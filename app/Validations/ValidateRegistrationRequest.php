<?php
namespace App\Validations;
use Illuminate\Http\Request;


trait ValidateRegistrationRequest{


	public function CheckRegistrationRequest(Request $request)
	{
		return $request->validate([

			'name' => 'required',
			'email' => 'required|email',
			'username' => 'required',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',

		],

		[
			'name.required' => 'Input Your Name in the Required Field',
			'email.required' => 'Input Your Email in the Required Field',
			'username.required' => 'Input Your Username in the Required Field',
			'password.required' => 'Input Your Password in the Required Field',
			'password.confirmed' => 'Your Password Does Not Match'
		]

		);
	}
}