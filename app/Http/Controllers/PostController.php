<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("oldHome", [
            'posts' => Post::filter(request(['search', 'genre', 'bpm']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)

    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'bpm' => 'required',
            'genre' => 'required',
            'm_cover' => 'required',
            'm_audio' => 'required',
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('Details', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
