@extends('layouts.default')
@section('title', 'Tasks')
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="mt-5 mb-4 text-center">
	<h2 class=""><b>Pending Tasks <?= !empty($username)?'('.$username.')':''; ?></b></h2>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Priority</th>
      @if(empty($username))
      <th scope="col">Assigned To</th>
      @endif
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	@if(sizeof($tasks))
  		@foreach($tasks as $task)
		    <tr>
		      <td>{{$task->name}}</td>
		      <td>{{$task->description}}</td>
		      <td style="text-transform: capitalize;">{{$task->priority}}</td>
		      @if(empty($username))
		      <td>{{$task->username}}</td>
		      @endif
		      <td style="text-transform: capitalize;">{{$task->status}}</td>
		    </tr>
    	@endforeach

    @else
    	<tr>
	    	<td class="text-center" colspan="6">
	    		No Record yet !
	    	</td>
	    </tr>
    @endif
    
  </tbody>
</table>

<div class="pagination">
	{{ $tasks->links() }}
</div>

<style type="text/css">
	.pagination {text-align: right;width: 100%;display: block;margin-top: 40px;}

	.pagination a[rel="next"],.pagination a[rel="prev"] {
	    display: none;
	}

	span[aria-label="&laquo; Previous"],span[aria-label="Next &raquo;"] {
	    display: none;
	}
	.pagination > nav[role="navigation"] div:first-child {
    	display: none;
	}	
</style>

@stop