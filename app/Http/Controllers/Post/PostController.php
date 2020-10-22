<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validations\ValidateCreatePost;
use App\Post;
use App\User;
use Auth;
use App\Creation\CreatePost;
use App\Comment;
use Carbon\Carbon;

class PostController extends Controller
{
	use ValidateCreatePost, CreatePost;


	public function store(Request $request, User $user)
	{
		$this->ValidateCreatePost($request);

	   $this->CreateNewPost($request);

		return back()->with('success', 'You Have Created a New Post!');
	}



	


    public function show(Post $post)
    {
    	$Sidebars = Post::inRandomOrder()->take(4)->get();
    	
    	return view('post.show', compact('post', 'Sidebars'));
    }





    public function search(Request $request)

    {
    	$request->validate(['search' => 'required']);

    	$query = $request->search;

    	$posts = Post::where('title', 'like', '%'.$request->search.'%')->get();

    	return view('post.result', compact('posts', 'query'));

    }
}
