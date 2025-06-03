@extends('layouts.app')
@section('title', 'details')
@section('content')

    {{--jumbo image of cover--}}
    <img class="coverJumbo" src="{{$post->cover}}" alt="Cover art">


    {{--title section--}}
    <section class="section">
        <div class="container">
            <a href="{{ route('post.index') }}">Back</a>
            <h1>{{$post->title}}</h1>
            <p>Posted by {{$post->user->name}}, {{$post->created_at->diffForHumans()}} </p>
            <p> {{$post->bpm}}bpm, {{$post->genre}}</p>
        </div>
    </section>

    {{--details section--}}
    <section class="section">
        @if(Auth::id() == $post->user_id)
            {{-- form view when the current user is the op--}}
            <div class="container">
                <form class="form" action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input class="form-control" type="text" id="title" name="title" maxlength="40" placeholder="Title"
                            value="{{$post->title}}">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" type="text" id="description" name="description" maxlength="240"
                            placeholder="Description">{{$post->description}}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="mb-3">
                            <input class="form-control" type="number" id="bpm" name="bpm" placeholder="bpm" min="30" max="300"
                                value="{{$post->bpm}}">
                        </div>
                        <div class="mb-3">
                            <select class="form-control" id="genre" name="genre">
                                <option value="{{$post->genre}}">{{$post->genre}}</option>
                                <option value="Hiphop">Hiphop</option>
                                <option value="Trap">Trap</option>
                                <option value="Drill">Drill</option>
                                <option value="RnB">RnB</option>
                                <option value="Pop">Pop</option>
                                <option value="House">House</option>
                                <option value="Drum And Bass">Drum And Bass</option>
                                <option value="2step">2step</option>
                                <option value="Garage">Garage</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('genre')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary mb-2" type="submit">Edit Beat</button>
                </form>
                {{-- delete button--}}
                <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">Delete Beat</button>
                </form>

                <img class="coverImg" src="{{$post->cover}}" alt="Cover art">
            </div>
        @else
            {{-- table view when the current user is not the op--}}
            <div class="container">
                <p>{{$post->description}}</p>
            </div>
        @endif
    </section>

    {{--audio section--}}
    <section class="section">
        <div class="container">
            <audio class="audioPlayerDetails" controls src="{{ $post->file}}">
    </section>
@endsection