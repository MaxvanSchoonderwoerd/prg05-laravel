@extends('layouts.web')
@section('title', 'details')
@section('content')
    <section class="section">
        <div class="container">
            <h1>{{$selectedPost->title}} | Details</h1>
            <a href="{{ route('home') }}">Home</a>
            <table class="section">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Bpm</th>
                </tr>
                <tr>
                    <td>{{$selectedPost->title}}</td>
                    <td>{{$selectedPost->description}}</td>
                    <td>{{$selectedPost->bpm}}</td>
                </tr>
            </table>
        </div>
    </section>

@endsection

