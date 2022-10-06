<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function show(Request $request)
    {

        $selectedPost = Post::find($request->get('id'));

//        if ($request->post('favourite')) {
//            //all duplicates
//            $dublicates = Favourite::all()->where('user_id', Auth::id())->where('post_id', $selectedPost->id);
//
//            //new favourite instance
//            $favourite = new Favourite();
//            $favourite->user_id = Auth::id();
//            $favourite->post_id = $selectedPost->id;
//            if ($dublicates) {
//                $favourite->liked = false;
//            } else {
//                $favourite->liked = true;
//            }
//            $favourite->save();
//        }

        return view('Details', compact('selectedPost'));
    }
}
