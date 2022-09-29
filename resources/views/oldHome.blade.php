@extends('layouts.web')
@section('title', 'home')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Home</h1>
            <a href="{{route('email')}}">test email</a>
            <a href="{{route('upload')}}">upload a beat</a>
            <div class="postsContainer">
            @foreach($posts as $post)
                <ul>
                    <li class="post">
                        <div class="left">
                            <a class="imgLink" href="{{route('details')}}?id={{$post->id}}">
                                <img class="coverImg" src="{{$post->cover}}" alt="Cover art">
                            </a>
                        </div>
                        <div class="right">
                            <a class="textLink" href="{{route('details')}}?id={{$post->id}}">{{$post->title}}
                                - {{$post->genre}} <audio class="audioPlayer" controls>
                                    <source src="/{{$post->file}}" type="audio/mp3">
                                </audio></a>

                        </div>
                    </li>
                </ul>
            @endforeach
            </div>
        </div>
    </section>
@endsection
