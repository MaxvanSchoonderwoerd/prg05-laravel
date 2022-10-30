@extends('layouts.app')
@section('title', 'details')
@section('content')
    <section class="section">
        <h1>Edit user</h1>
    </section>
    <section class="section">
        <form class="form" action="{{route('user.update', $user->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input class="form-control" type="text" id="name" name="name" maxlength="40"
                       placeholder="Name" value="{{Auth::user()->name }}">
            </div>
            <div class="mb-3">
                <input class="form-control" type="email" id="email" name="email" maxlength="240"
                       placeholder="Email" value="{{Auth::user()->email }}">
            </div>
            <button class="btn btn-primary mb-2" type="submit">Edit User Info</button>
        </form>
    </section>
    <section class="section">
        <table class="section">
            <tr>
                <th>Title</th>
                <th>Date Added</th>
                <th>Likes</th>
                <th>Dislikes</th>
                <th>Actief</th>
                <th>Delete</th>
            </tr>
            @foreach($posts as $post)
                <tr>
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
