<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use App\Friend;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'state', 'password_confirmation', 'profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

 public function followings(){

    return $this->belongsToMany('App\User', 'follower_user', 'follower_id', 'user_id');
 }

 public function followers(){

    return $this->belongsToMany('App\User', 'follower_user', 'user_id', 'follower_id');
 }

 public function statuses()
 {
     return $this->belongsToMany('App\Status');
 }

 public function queries()
 {
     return $this->hasMany('App\Query');
 }


 public function hasFollowed(){

        $id = Auth::user()->id;

        $followedUsers = array();

        foreach ($this->followers as $follower) {

            array_push($followedUsers, $follower->id);
        }

        if (in_array($id, $followedUsers)) {
            
            return true;
        }
        else{
            return false;
        }
    }

public function hasRole()
{

    $roles =  $this->roles->pluck('name');

    if ($roles->contains('user')) {

        return true;
    }
    else{
        return false;
    }
    
}

public function isActive(){

        $status = $this->statuses->pluck('status');

        if ($status->contains('active')) {
            
            return true;
        }
        else{
            return false;
        }
    }



}
