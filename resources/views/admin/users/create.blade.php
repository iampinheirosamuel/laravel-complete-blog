@extends('layouts.app')

@section('content')

   @include('admin.includes.errors')
   
   <div class="panel panel-default">
       <div class="panel-heading">
           Create a User
       </div>

       <div class="panel-body">
       <form action="{{ route('user.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">User Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

             <div class="form-group">
                <label for="Title">Email</label>
                <input type="email" class="form-control" name="email" id="name">
            </div>
            
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Add User</button>
                </div>
            </div>
           </form>
       </div>


   </div>

   {{-- {{ Form::open() }} --}}
@endsection