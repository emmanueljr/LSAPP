@extends('layouts.app')

@section('content')
    <h1>Edit Posts</h1>
    
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 
    'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['placeholder' => 'Enter Your Title Here', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'placeholder' => 'Enter Your Post Here', 'class' => 'form-control'])}}
        </div>
            {{Form::hidden('_method', 'PUT')}}
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
       
    {!! Form::close() !!}
@endsection 