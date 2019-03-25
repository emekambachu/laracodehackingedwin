@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_image'))
        <p align="center" class="bg-danger col-lg-12">
            {{session('deleted_image')}}
        </p>
    @endif

    <h1>Media</h1>

        @if($photos)

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->img ? $photo->img : 'None' }}</td>
                    <td>
                        <img class="img-circle" style="object-fit: cover; object-position: center" width="70" height="70" src="/images/{{$photo->img ? $photo->img : 'noimage.png'}}">
                    </td>
                    <td>{{$photo->created_at ? date('jS \of F Y', strtotime($photo->created_at)): ''}}</td>
                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans(): ''}}</td>

                    <td>
                        <a href="{{route('media.edit', $photo->id)}}">
                            <button class="btn btn-circle btn-warning">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id] ]) !!}
                        {{csrf_field()}}

                        {!! Form::submit("Delete", ['class'=>'btn btn-rounded btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

        @endif

@endsection