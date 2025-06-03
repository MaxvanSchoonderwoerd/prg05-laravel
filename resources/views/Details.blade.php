@extends('layouts.app')
@section('title', 'details')
@section('content')

    {{--jumbo image of cover--}}

    <img class="coverJumbo" src="{{$post->cover}}" alt="Cover art">


    {{--title section--}}
    <section class="section">
        <div class="container">
            <div class="jumbo">
                <img class="coverOverlay" src="{{$post->cover}}" alt="Cover art">
            </div>
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
                    <div class="mb-3">
                        <input class="hidden" id="m_cover" name="m_cover" type="file" accept="image/*"
                            placeholder="upload cover art">
                        <label class="form-control" for="m_cover">Change Cover Art
                            <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                                xmlns:xlink='http://www.w3.org/1999/xlink'>
                                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
                                <g transform="matrix(1 0 0 1 12 12)">
                                    <path
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" translate(-11, -12)"
                                        d="M 6 2 C 4.9057453 2 4 2.9057453 4 4 L 4 9 C 2.895 9 2 9.895 2 11 L 2 16 C 2 17.105 2.895 18 4 18 L 4 20 C 4 21.094255 4.9057453 22 6 22 L 18 22 C 19.094255 22 20 21.094255 20 20 L 20 7 L 15 2 L 6 2 z M 6 4 L 14 4 L 14 8 L 18 8 L 18 9 L 6 9 L 6 4 z M 4 11 L 5.5 11 C 6.328 11 7 11.672 7 12.5 C 7 13.328 6.328 14 5.5 14 L 5 14 L 5 16 L 4 16 L 4 11 z M 11 11 L 12 11 L 12 16 L 10.845703 16 L 9 12.736328 L 9 16 L 8 16 L 8 11.023438 L 9.1542969 11.023438 L 11 14.267578 L 11 11 z M 15.035156 11.001953 C 16.207156 11.002953 16.673281 11.538953 16.863281 12.001953 L 15 12.001953 C 14.118 11.988953 14 12.856937 14 13.085938 L 14 13.914062 C 14 14.146062 14.206781 15.011953 15.175781 15.001953 C 15.458781 14.998953 15.976 14.836266 16 14.822266 L 15.978516 14 L 15 14 L 15.021484 13 L 17 13 L 17 15.380859 C 16.94 15.436859 16.291422 15.961047 15.107422 15.998047 C 14.785422 16.008047 13.132 16.038062 13 13.914062 L 13 13.091797 C 13 12.736797 12.958156 10.999953 15.035156 11.001953 z M 5 12 L 5 13 L 5.5 13 C 5.776 13 6 12.776 6 12.5 C 6 12.224 5.776 12 5.5 12 L 5 12 z M 6 18 L 18 18 L 18 20 L 6 20 L 6 18 z"
                                        stroke-linecap="round" />
                                </g>
                            </svg>
                        </label>

                        @error('m_cover')
                            <span>{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary mb-2" type="submit">Edit Beat</button>
                    <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">Delete Beat</button>
                    </form>
                </form>
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