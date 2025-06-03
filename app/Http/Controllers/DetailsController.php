<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    /**
     * Display the details of a specific post.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $selectedPost = Post::find($request->get('id'));
        return view('Details', compact('selectedPost'));
    }
}
