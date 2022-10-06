<?php

namespace App\Http\Controllers;

use App\Models\Post;

class oldHomeController extends Controller
{
    public function show()
    {
        return view("oldHome", [
            'posts' => Post::filter(request(['search', 'genre', 'bpm']))->get()
        ]);
    }
}
