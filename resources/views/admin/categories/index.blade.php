@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_category'))
        <p align="center" class="bg-danger col-lg-12">{{session('deleted_category')}}</p>
    @elseif(Session::has('created_category'))
        <p align="center" class="bg-danger col-lg-12">{{session('created_category')}}</p>
    @elseif(Session::has('edited_category'))
        <p align="center" class="bg-danger col-lg-12">{{session('edited_category')}}</p>
    @endif

    <h1>Categories</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>

    @if(!empty($categories))
        @foreach($categories as $cat)
    <tr>
        <td>{{$cat->id}}</td>
        <td>{{$cat->name }}</td>
        <td>{{$cat->created_at ? date('jS \of F Y', strtotime($cat->created_at)): ''}}</td>
        <td>{{$cat->updated_at ? $cat->updated_at->diffForHumans(): ''}}</td>
        <td>
            <a href="{{route('categories.edit', $cat->id)}}">
                <button class="btn btn-circle btn-warning">
                    <i class="fa fa-edit"></i>
                </button>
            </a>
        </td>

        <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $cat->id] ]) !!}
            {{csrf_field()}}

            {{--<button class="btn btn-circle btn-danger">--}}
            {{--<i class="fa fa-trash"></i>--}}
            {{--</button>--}}

            {!! Form::submit("Delete", ['class'=>'btn btn-rounded btn-danger']) !!}

            {!! Form::close() !!}
        </td>

    </tr>
        @endforeach
    @endif

        </tbody>
    </table>

@endsection