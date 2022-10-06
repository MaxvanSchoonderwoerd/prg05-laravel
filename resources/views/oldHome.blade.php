@extends('layouts.app')
@section('title', 'home')
@section('content')
    {{--    title--}}
    <section class="section">
        <div class="container">
            <h1>Beats</h1>
            <p>Listen to cool beats uploaded by you</p>
        </div>
    </section>
    {{--    filters--}}
    <section class="section filterSection">
        <form class="filterForm" method="get">
            <input name="search" type="text" placeholder="Search" value="{{request('search')}}">
            <label for="genre" class="filterList"><span class="filterTitle">Genre</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Hiphop">Hiphop</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Trap">Trap</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Drill">Drill</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="RnB">RnB</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Pop">Pop</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="House">House</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Drum And Bass">Drum And Bass</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="2step">2step</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Garage">Garage</span>
                <span class="checkBox"><input name="genre" type="checkbox" value="Other">Other</span>
            </label>
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
    {{--    posts--}}
    <section class="section">
        <div class="postsContainer">
            <ul class="postsUl">
                @foreach($posts as $post)
                    <li class="post">
                        <div class="left">
                            <a class="imgLink" href="{{route('post.show', $post)}}">
                                <img class="coverImg" src="{{$post->cover}}" alt="Cover art">
                            </a>
                        </div>
                        <div class="right">
                            <a class="textLink" href="{{route('post.show', $post)}}"> {{$post->title}}
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
