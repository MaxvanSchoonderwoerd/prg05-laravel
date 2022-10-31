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
            <br>
            <button class="btn btn-primary" type="submit">Filter</button>
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
                                - {{$post->genre}} - {{$post->user->name}}
                                @auth()
                                    <span class="likeButtons">
                                    <form class="likeDislikeForm" action='post/{{$post->id}}/like'
                                          method="POST">
                                        @csrf
                                        <button class="favouriteBtn" type="submit">
                                            <svg width='24' height='24' viewBox='0 0 24 24'
                                                 xmlns='http://www.w3.org/2000/svg'
                                                 xmlns:xlink='http://www.w3.org/1999/xlink'>
                                                <rect width='24' height='24' stroke='none' fill='#ffffff' opacity='0'/>


                                                <g transform="matrix(0.83 0 0 0.83 12 12)">
                                                    <path
                                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4;
                                                        @if($post->isLikedBy(Auth::user()))
                                                            fill: rgb(0,0,255);
                                                        @endif  fill-rule: nonzero; opacity: 1;"
                                                        transform=" translate(-16, -16)"
                                                        d="M 14.375 4 L 10.375 12 L 4 12 L 4 28 L 22.84375 28 C 24.253906 28 25.484375 27.003906 25.78125 25.625 L 27.9375 15.625 C 28.332031 13.777344 26.886719 12 25 12 L 17.21875 12 C 17.292969 11.375 17.308594 10.746094 17.78125 9.3125 C 18.085938 8.386719 18 7.535156 18 7 C 18 6.253906 17.699219 5.566406 17.1875 5 C 16.675781 4.433594 15.90625 4 15 4 Z M 15.5 6.25 C 15.5625 6.296875 15.664063 6.28125 15.71875 6.34375 C 15.90625 6.550781 16 6.835938 16 7 C 16 7.648438 16.019531 8.253906 15.875 8.6875 C 15.128906 10.949219 15 12.9375 15 12.9375 L 14.9375 14 L 25 14 C 25.660156 14 26.105469 14.574219 25.96875 15.21875 L 23.84375 25.21875 C 23.742188 25.6875 23.320313 26 22.84375 26 L 12 26 L 12 13.25 Z M 6 14 L 10 14 L 10 26 L 6 26 Z M 8 23 C 7.449219 23 7 23.449219 7 24 C 7 24.550781 7.449219 25 8 25 C 8.550781 25 9 24.550781 9 24 C 9 23.449219 8.550781 23 8 23 Z"
                                                        stroke-linecap="round"/>
                                                </g>
                                            </svg>
                                             @if($post->likes) {{$post->likes}} @else 0 @endif
                                        </button>
                                    </form>
                                    <form class="likeDislikeForm" action='post/{{$post->id}}/dislike'
                                          method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button class="favouriteBtn" type="submit">
                                            <svg width='24' height='24' viewBox='0 0 24 24'
                                                 xmlns='http://www.w3.org/2000/svg'
                                                 xmlns:xlink='http://www.w3.org/1999/xlink'>
                                                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                                                <g transform="matrix(0.83 0 0 0.83 12 12)">
                                                    <path
                                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4;
                                                        @if($post->isDislikedBy(Auth::user()))
                                                            fill: rgb(255,0,0);
                                                        @endif fill-rule: nonzero; opacity: 1;"
                                                        transform=" translate(-12, -12)"
                                                        d="M 0 12.84 C 0 14.358783062034682 1.231216937965318 15.59 2.75 15.59 L 8.47 15.59 C 8.54832778956935 15.591499404604997 8.621803802574393 15.628237411107518 8.67 15.69 C 8.704287106658503 15.762833169874238 8.704287106658503 15.847166830125762 8.67 15.92 C 8.16872278435274 17.266979209592204 8.024045418123636 18.720642270275114 8.25 20.14 C 8.88 22.4 10.3 23.03 11.33 22.89 C 12.445633819715523 22.704750311885572 13.250406988699401 21.72018739238402 13.21 20.59 C 13.21 17.59 15.9 14.27 18.26 13.35 C 18.376007340577328 13.781054775827485 18.763662492252717 14.083017736079894 19.21 14.09 L 23 14.09 C 23.552284749830793 14.09 24 13.642284749830793 24 13.09 L 24 2.09 C 24 1.5377152501692064 23.552284749830793 1.0899999999999999 23 1.0899999999999999 L 19.25 1.0899999999999999 C 18.697715250169207 1.0899999999999999 18.25 1.5377152501692064 18.25 2.09 L 18.25 2.42 C 17.25 2.27 16.44 2.13 15.79 2.01 C 14.474596552796953 1.7332060941630736 13.13420795175529 1.5924652910537005 11.790000000000006 1.5900000000000016 L 5.25 1.5899999999999999 C 2.99 1.5899999999999999 2.75 2.9899999999999998 2.75 3.59 C 2.7519493849020424 3.89364241948298 2.806070493406704 4.194691085540164 2.9099999999999993 4.479999999999999 C 2.1849332801526966 4.935848971191528 1.7463868635098598 5.733549780774617 1.7499999999999998 6.59 C 1.7519493849020422 6.893642419482981 1.8060704934067047 7.194691085540165 1.9099999999999997 7.479999999999999 C 1.1849332801526964 7.935848971191528 0.7463868635098598 8.733549780774617 0.7499999999999998 9.59 C 0.7498751227953873 9.977184246284471 0.8352403226824494 10.35962034177851 0.9999999999999996 10.709999999999999 C 0.3655449820215878 11.235222231515467 -0.0011842812461779761 12.016355562275807 0 12.84 Z M 20.25 3.84 C 20.25 3.425786437626905 20.585786437626904 3.09 21 3.09 C 21.414213562373096 3.09 21.75 3.4257864376269045 21.75 3.84 C 21.75 4.254213562373095 21.414213562373096 4.59 21 4.59 C 20.588037936375393 4.5846141876918995 20.2553858123081 4.251962063624608 20.25 3.84 Z M 23 13.09 Z M 2 12.84 C 2.0053858123081003 12.428037936375391 2.338037936375392 12.0953858123081 2.7499999999999996 12.09 L 3.25 12.09 C 3.8022847498307932 12.09 4.25 11.642284749830793 4.25 11.09 C 4.25 10.537715250169207 3.8022847498307932 10.09 3.25 10.09 C 2.9738576250846034 10.09 2.75 9.866142374915396 2.75 9.59 C 2.75 9.313857625084603 2.9738576250846034 9.09 3.25 9.09 L 4.25 9.09 C 4.802284749830793 9.09 5.25 8.642284749830793 5.25 8.09 C 5.25 7.537715250169207 4.802284749830793 7.09 4.25 7.09 C 3.9738576250846034 7.09 3.75 6.8661423749153965 3.75 6.59 C 3.75 6.313857625084603 3.9738576250846034 6.09 4.25 6.09 L 5.25 6.09 C 5.802284749830793 6.09 6.25 5.642284749830793 6.25 5.09 C 6.25 4.537715250169207 5.802284749830793 4.09 5.25 4.09 C 4.990676060962328 4.09048645906122 4.7758765475266225 3.8888379362440277 4.76 3.63 C 4.922809481018914 3.611499995168802 5.087190518981086 3.611499995168802 5.249999999999999 3.63 L 11.75 3.63 C 12.986228871842066 3.6243354875104585 14.219642705323572 3.7483472044637596 15.43 3.9999999999999973 C 16.16 4.13 17.05 4.29 18.25 4.46 L 18.25 11.29 C 14.75 12.2 11.25 16.65 11.25 20.61 C 11.25 20.8 11.17 20.919999999999998 11.1 20.93 C 11.03 20.94 10.5 20.65 10.209999999999999 19.62 C 9.919999999999998 18.590000000000003 10.639999999999999 16.240000000000002 11.209999999999999 15.010000000000002 C 11.361641392584824 14.68467099665002 11.32729324264248 14.303024886179527 11.12 14.010000000000002 C 10.936016511700785 13.730614787782066 10.624519096068582 13.561730646776656 10.29 13.560000000000002 L 2.75 13.560000000000002 C 2.3492691586244008 13.555280848946433 2.0210647730988227 13.240204638841877 2 12.84 Z"
                                                        stroke-linecap="round"/>
                                                </g>
                                            </svg>
                                            @if($post->dislikes) {{$post->dislikes}} @else 0 @endif
                                        </button>
                                    </form>
                                    </span>
                                @endauth
                                <audio class="audioPlayer" controls preload="none">
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
