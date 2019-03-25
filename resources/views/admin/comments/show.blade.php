@extends('layouts.admin')

@section('content')

    @if($comments)
        <h2>Comments</h2>

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>View Post</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->body }}</td>
                <td>
                    <a href="{{ route('home.post', $comment->post->id ) }}">View Post</a>
                </td>
                <td>
                    @if($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentController@update', $comment->id]]) !!}
                        {{csrf_field()}}

                        <input type="hidden" name="is_active" value="0">

                        <div>
                            {!! Form::submit('unapprove', ['class'=>'btn btn-danger btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentController@update', $comment->id]]) !!}
                        {{csrf_field()}}

                        <input type="hidden" name="is_active" value="1">

                        <div>
                            {!! Form::submit('approve', ['class'=>'btn btn-success btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    @endif
                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentController@destroy', $comment->id]]) !!}
                    {{csrf_field()}}

                    <div>
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
                @endforeach

        </tbody>

    </table>
    @else
        No Comments
    @endif

@endsection