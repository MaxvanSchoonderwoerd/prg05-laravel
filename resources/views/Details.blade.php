@extends('layouts.app')
@section('title', 'details')
@section('content')
    <section class="section detailsSection">
        <div class="container">
            <h1>{{$post->title}} | Details</h1>
            <a href="{{ route('post.index') }}">Home</a>
            @if(Auth::id() == $post->user_id)
                <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" id="title" name="title" maxlength="40" placeholder="{{$post->title}}" required>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                    <textarea type="text" id="description" name="description" maxlength="240"
                              placeholder="{{$post->description}}"
                              required></textarea>
                    <button class="button uploadButton" type="submit">Edit post</button>
                </form>
                <table class="section">
                    <tr>
                        <th>Posten by</th>
                        <th>Bpm</th>
                        <th>Genre</th>
                        <th>Date Added</th>
                    </tr>
                    <tr>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->bpm}}</td>
                        <td>{{$post->genre}}</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                </table>
                {{--                delete button--}}
                <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                </form>
            @else
                <table class="section">
                    <tr>
                        <th>Posten by</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Bpm</th>
                        <th>Genre</th>
                        <th>Date Added</th>
                    </tr>
                    <tr>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->bpm}}</td>
                        <td>{{$post->genre}}</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                </table>
            @endif
        </div>
        <div class="container">
            <audio class="audioPlayer" controls>
                <source src="/{{$post->file}}" type="audio/mp3">
            </audio>
        </div>
    </section>

@endsection

