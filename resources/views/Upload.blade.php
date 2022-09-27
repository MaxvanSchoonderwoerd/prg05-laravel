@extends('layouts.web')
@section('title', 'Upload')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Upload</h1>
            <a href="{{ route('home') }}">Home</a>
        </div>
    </section>
    <section class="section">
        <form action="{{url('uploadBeat')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="inputTitle">Upload een beat</h1>
            <input type="text" id="title" name="title" maxlength="40" placeholder="Title" required>
            <textarea type="text" id="description" name="description" maxlength="240" placeholder="Description" required></textarea>
            <input type="number" id="bpm" name="bpm" placeholder="Bpm" min="30" max="300" required>
            <input list="genre" name="genre" placeholder="Genre" required>
            <datalist id="genre">
                <option value="Hiphop">
                <option value="Trap">
                <option value="Drill">
                <option value="RnB">
                <option value="Pop">
                <option value="House">
                <option value="Drum And Bass">
                <option value="2step">
                <option value="Garage">
                <option value="Other">
            </datalist>
            <input class="hidden" id="m_audio" name="m_audio" type="file" accept=".mp3,audio/*" placeholder="upload beat" required>
            <label class="fileUpload audio" for="m_audio">Upload Mp3</label>
            <input class="hidden" id="m_cover" name="m_cover" type="file" placeholder="upload cover art">
            <label class="fileUpload cover" for="m_cover">Upload Cover Art</label>
            <button class="button uploadButton" type="submit">Upload</button>
        </form>

@endsection

