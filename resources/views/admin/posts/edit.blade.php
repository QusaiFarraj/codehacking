@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    <div class="row">
        {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            <img height="75" width="75" src="{{$post->photo? $post->photo->file : "http://placehold.it/75X75"}}" class="img-responsive img-rounded">
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <div class="row">

        @include('includes.form_error')

    </div>



@endsection