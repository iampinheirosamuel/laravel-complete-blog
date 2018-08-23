<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag; 
use Session;
use App\Post;
use Illuminate\Http\Request;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $post = Post::all();

      return view('admin.posts.index')->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $category = Category::all();
        
         if($category->count()== 0)

        {

            Session::flash('info','You must have at least a category');

            return redirect()->back();
        }
        
        return view('admin.posts.create')->with('category', $category)->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // //
        $this->validate($request, [
           
        'title' => 'required|max:255',
        'featured' => 'required|image',
        'content' => 'required',
        'category_id' => 'required'
        
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            'title' => $request->title,

            'content' => $request->content,

            'featured' => 'uploads/posts/'.$featured_new_name,
            
            'category_id' => $request->category_id,

            'user_id' => Auth::id(),

            'slug' => str_slug($request->title)
                        

        ]);

        $post->tags()->attach($request->tags);


        Session::flash('success', 'Post created successfully');

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // // //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        //
        $post = Post::find($id);

        $category = Category::all();

        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $id)
    {
        //
       

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')){
           
            $featured = $request->featured;

            $featured_new_name = time().$featured->getCientOriginalName();

            $featured = move('uploads/posts/', $featured_new_name);

            $post->title = $request->title;

            $post->content = $request->content;

            $post->category_id = $request->category_id;
               
            $post->save();

            $post->tags()->sync($request->tags);

            Session::flash('success','You have successfully updated a post');

            return redirect()->back();
                
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','You have successfully deleted a post');

        return redirect()->back();
    }


    public function trashed(){
        //
        $posts = Post::onlyTrashed()->get();

         if($posts->count()== 0)

        {

            Session::flash('info','You do not have an trashed post');

            return redirect()->back();
        }

        return view('admin.posts.trashed')->with('posts', $posts);

    }


     public function kill($id){
        //
        $posts = Post::withTrashed()->where('id', $id)->first();
        
        $posts->forceDelete();

        Session::flash('success','Post deleted permanently');

        return redirect()->back();

    }

     public function restore($id){
        //
        $posts = Post::withTrashed()->where('id', $id)->first();
        
        $posts->restore();

        Session::flash('success','Post restored successfully');

        return redirect()->route('posts');

    }
}
