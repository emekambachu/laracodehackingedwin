@extends('layouts.admin')

@section('content')
    {{--error notifications inclusion folder--}}
    @include('includes.error-notifications')

    <h1>Edit user ({{$user->name}})</h1>

    <div class="col-sm-3">
        <img width="400" src="/images/{{$user->photo ? $user->photo->img : 'noimage.png'}}" class="img-responsive img-rounded" />
    </div>


    <div class="col-sm-9">

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
    {{csrf_field()}}

    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Upload Image:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',[''=>'Choose Option'] + $roles, null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active', array(1 => 'active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>

    <div>
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    </div>


@endsection