@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading"> Users</div>
      <table class="table table-hover">
          <thead>

               <th>
                    Image
               </th>
               
               <th>
                    Name
               </th>

               <th>
                   Roles
               </th>

              
               <th>
                   Delete
               </th>

          </thead>
          <tbody>
            
            @if($users->count() > 0)

              @foreach($users as $user)
                <tr>

                    <td>
                      <img src=" {{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="50px" height="50px" style="border-radius:50%;" class="img-responsive">  
                    </td>
                    
                    <td>
                       {{ $user->name }}
                    </td>

                    <td>
                        @if($user->admin)

                            <a href="{{ route('user.notAdmin', [ 'id' => $user->id ]) }}" class="btn btn-xs btn-danger">Remove Admin role</a>

                        @else


                    <a href="{{ route('user.isAdmin', ['id' => $user->id] ) }}" class="btn btn-xs btn-success">Make Admin</a>
                    {{-- <a href="{{ route('user.isAdmin',$user->id)}}" class="btn btn-xs btn-success">Make Admin</a> --}}

                        @endif
                    </td>

                   

                    <td> 
                        <a href="{{ route('user.destroy', [ 'id' => $user->id ]) }}" class="btn btn-xs btn-danger"><span class="glphyicon glyphyicon-trash"></span></a>
                    </td>

                </tr>
              @endforeach

              @else
              <tr>
                  <td>
                      No users created yet
                  </td>
              </tr>
              @endif
          </tbody>
      </table>
    </div>

@endsection