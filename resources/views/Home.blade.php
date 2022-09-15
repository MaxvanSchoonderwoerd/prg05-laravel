@extends('layouts.web')
@section('title', 'home')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Home</h1>
            <a href="{{route('email')}}">test email</a>
            <ul @foreach($posts as $post)>
                <li class="listItem postsList"><a href="{{route('details')}}?id={{$post->id}}">{{$post->title}}</a></li>
            </ul @endforeach>
        </div>
    </section>

@endsection


