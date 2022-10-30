<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostLikesController extends Controller
{
    public function store(Post $post)
    {
        $post->like(auth()->id());
        return back();
    }

    public function destroy(Post $post)
    {
        $post->dislike(auth()->id());
        return back();
    }
}
