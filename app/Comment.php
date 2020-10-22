<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{

	protected $fillable = ['comment'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	return $this->hasMany('App\Like');
    }


    public function hasBeenLiked()
    {
        $id = Auth::user()->id;

        $likers  = array();

        foreach ($this->likes as $like) {

            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {

            return true;
        }
        else{

            return false;
        }
    }
}
