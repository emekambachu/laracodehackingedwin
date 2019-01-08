@extends('layouts.admin')

@section('content')

    {{--error notifications inclusion folder--}}
    @include('includes.error-notifications')

    <h1>Create Category</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
    {{csrf_field()}}

    <div class="form-group col-sm-3">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null,['class'=>'form-control']) !!}
    </div>

    <div class="col-sm-3">
        {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection