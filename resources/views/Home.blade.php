@extends('layouts.web')
@section('title', 'home')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Home</h1>
            <a href="{{route('email')}}">test email</a>
            <a href="{{route('upload')}}">upload a beat</a>
            <ul @foreach($posts as $post)>
                <li class="listItem postsList">
                    <div class="imgGradient">
                        <img class="coverImg" src="{{$post->cover}}" alt="Cover art">
                    </div>
                    <a href="{{route('details')}}?id={{$post->id}}">{{$post->title}} - {{$post->genre}}</a>
                    <audio class="audioPlayer" controls>
                        <source src="/{{$post->file}}" type="audio/mp3">
                    </audio>
                </li>
            </ul @endforeach>
        </div>
    </section>
@endsection
