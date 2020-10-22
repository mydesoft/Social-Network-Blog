<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Message;
use Carbon\carbon;

class MessageController extends Controller
{
   
    public function markasread(){

        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}
