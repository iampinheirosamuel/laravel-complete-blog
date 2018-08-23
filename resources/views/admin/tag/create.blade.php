@extends('layouts.app')

@section('content')

   @include('admin.includes.errors')
   
   <div class="panel panel-default">
       <div class="panel-heading">
           Create a Tag
       </div>

       <div class="panel-body">
       <form action="{{ route('tag.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">Tag Name</label>
                <input type="text" class="form-control" name="tag" id="name">
            </div>
            
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
           </form>
       </div>


   </div>

   {{-- {{ Form::open() }} --}}
@endsection