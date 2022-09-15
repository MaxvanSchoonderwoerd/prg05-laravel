@extends('layouts.web')
@section('title', 'home')
@section('content')
    <div class="section">
        <h1 class="container">Mail a message to me</h1>
    </div>
    <section class="section">
        <form class="container" method="get">
            <input type="text" name="name" id="name" class="input">
            <button type="submit" class="button mailButton">Send</button>
        </form>
    </section>

@endsection


