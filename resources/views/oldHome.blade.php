@extends('layouts.app')
@section('title', 'home')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Beats</h1>
            <p>Listen to cool beats uploaded by you</p>
        </div>
    </section>
    <section class="filterSection">
        <form class="filterForm" method="get">
            <input name="search" type="text" placeholder="Search" value="{{request('search')}}">
            <label for="genre">Genre</label>
            <select name="genre" id="genre">
                <option value=""></option>
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
            <label for="bpm">Bpm range</label>
            <select name="bpm" id="genre">
                <option value=""></option>
                <option value="80">80 - 100</option>
                <option value="100">100 - 120</option>
                <option value="120">120 - 140</option>
                <option value="140">140 - 160</option>
                <option value="160">160 - 180</option>
            </select>
            <button class="button" type="submit">Filter</button>
        </form>
    </section>
    <section class="section">
        <nav class="nav">
            @auth()
                <a class="navBtn" href="{{route('upload')}}">upload a beat</a>
                <a class="navBtn" href="{{route('email')}}">test email</a>
            @endauth
        </nav>
    </section>
    <section class="section">
        <div class="postsContainer">
            <ul class="postsUl">
                @foreach($posts as $post)
                    <li class="post">
                        <div class="left">
                            <a class="imgLink" href="{{route('details')}}?id={{$post->id}}">
                                <img class="coverImg" src="{{$post->cover}}" alt="Cover art">
                            </a>
                        </div>
                        <div class="right">
                            <a class="textLink" href="{{route('details')}}?id={{$post->id}}">{{$post->title}}
                                - {{$post->genre}}
                                <audio class="audioPlayer" controls>
                                    <source src="/{{$post->file}}" type="audio/mp3">
                                </audio>
                            </a>

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
