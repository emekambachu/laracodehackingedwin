@extends('layouts.blog-post')

@section('content')

    <h2 class="section-heading">{{ $post->title }}</h2>

    <a href="">
        <img class="img-fluid" src="/images/{{ $post->photo->img }}" alt="">
    </a>

    <p>
        {{ $post->body }}
    </p>

    <p>
        <strong>Post by:</strong> {{ $post->user->name }}<br>
        <strong>Posted on:</strong> {{ $post->created_at ? $post->created_at->diffForHumans() : ''}}
    </p>
    <br><br>

    <hr>

    @if(Session::has('comment_message'))
            {{ session('comment_message') }}
    @endif

    @if(Auth::check())
    <h2>Comments</h2>
    {!! Form::open(['method'=>'POST', 'action'=>'PostCommentController@store']) !!}
        {{csrf_field()}}

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="form-group">
            {!! Form::label('body','Body:') !!}
            {!! Form::textarea('body', null,['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div>
            {!! Form::submit('comment', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
    @endif

    <hr>

@if(count($comments) > 0)
    @foreach($comments as $comment)
    <div style="background-color: #0056b3; margin-bottom: 20px; padding: 15px;">
        <img width="70" src="{{$comment->photo}}"/>
        <h3>{{ $comment->title }}</h3>
        <p>{{ $comment->body }}</p>
        <p>by {{ $comment->author }}</p>
        <small>by {{ $comment->created_at->diffForHumans() }}</small>

        @if(count($comment->replies) > 0)
            @foreach($comment->replies as $reply)
                <div style="margin-left: 40px; margin-top: 20px; background-color: #6cb2eb;">
                    <img width="70" src="{{$reply->photo}}"/>
                    <h3>{{ $reply->title }}</h3>
                    <p>{{ $reply->body }}</p>
                    <p>by {{ $reply->author }}</p>
                    <small>by {{ $reply->created_at->diffForHumans() }}</small>
                </div>
            @endforeach

            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
            {{csrf_field()}}
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <div class="form-group">
                    {!! Form::label('body','Body:') !!}
                    {!! Form::textarea('body', null,['class'=>'form-control', 'rows'=>'1']) !!}
                </div>

                <div>
                    {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        @endif

    </div>
    @endforeach

@endif

    @endsection