@extends('layouts.default')
@section('title', 'Edit User')
@section('content')
  <h2 class="text-center"><b>Edit User</b></h2>
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
  <form action="/update-user" method="post" class="edit_user">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo isset($user->name)?$user->name:''; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" readonly placeholder="Enter Email" value="<?php echo isset($user->email)?$user->email:''; ?>">
    </div>
    <div class="form-group">
      <label for="password">Change Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
    </div>
    <input type="hidden" name="user_id" value="<?php echo isset($user->id)?$user->id:''; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <style type="text/css">
    .error{
      color: red;
    }
  </style>
@stop