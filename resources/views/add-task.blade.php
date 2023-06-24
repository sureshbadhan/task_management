@extends('layouts.default')
@section('title', 'Add Task')
@section('content')
  <h2 class="text-center"><b>Add Task</b></h2>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="/add-task" method="post" class="create_task">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description"></textarea>
    </div>
    <div class="form-group">
      <label for="priority">Priority</label>
      <select name="priority" class="form-control">
        <option value="">Select Priority</option>
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
      </select>
    </div>
    <div class="form-group">
      <label for="assigned_to">Assigned To</label>
      <select name="assigned_to" class="form-control">
        <option value="">Select User</option>
        @if($users)
          @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        @endif
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="">Select Status</option>
        <option value="completed">Completed</option>
        <option value="pending">Pending</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <style type="text/css">
    .error{
      color: red;
    }
  </style>
@stop