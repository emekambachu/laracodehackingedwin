<?php

namespace App\Http\Controllers;

//Import Http Requests
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;

//Import Classes/Models
use App\Role;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Hash; //this must b included for hashing password
use Illuminate\Support\Facades\Session; //this must be included for using flash sessions


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //get all form fields with array
        $input = $request->all();

        //Hash password field
        $input['password'] = Hash::make($request->password);

        //request upload image
        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['img'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        //create user or post
        User::create($input);

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //get user ID
        $user = User::findOrFail($id);

        //if password field is empty, get password from db
        if(trim($request->password) == ''){
            //$input = $request->except('password');
            $input['password'] = $user->password;
        }else{
            //else request for all fields and Hash password
            $input = $request->all();
            //$input['password'] = bcrypt($request->password);
            $input['password'] = Hash::make($request->password);
        }

        //upload file during update
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['img'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        //if password field is empty do not update password
        //     if(empty($input['password'])){
        //        $input['password'] = $user->password;
        //      }

        $user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find user
        $user = User::findOrFail($id);

        if($user->Photo){ //if there is a photo for this user, delete the photo first and then delete the user
            //Unlink Image from user
            unlink(public_path() . '/images/' . $user->photo->img);
            //Delete User
            $user->delete();
        }else{//Else just delete user
            //Delete User
            $user->delete();
        }

        //flash notification
        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('/admin/users');
    }
}
