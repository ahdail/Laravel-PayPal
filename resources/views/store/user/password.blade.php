@extends('store.templates.master')

@section('content')

<h1 class="title">My Password - Update</h1>

@if(session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
@endif

@if(isset($errors) && count($errors) > 0)
  <div class="alert alert-warning">
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  </div>
@endif

<form class="form-horizontal" action="{{route('update.password')}}" method="post">
  {!! csrf_field()!!}
	<div class="form-group">
	    <label for="inputName3" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" name="password" class="form-control" placeholder="New Pass" required>
	    </div>
 	</div>
  <div class="form-group">
      <label for="inputName3" class="col-sm-2 control-label">Confirm Password</label>
      <div class="col-sm-10">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new pass" required>
      </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update Pass</button>
    </div>
  </div>
</form>

@endsection