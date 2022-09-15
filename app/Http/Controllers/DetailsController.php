<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function show(Request $request)
    {
        $selectedPost = Post::find($request->get('id'));

        return view('Details', compact('selectedPost'));
    }
}
