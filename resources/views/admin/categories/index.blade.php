@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading">Categories</div>
      <table class="table table-hover">
          <thead>

               <th>
                   Category Name
               </th>

               <th>
                   Editing
               </th>

               <th>
                   Deleting
               </th>

          </thead>
          <tbody>
              @if(count($category) > 0 )
              @foreach($category as $category)
                <tr>

                    <td>
                        {{ $category->name }}
                    </td>

                    <td> 
                        <a href="{{ route('category.edit', [ 'id' => $category->id ]) }}" class="btn btn-xs btn-info"> <span class="glphyicon glyphyicon-pencil"></span></a>
                    </td>

                    <td> 
                        <a href="{{ route('category.delete', [ 'id' => $category->id ]) }}" class="btn btn-xs btn-danger"><span class="glphyicon glyphyicon-trash"></span></a>
                    </td>

                </tr>
              @endforeach
              @else
                <tr>
                    <th colspan="5" class="text-center">No Categories yet</th>
                </tr>

                @endif
          </tbody>
      </table>
    </div>

@endsection