<?php

namespace App\Http\Controllers;

use App\Models\Post;

class oldHomeController extends Controller
{
    public function show()
    {
        $title = 'Home';
        $posts = Post::all();
        return view("oldHome", compact('title', 'posts'));
     }
}
