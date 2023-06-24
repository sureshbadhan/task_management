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
		<h2 class=""><b>Users</b></h2>
	</div>
	<div class="col-sm-2">
		<div class="text-right mb-3">
		<a href="/add-user" class="btn btn-outline-primary">Add New</a>
	</div>
	</div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created at</th>
      <th scope="col" class="text-center">Pending Task</th>
      <th scope="col" class="text-center">Completed Task</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
  	@if(sizeof($users))
  		@foreach($users as $user)
		    <tr>
		      <td>{{$user->name}}</td>
		      <td>{{$user->email}}</td>
		      <td>{{$user->created_at}}</td>
		      <td class="text-center">
		      	<a href="/pending-task?user_id=<?= $user->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> <br><br>
		      </td>
		      <td class="text-center">
		      	<a href="/completed-task?user_id=<?= $user->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
		      </td>
		      <td class="text-center">
		      	<a href="/edit-user/{{$user->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		      	<a href="javascript:void(0)" onclick="delete_task(<?= $user->id; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
	{{ $users->links() }}
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
		if(confirm('Are you sure you want to delete user'))
		{
			window.location = '/delete-user/'+id;
		}
	}
</script>

@stop