@extends('layouts.default')
@section('title', 'Edit Task')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
  @endif
  <h2 class="text-center"><b>Edit Task</b></h2>
  <form action="/update-task" method="post" class="create_task">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo isset($task->name)?$task->name:''; ?>">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description"><?php echo isset($task->description)?$task->description:''; ?></textarea>
    </div>
    <div class="form-group">
      <label for="priority">Priority</label>
      <select name="priority" class="form-control">
        <option value="">Select Priority</option>
        <option <?php if(isset($task->priority) && $task->priority == 'low'){echo 'selected';} ?> value="low">Low</option>
        <option <?php if(isset($task->priority) && $task->priority == 'medium'){echo 'selected';} ?> value="medium">Medium</option>
        <option <?php if(isset($task->priority) && $task->priority == 'high'){echo 'selected';} ?> value="high">High</option>
      </select>
    </div>
    <div class="form-group">
      <label for="assigned_to">Assigned To</label>
      <select name="assigned_to" class="form-control">
        <option value="">Select User</option>
        @if($users)
          @foreach ($users as $user)
            <option <?php if(isset($task->assigned_to) && $task->assigned_to == $user->id){echo 'selected';} ?> value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        @endif
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="">Select Status</option>
        <option <?php if(isset($task->status) && $task->status == 'completed'){echo 'selected';} ?> value="completed">Completed</option>
        <option <?php if(isset($task->status) && $task->status == 'pending'){echo 'selected';} ?> value="pending">Pending</option>
      </select>
    </div>
    <input type="hidden" name="task_id" value="<?php echo isset($task->id)?$task->id:'';?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <style type="text/css">
    .error{
      color: red;
    }
  </style>
@stop