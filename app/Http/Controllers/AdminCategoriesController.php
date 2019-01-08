<?php

namespace App\Http\Controllers;

use App\Category; //Add Category Class
use Illuminate\Support\Facades\Session; //Imported flash session
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get all form fields with array
        $input = $request->all();

        //create category
        Category::create($request->all());

        //session notification
        Session::flash('created_category', $input['name'] . ' has been created');

        return redirect('admin/categories');
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
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
        //get category ID
        $category = Category::findOrFail($id);

        //else request for all fields and Hash password
        $input = $request->all();

        $category->update($input);

        //session notification
        Session::flash('updated_category', $input['name'] . ' has been Updated');

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find Category
        $category = Category::findOrFail($id);

        //Delete Category
        $category->delete();

        //flash notification
        Session::flash('deleted_category', 'The category has been deleted');

        return redirect('/admin/categories');
    }
}
