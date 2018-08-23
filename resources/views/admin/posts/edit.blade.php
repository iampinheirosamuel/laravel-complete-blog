@extends('layouts.app')

@section('content')

   @if(count($errors) > 0)
      <ul class="list-group">
        
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}    
                </li> 
            @endforeach
       
      </ul>
   @endif
   <div class="panel panel-default">
       <div class="panel-heading">
           {{-- You are editing {{ $post->title }} --}}
       </div>

       <div class="panel-body">
       <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">Title</label>
            <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="Title">Select a Post Category</label>
                <select class="form-control" name="category_id">
                      @foreach($category as $category)
                              <option value="{{ $category->id }}"
                                
                                @if($post->category->id == $category->id)
                                    selected
                                @endif
                                > {{ $category->name }}</option>
                      @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="Featured Image">Featured Image</label>
                <input type="file" name="featured" id="featured" class="form-control-file">
            </div>

            <div class="form-group">
                <label>Select tags</label>
                @foreach($tags as $tag)
                <div class="checkbox">
                <label for="tags"><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                     @foreach($post->tags as $t)
                        @if( $tag->id === $t->id)
                              checked
                        @endif
                    @endforeach
                    >{{ $tag->tag }} </label>
                </div>  
                @endforeach  
            </div>

            
            <div class="form-group">
                <label for="content">Content</label>
            <input type="textarea" row="3" class="form-control" value="{{ $post->content }}" name="content" id="content">
            </div>
            
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </div>
           </form>
       </div>


   </div>

   {{-- {{ Form::open() }} --}}
@endsection