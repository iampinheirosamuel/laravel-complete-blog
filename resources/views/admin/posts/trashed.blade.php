@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading">All Trashed Posts</div>
      <table class="table table-hover">
          <thead>

               <th>
                    Image
               </th>
               
               <th>
                    Title
               </th>

               <th>
                   Edit
               </th>

               <th>
                   Restore
               </th>
               
               <th>
                   Delete
               </th>
          </thead>
          <tbody>
              @if(count($posts) > 0 )
              @foreach($posts as $post)
                <tr>

                    <td>
                      <img src=" {{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="90px" class="img-responsive">  
                    </td>
                    
                    <td>
                       {{ $post->title }}
                    </td>

                    <td> 
                        <a href="{{ route('post.edit', [ 'id' => $post->id ]) }}" class="btn btn-xs btn-info"> <span class="glphyicon glyphyicon-pencil"></span>Edit</a>
                    </td>

                    <td> 
                        <a href="{{ route('post.restore', [ 'id' => $post->id ]) }}" class="btn btn-xs btn-success"><span class="glphyicon glyphyicon-trash"></span>Restore</a>
                    </td>
                    
                    <td> 
                        <a href="{{ route('post.kill', [ 'id' => $post->id ]) }}" class="btn btn-xs btn-danger"><span class="glphyicon glyphyicon-trash"></span>Delete Permanently</a>
                    </td>
                </tr>

              @endforeach
              @endif
              @else
                <tr>
                    <th colspan="5" class="text-center">No thrashed posts</th>
                </tr>
          </tbody>
      </table>
    </div>

@endsection