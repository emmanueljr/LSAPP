@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-primary">Go Back</a>
    <hr/>
        <h3>{{$post->title}}</h3>
        <img src="/storage/cover_images/{{$post->cover_image}}" class="img-responsive" style="width:100%"/>
        <br/><br/>
        <div>
            {!!$post->body!!}
        </div>
    <hr/>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    

    @if (!Auth::guest())
        @if(Auth::user()->id === $post->user_id)
            <br/><br/>
            <p>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
            </p>
            <p>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </p>
        @endif    
    @endif
@endsection