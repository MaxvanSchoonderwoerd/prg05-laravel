@extends('layouts.app')
@section('title', 'details')
@section('content')
    <section class="section detailsSection">
        <div class="container">
            <h1>{{$post->title}} | Details</h1>
            <a href="{{ route('post.index') }}">Home</a>
            @if(Auth::id() != $post->user_id)
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

