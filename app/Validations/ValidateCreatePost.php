<?php

namespace App\Validations;

use Illuminate\Http\Request;


trait ValidateCreatePost{


	public function ValidateCreatePost(Request $request)
	{
		return $request->validate([

			'title' => 'required',
			'body' => 'required',
			

		],

		[
			'title.required' => 'Title cannot be Empty',
			'body.required' => 'Body cannot be Empty',
			
			
		]

		);
	}
}