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
                                @auth()
                                    <form class="favouriteForm" action='{{route('like', ['id' => $post->id])}}'
                                          method="post">
                                        @csrf
                                        <button class="favouriteBtn" type="submit">
                                            <svg width='24' height='24' viewBox='0 0 24 24'
                                                 xmlns='http://www.w3.org/2000/svg'
                                                 xmlns:xlink='http://www.w3.org/1999/xlink'>
                                                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                                                <g transform="matrix(0.81 0 0 0.81 12 12)">
                                                    <path
                                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); opacity: 1;"
                                                        transform=" translate(-13, -12.99)"
                                                        d="M 13.03125 1.15625 C 12.957031 1.160156 12.882813 1.167969 12.8125 1.1875 C 12.496094 1.25 12.230469 1.457031 12.09375 1.75 L 8.84375 8.375 L 1.46875 9.46875 C 1.105469 9.535156 0.804688 9.796875 0.695313 10.152344 C 0.582031 10.507813 0.675781 10.894531 0.9375 11.15625 L 6.21875 16.34375 L 5 23.65625 C 4.9375 24.027344 5.085938 24.40625 5.390625 24.632813 C 5.695313 24.855469 6.101563 24.890625 6.4375 24.71875 L 13 21.25 L 19.5625 24.71875 C 19.898438 24.890625 20.304688 24.855469 20.609375 24.632813 C 20.914063 24.40625 21.0625 24.027344 21 23.65625 L 19.78125 16.34375 L 25.0625 11.15625 C 25.324219 10.894531 25.417969 10.507813 25.304688 10.152344 C 25.195313 9.796875 24.894531 9.535156 24.53125 9.46875 L 17.15625 8.375 L 13.90625 1.75 C 13.75 1.402344 13.414063 1.171875 13.03125 1.15625 Z M 13 4.46875 L 15.625 9.75 C 15.773438 10.039063 16.054688 10.238281 16.375 10.28125 L 22.21875 11.15625 L 18 15.28125 C 17.757813 15.503906 17.640625 15.832031 17.6875 16.15625 L 18.6875 22 L 13.46875 19.25 C 13.175781 19.09375 12.824219 19.09375 12.53125 19.25 L 7.3125 22 L 8.3125 16.15625 C 8.359375 15.832031 8.242188 15.503906 8 15.28125 L 3.78125 11.15625 L 9.625 10.28125 C 9.945313 10.238281 10.226563 10.039063 10.375 9.75 Z"
                                                        stroke-linecap="round"/>
                                                </g>
                                            </svg>
                                        </button>
                                    </form>
                                @endauth
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
