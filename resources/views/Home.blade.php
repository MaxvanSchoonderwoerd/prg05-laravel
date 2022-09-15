@extends('layouts.web')
@section('title', 'home')
@section('content')
    @include('partials.header-hero', ["heroText" => 'test hero'])
<h1>{{$title}}</h1>
<a href="{{route('home')}}">Home</a>
@endsection

