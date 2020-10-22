<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validations\ValidateCreatePost;
use App\Creation\CreatePost;
use Auth;
use App\User;
use App\Post;

class PostsMadeController extends Controller
{
	use ValidateCreatePost, CreatePost;

    public function show($id)
    {
    	$post = Post::find($id);

    	if($post->user_id !== Auth::user()->id){

    		return redirect()->route('userdashboard')
    				->with('error', 'Unauthorized Access!');
    	}
    	else{

    		return view('user.postmade', compact('post'));
    	}
    	
    }

    public function edit($id)
    {
    	$post = Post::find($id);

    	if($post->user_id !== Auth::user()->id){

    		return redirect()->route('userdashboard')
    				->with('error', 'Unauthorized Access!');
    	}
    	else{
    		return view('post.edit', compact('post'));
    	}

    	
    }

    public function update(Request $request, $id){

    		$this->ValidateCreatePost($request);

    		$this->UpdatePost($request, $id);

    		return back()->with('success', 'Post has been Updated!');

    }

    public function destroy($id)
    {
    	$post = Post::find($id);

    	if($post->user_id !== Auth::user()->id){

    		return redirect()->route('userdashboard')
    				->with('error', 'You are not authorized to carry out this action!');
    	}
    	else{

    		$post->delete();
    	}
    	

    	return redirect()->route('userdashboard')->with('success', 'Post Deleted Successfully!');
    }
}
