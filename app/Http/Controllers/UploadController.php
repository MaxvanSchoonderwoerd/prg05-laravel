<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function show()
    {
        return view('Upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'bpm'=> 'required',
            'genre'=> 'required',
            'm_cover'=> 'required',
            'm_audio'=> 'required',
        ]);

        if ($request->hasFile('m_audio')) {
            //new post instance
            $post = new Post();

            // ======= audio =====

            //get the mp3 file from $_FILE in the request
            $audio = $request->file('m_audio');

            //rename file to [current time] + [original file name]
            $audioName = time() . '_' . $audio->getClientOriginalName();

            //move file to public/assets/
            $audio->move('assets/', $audioName);


            // ======= cover art =====

            //get the png file from $_FILE in the request
            $cover = $request->file('m_cover');

            //rename file to [audio name] + [cover file extension (png or jpg)]
            $coverName = $audioName . '.' . $cover->getClientOriginalExtension();

            //move file to public/assets/cover
            $cover->move('assets/cover/', $coverName);


            //set the fillable attributes in the class to the ones the user has uploaded
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->bpm = $request->bpm;
            $post->description = $request->description;
            $post->genre = $request->genre;
            //path for mp3 file
            $post->file = 'assets/' . $audioName;
            //path for png file
            $post->cover = 'assets/cover/' . $coverName;

            //save the post to database
            $post->save();
        }
        return redirect()->route('home');
    }
}


