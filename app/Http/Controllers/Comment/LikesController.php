<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Like;

class LikesController extends Controller
{
    public function like($id)
    {
    	Like::create([
    		
    		'user_id' => Auth::user()->id,
    		'comment_id' => $id
    	]);

    	return back()->with('success', 'You Liked this this comment');
    }

    public function unlike($id)
    {
    	$like = Like::where('user_id', Auth::user()->id)->where('comment_id', $id)->first();

    	$like->delete();

    	return back()->with('success', 'You UnLiked this this comment');

    }
}
