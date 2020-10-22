<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index()

    {
    	$posts = Post::orderBy('created_at', 'desc')->paginate(8);

    	$Sidebars = Post::inRandomOrder()->take(4)->get();

    	
        return view('index', compact('posts', 'Sidebars'));
    }

}
