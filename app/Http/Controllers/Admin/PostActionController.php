<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Auth;	

class PostActionController extends Controller
{
    public function show($id)
    {
    	$post = Post::find($id);

    	return view('admin.showpost', compact('post'));
    }

    public function destroy($id)
    {
    	$post = Post::find($id);

    	$post->delete();

    	return redirect()->route('admindashboard')->with('success', 'Post Deleted!');
    }
}
