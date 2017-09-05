@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Owner</th>
            <th>Created At</th>
            <th>updated At</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}"> {{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td><img height="50" width="50" src="{{$post->photo? $post->photo->file : "profile.png"}}"></td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach
        @endif

        </tbody>
    </table>

@endsection