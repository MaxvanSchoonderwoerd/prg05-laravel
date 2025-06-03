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
        <form class="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input class="form-control" type="text" id="title" name="title" maxlength="40" placeholder="Title" required>
                @error('title')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <textarea class="form-control" type="text" id="description" name="description" maxlength="240"
                    placeholder="Description" required></textarea>
                @error('description')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-row">
                <div class="mb-3">
                    <input class="form-control" type="number" id="bpm" name="bpm" placeholder="Bpm" min="30" max="300"
                        required>
                    @error('bpm')
                        <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-control" id="genre" name="genre">
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
                </div>
            </div>
            <div class="mb-3">
                <input class="hidden" id="m_audio" name="m_audio" type="file" accept="audio/*" placeholder="upload beat"
                    required>
                <label class="form-control" for="m_audio">Upload Mp3
                    <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                        xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
                        <g transform="matrix(1 0 0 1 12 12)">
                            <path
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                transform=" translate(-11, -12)"
                                d="M 7 2 C 5.9057453 2 5 2.9057453 5 4 L 5 9 L 3 9 C 1.895 9 1 9.895 1 11 L 1 16 C 1 17.105 1.895 18 3 18 L 5 18 L 5 20 C 5 21.094255 5.9057453 22 7 22 L 19 22 C 20.094255 22 21 21.094255 21 20 L 21 7 L 16 2 L 7 2 z M 7 4 L 15 4 L 15 8 L 19 8 L 19 20 L 7 20 L 7 18 L 16 18 C 17.105 18 18 17.105 18 16 L 18 11 C 18 9.895 17.105 9 16 9 L 7 9 L 7 4 z M 14.240234 10.884766 C 15.849234 10.851766 15.939594 12.070734 15.933594 12.302734 C 15.913594 12.976734 15.314312 13.317094 15.195312 13.371094 C 15.467313 13.472094 16.004 13.755203 16 14.533203 C 15.99 16.022203 14.481422 16.011094 14.232422 15.996094 C 12.834422 15.912094 12.574219 14.810453 12.574219 14.564453 L 13.691406 14.564453 C 13.691406 14.655453 13.786672 15.206359 14.263672 15.193359 C 14.849672 15.177359 14.880719 14.787625 14.886719 14.515625 C 14.892719 14.253625 14.677703 13.786344 14.220703 13.777344 L 13.679688 13.777344 L 13.679688 12.998047 L 14.220703 12.998047 C 14.802703 12.928047 14.814453 12.522453 14.814453 12.314453 C 14.814453 12.223453 14.786484 11.677547 14.271484 11.685547 C 13.802484 11.693547 13.742187 12.153234 13.742188 12.240234 L 12.626953 12.240234 C 12.626953 12.035234 12.755234 10.914766 14.240234 10.884766 z M 9 11 L 10 11 L 10.5 11 C 11.328 11 12 11.672 12 12.5 C 12 13.328 11.328 14 10.5 14 L 10 14 L 10 16 L 9 16 L 9 14 L 9 11 z M 3 11.023438 L 4.4570312 11.023438 L 5.5019531 14.623047 L 6.5429688 11.023438 L 8 11.023438 L 8 16 L 7.9980469 16 L 7 16 L 7 14.652344 L 7.1035156 12.578125 L 5.8769531 16 L 5.1171875 16 L 3.8984375 12.578125 L 4 14.652344 L 4 16 L 3 16 L 3 11.023438 z M 10 12 L 10 13 L 10.5 13 C 10.776 13 11 12.776 11 12.5 C 11 12.224 10.776 12 10.5 12 L 10 12 z"
                                stroke-linecap="round" />
                        </g>
                    </svg>
                </label>
                @error('m_audio')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input class="hidden" id="m_cover" name="m_cover" type="file" accept="image/*"
                    placeholder="upload cover art">
                <label class="form-control" for="m_cover">Upload Cover Art
                    <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                        xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
                        <g transform="matrix(1 0 0 1 12 12)">
                            <path
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                transform=" translate(-11, -12)"
                                d="M 6 2 C 4.9057453 2 4 2.9057453 4 4 L 4 9 C 2.895 9 2 9.895 2 11 L 2 16 C 2 17.105 2.895 18 4 18 L 4 20 C 4 21.094255 4.9057453 22 6 22 L 18 22 C 19.094255 22 20 21.094255 20 20 L 20 7 L 15 2 L 6 2 z M 6 4 L 14 4 L 14 8 L 18 8 L 18 9 L 6 9 L 6 4 z M 4 11 L 5.5 11 C 6.328 11 7 11.672 7 12.5 C 7 13.328 6.328 14 5.5 14 L 5 14 L 5 16 L 4 16 L 4 11 z M 11 11 L 12 11 L 12 16 L 10.845703 16 L 9 12.736328 L 9 16 L 8 16 L 8 11.023438 L 9.1542969 11.023438 L 11 14.267578 L 11 11 z M 15.035156 11.001953 C 16.207156 11.002953 16.673281 11.538953 16.863281 12.001953 L 15 12.001953 C 14.118 11.988953 14 12.856937 14 13.085938 L 14 13.914062 C 14 14.146062 14.206781 15.011953 15.175781 15.001953 C 15.458781 14.998953 15.976 14.836266 16 14.822266 L 15.978516 14 L 15 14 L 15.021484 13 L 17 13 L 17 15.380859 C 16.94 15.436859 16.291422 15.961047 15.107422 15.998047 C 14.785422 16.008047 13.132 16.038062 13 13.914062 L 13 13.091797 C 13 12.736797 12.958156 10.999953 15.035156 11.001953 z M 5 12 L 5 13 L 5.5 13 C 5.776 13 6 12.776 6 12.5 C 6 12.224 5.776 12 5.5 12 L 5 12 z M 6 18 L 18 18 L 18 20 L 6 20 L 6 18 z"
                                stroke-linecap="round" />
                        </g>
                    </svg>
                </label>
                @error('m_cover')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <button class="btn btn-primary mb-2" type="submit">Upload</button>
        </form>
    </section>
@endsection