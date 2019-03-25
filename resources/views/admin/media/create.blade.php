@extends('layouts.admin')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"/>
@endsection


@section('content')
    {{--@if(Session::has('deleted_post'))--}}
    {{--<p align="center" class="bg-danger col-lg-12">{{session('deleted_post')}}</p>--}}
    {{--@endif--}}

    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}

    {!! Form::close() !!}
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection