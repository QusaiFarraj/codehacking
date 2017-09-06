@extends('layouts.admin')

@section('content')



    @if(count($comments)>0)

        <h1>Comments for {{$comments[1]->post->title}} post</h1>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>body</th>
            </tr>
            </thead>
            <tbody>

            @foreach($comments as $comment)
                <tr>

                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>

                    <td>

                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" value="0" name="is_active">

                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else


                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" value="1" name="is_active">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif
                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>

    @else

        <h1 class="text-center">No Comments to show</h1>

    @endif

@endsection