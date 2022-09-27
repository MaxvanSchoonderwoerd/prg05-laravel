<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function show()
    {
        $title = 'Home';
        $posts = Post::all();
        return view("Home", compact('title', 'posts'));
     }
}
