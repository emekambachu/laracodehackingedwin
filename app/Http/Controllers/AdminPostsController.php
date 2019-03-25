<?php

namespace App\Http\Controllers;

use App\Category; //Import Category Class
use App\Http\Requests\PostRequest; //Import PostRequest
use App\Photo; //Import Photo Class
use App\Post; //Import Post Class
use App\Comment; //Import Post Class

use Illuminate\Http\Request; //Import Request
use Illuminate\Support\Facades\Auth; //Import Auth
use Illuminate\Support\Facades\Session; //Imported flash session

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(PostRequest $request)
    {
        //Request data from fields
        $input = $request->all();

        //get logged in user
        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['img'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        $user->posts()->create($input);

        return redirect('/admin/posts');

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
        $post = Post::findOrFail($id);
        return view('post', compact('post'));

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
        $post = Post::findOrfail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['img'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        //Allows logged in user to edit his own post
        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('/admin/posts');

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
        $post = Post::findOrFail($id);

        //If there is a photo available, delete it
        unlink(public_path() . '/images/' . $post->photo->img);

        //Delete User
        $post->delete();

        //flash notification
        Session::flash('deleted_post', 'The post has been deleted');

        return redirect('/admin/posts');
    }

    public function post($id){
        $post = Post::findOrFail($id);
        $comments = $post->comment()->whereIsActive(1)->get();
        return view('post', compact('post', 'comments'));
    }

}
