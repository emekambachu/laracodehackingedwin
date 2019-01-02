@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p align="center" class="bg-danger col-lg-12">{{session('deleted_user')}}</p>
        @endif

    <h1>Admin user section</h1>

      <table class="table">
          <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
          </thead>

          <tbody>

          @if(!empty($users))
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
                <td>
                    <img class="img-circle" style="object-fit: cover; object-position: center" width="70" height="70" src="/images/{{$user->Photo ? $user->photo->img : 'noimage.png'}}">
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    {{empty($user->role_id) ? 'None' : $user->role->name}}
                </td>
                <td>
                    {{$user->is_active == 1 ? 'Active' : 'Not Active'}}
                </td>
                <td>{{date('jS \of F Y', strtotime($user->created_at))}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>

                <td>
                    <a href="{{route('users.edit', $user->id)}}">
                        <button class="btn btn-circle btn-warning">
                            <i class="fa fa-edit"></i>
                        </button>
                    </a>
                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id] ]) !!}
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