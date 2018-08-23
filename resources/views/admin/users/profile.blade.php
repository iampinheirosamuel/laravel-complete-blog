@extends('layouts.app')

@section('content')

   @include('admin.includes.errors')
   
   <div class="panel panel-default">
       <div class="panel-heading">
           Update {{ $user->name }}'s Profile
       </div>

       <div class="panel-body">
       <form action="{{ route('user.profile.update') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">User Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
            </div>

             <div class="form-group">
                <label for="Title">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="name">
            </div>

             <div class="form-group">
                <label for="Title">New Password</label>
                <input type="password" class="form-control" name="password"  id="name">
            </div>

            <div class="form-group">
                <label for="Title">Upload New Avatar</label>
                <input type="file" class="form-control-file" name="avatar" value="{{ $user->profile->avatar }}" id="name">
            </div>

            <div class="form-group">
                <label for="Title">Facebook Profile</label>
                <input type="text" class="form-control" name="facework" value="{{ $user->profile->facebook}}" id="name">
            </div>

            <div class="form-group">
                <label for="Title">Youtube Profile</label>
                <input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}" id="name">
            </div>

            <div class="form-group">
                <label for="Title">About</label>
                <textarea type="textarea" class="form-control" name="about" value="{{ $user->profile->about }}" cols="6" id="summernote"></textarea>
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