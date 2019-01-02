@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>

        @if(!empty($posts))
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user ? $post->user->name : 'None' }}</td>
                    <td>{{$post->category ? $post->category->name : 'None'}}</td>
                    <td>
                        <img class="img-circle" style="object-fit: cover; object-position: center" width="70" height="70" src="/images/{{$post->Photo ? $post->photo->img : 'noimage.png'}}">
                    </td>

                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>

                    {{--<td>--}}
                        {{--<img class="img-circle" style="object-fit: cover; object-position: center" width="70" height="70" src="/images/{{$user->Photo ? $user->photo->img : 'noimage.png'}}">--}}
                    {{--</td>--}}

                    <td>{{date('jS \of F Y', strtotime($post->created_at))}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('posts.edit', $post->id)}}">
                            <button class="btn btn-circle btn-warning">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id] ]) !!}
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