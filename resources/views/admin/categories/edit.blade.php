@extends('layouts.app')

@section('content')

  @include('admin.includes.errors')

   <div class="panel panel-default">
       <div class="panel-heading">
           Update Category: {{ $category->name }}
       </div>

       <div class="panel-body">
       <form action="{{ route('category.update', [ 'id' => $category->id ]) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">Category Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="name">
            </div>
            
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
           </form>
       </div>


   </div>

   {{-- {{ Form::open() }} --}}
@endsection