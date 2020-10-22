<?php
namespace App\Validations;
use Illuminate\Http\Request;


trait ValidateUpdateProfile{


	public function ValidateUpdateProfile(Request $request)
	{
		return $request->validate([

			'name' => 'required',
			'email' => 'required|email',
			'username' => 'required',
			

		],

		[
			'name.required' => 'Input Your Name in the Required Field',
			'email.required' => 'Input Your Email in the Required Field',
			'username.required' => 'Input Your Username in the Required Field',
			

		]	
		);
	}
}