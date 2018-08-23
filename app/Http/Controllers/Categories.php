<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;
use App\r;
use Illuminate\Http\Request;
use App\Category;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        
       

        return view('admin.categories.index')->with('category', $category);
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
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        // $category = App\Category::Category;
        $category = new Category;

        $category->name = $request->name;
        $category->save();
        
        Session::flash('success', 'You have successfully added a category');

        return redirect()->route('categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $category = Category::find($id);

        return view('admin.categories.edit')->with('category', $category)->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

         Session::flash('success', 'You have successfully updated category');

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
          $category = Category::find($id);

          foreach($category->posts as $post ){
           $post->forceDelete();
          }

          $category->delete();

           Session::flash('success', 'Category successfully deleted');

          return redirect()->route('categories');

    }
}
