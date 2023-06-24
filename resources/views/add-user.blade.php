@extends('layouts.default')
@section('title', 'Add User')
@section('content')
  <h2 class="text-center"><b>Add User</b></h2>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="/add-user" method="post" class="create_user">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <style type="text/css">
    .error{
      color: red;
    }
  </style>
@stop