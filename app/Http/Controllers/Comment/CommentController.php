<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    
    public function store(Request $request, $id)
    {
    	$request->validate(['comment' => 'required']);
    	$post = Post::find($id);

    	$comment = new Comment;
    	$comment->comment = $request->comment;
    	$comment->user_id = Auth::user()->id;
    	$comment->post_id = $post->id;
    	$comment->save();

    	return back()->with('success', 'You have added your comment for this post!');;
    }



    public function destroy($id)
    {
         $comment = Comment::find($id);

        if(Auth::user()->id != $comment->user_id){
            return back()->with('error', "You can't perform this action!");
        }
        else{
            $comment->delete();
            return back()->with('success', 'You have deleted your comment for this post!');
        }
       


    }
}
