<?php

namespace App\Creation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\Post;

trait CreatePost{

	
    public function CreateNewPost(Request $request){
        
    if($request->hasFile('image')){
            $imageWithExt = $request->file('image')->getClientOriginalName();
            $imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $store = $imageExt.'_'.time().'.'.$imageExt;
            $path = $request->file('image')->storeAs('public/PostImages', $store);
        }

        else {
            $store = 'noimage.jpg';
        }

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $store;
        $post->user_id = Auth::user()->id;
        $post->save();
    
}



public function UpdatePost(Request $request, $id)
{
      if($request->hasFile('image')){
            $imageWithExt = $request->file('image')->getClientOriginalName();
            $imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $store = $imageExt.'_'.time().'.'.$imageExt;
            $path = $request->file('image')->storeAs('public/PostImages', $store);
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if($request->hasFile('image')){
            $post->image = $store;
        }
        
        $post->save();
        
}
    }

        
    
