@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading">All Tagss</div>
      <table class="table table-hover">
          <thead>

               <th>
                   Tag Name
               </th>

               <th>
                   Editing
               </th>

               <th>
                   Deleting
               </th>

          </thead>
          <tbody>
              @if(count($tags) > 0 )
              @foreach($tags as $tag)
                <tr>

                    <td>
                        {{ $tag->tag }}
                    </td>

                    <td> 
                        <a href="{{ route('tag.edit', [ 'id' => $tag->id ]) }}" class="btn btn-xs btn-info"> <span class="glphyicon glyphyicon-pencil"></span></a>
                    </td>

                    <td> 
                        <a href="{{ route('tag.delete', [ 'id' => $tag->id ]) }}" class="btn btn-xs btn-danger"><span class="glphyicon glyphyicon-trash"></span></a>
                    </td>

                </tr>
              @endforeach

              @else
                <tr>
                    <th colspan="5" class="text-center">No Tags</th>
                </tr>

                @endif
          </tbody>
      </table>
    </div>

@endsection