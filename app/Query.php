<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable = ['username', 'email', 'messgae'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
