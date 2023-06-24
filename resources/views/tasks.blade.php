@extends('layouts.default')
@section('title', 'Tasks')
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="row mt-5">
	<div class="col-sm-10">
		<h2 class=""><b>Tasks</b></h2>
	</div>
	<div class="col-sm-2">
		<div class="text-right mb-3">
		<a href="/add-task" class="btn btn-outline-primary">Add New</a>
	</div>
	</div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Priority</th>
      <th scope="col">Assigned To</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
  	@if(sizeof($tasks))
  		@foreach($tasks as $task)
		    <tr>
		      <td>{{$task->name}}</td>
		      <td>{{$task->description}}</td>
		      <td style="text-transform: capitalize;">{{$task->priority}}</td>
		      <td>{{$task->username}}</td>
		      <td style="text-transform: capitalize;">{{$task->status}}</td>
		      <td class="text-center">
		      	<a href="/edit-task/{{$task->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		      	<a href="javascript:void(0)" onclick="delete_task(<?= $task->id; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
		      </td>
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

<script type="text/javascript">
	function delete_task(id)
	{
		if(confirm('Are you sure you want to delete task'))
		{
			window.location = '/delete-task/'+id;
		}
	}
</script>
@stop