@extends('layouts.app')

@section('content')

  @include('admin.includes.errors')

   <div class="panel panel-default">
       <div class="panel-heading">
           Update Tag: {{ $tag->tag }}
       </div>

       <div class="panel-body">
       <form action="{{ route('tag.update', [ 'id' => $tag->id ]) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">Tag Name</label>
            <input type="text" class="form-control" name="tag" value="{{ $tag->tag }}" id="">
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