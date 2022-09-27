@extends('layouts.web')
@section('title', 'details')
@section('content')
    <section class="section detailsSection">
        <div class="container">
            <h1>{{$selectedPost->title}} | Details</h1>
            <a href="{{ route('home') }}">Home</a>
            <table class="section">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Bpm</th>
                    <th>Genre</th>
                    <th>Date Added</th>
                </tr>
                <tr>
                    <td>{{$selectedPost->title}}</td>
                    <td>{{$selectedPost->description}}</td>
                    <td>{{$selectedPost->bpm}}</td>
                    <td>{{$selectedPost->genre}}</td>
                    <td>{{$selectedPost->created_at}}</td>
                </tr>
            </table>
        </div>
        <div class="container">
            <audio class="audioPlayer" controls>
                <source src="/{{$selectedPost->file}}" type="audio/mp3">
            </audio>
        </div>
    </section>

@endsection

