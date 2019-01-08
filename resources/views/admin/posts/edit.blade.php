@extends('layouts.admin')

@section('content')
    {{--error notifications inclusion folder--}}
    @include('includes.error-notifications')

    <h1>Edit Post ({{$post->title}})</h1>

    <div class="col-sm-3">
        <img width="400" src="/images/{{$post->photo ? $post->photo->img : 'noimage.png'}}" class="img-responsive img-rounded" />
    </div>


    <div class="col-sm-9">

        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id','Upload Image:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body', null,['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div>
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id] ]) !!}
        {{csrf_field()}}
        <div>
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}


    </div>


@endsection