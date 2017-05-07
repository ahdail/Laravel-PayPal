@extends('store.templates.master')

@section('content')

<h1 class="title">Meu Perfil</h1>

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


<form class="form-horizontal" action="{{route('update.profile')}}" method="post">
  {!! csrf_field()!!}
	<div class="form-group">
	    <label for="inputName3" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="name" name="name" class="form-control" id="inputName3" placeholder="Name" value="{{auth()->user()->name}}">
	    </div>
 	</div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{auth()->user()->email}}" disabled>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

@endsection