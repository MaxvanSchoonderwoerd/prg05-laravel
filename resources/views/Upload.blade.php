@extends('layouts.app')
@section('title', 'Upload')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Upload a beat</h1>
            <a href="{{ route('post.index') }}">Home</a>
        </div>
    </section>
    <section class="section">
        <form action="{{url('uploadBeat')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" id="title" name="title" maxlength="40" placeholder="Title" required>
            @error('title')
            <span>{{$message}}</span>
            @enderror
            <textarea type="text" id="description" name="description" maxlength="240" placeholder="Description"
                      required></textarea>
            @error('description')
            <span>{{$message}}</span>
            @enderror
            <input type="number" id="bpm" name="bpm" placeholder="Bpm" min="30" max="300" required>
            @error('bpm')
            <span>{{$message}}</span>
            @enderror
            <select id="genre" name="genre">
                <option value="Hiphop">Hiphop</option>
                <option value="Trap">Trap</option>
                <option value="Drill">Drill</option>
                <option value="RnB">RnB</option>
                <option value="Pop">Pop</option>
                <option value="House">House</option>
                <option value="Drum And Bass">Drum And Bass</option>
                <option value="2step">2step</option>
                <option value="Garage">Garage</option>
                <option value="Other">Other</option>
            </select>
            @error('genre')
            <span>{{$message}}</span>
            @enderror
            <input class="hidden" id="m_audio" name="m_audio" type="file" accept=".mp3,audio/*"
                   placeholder="upload beat" required>
            <label class="fileUpload audio" for="m_audio">Upload Mp3</label>
            @error('m_audio')
            <span>{{$message}}</span>
            @enderror
            <input class="hidden" id="m_cover" name="m_cover" type="file" placeholder="upload cover art">
            <label class="fileUpload cover" for="m_cover">Upload Cover Art</label>
            @error('m_cover')
            <span>{{$message}}</span>
            @enderror
            <button class="button uploadButton" type="submit">Upload</button>
        </form>

@endsection

