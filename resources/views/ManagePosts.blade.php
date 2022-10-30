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
        <table class="section">
            <tr>
                <th>Posted by</th>
                <th>Title</th>
                <th>Date Added</th>
                <th>Likes</th>
                <th>Dislikes</th>
                <th>Actief</th>
                <th>Delete</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->likes}}</td>
                    <td>{{$post->dislikes}}</td>
                    <td>
                        <form action="{{ route('switch', ['id' => $post->id]) }}" method="post" id="switchForm{{$post->id}}" >
                            <div class="form-check form-switch">
                                @csrf
                                <input class="form-check-input switch" type="checkbox" role="switch"
                                       id="flexSwitchCheckChecked"
                                       @if($post->enabled == 1)checked
                                       @endif
                                       onchange="document.getElementById('switchForm{{$post->id}}').submit()">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Delete Beat</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection
