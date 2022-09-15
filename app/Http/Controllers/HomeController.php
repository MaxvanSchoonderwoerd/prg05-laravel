<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $title = 'Home';
        $posts = Post::all();
        return view("Home", compact('title', 'posts'));
    }
}
