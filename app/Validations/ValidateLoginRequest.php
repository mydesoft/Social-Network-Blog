<?php

namespace App\Validations;

use Illuminate\Http\Request;


trait ValidateLoginRequest{


	public function CheckLoginRequest(Request $request)
	{
		return $request->validate([

			'username' => 'required',
			'password' => 'required',

		],

		[
			'username.required' => 'Input Your Username in the Required Field',
			'password.required' => 'Input Your Password in the Required Field',
			
		]

		);
	}
}