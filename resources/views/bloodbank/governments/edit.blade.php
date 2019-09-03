@extends('layouts.app')


@section('content')



@if($errors->any())

<div class="alert alert-danger">
  <ul>

    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach

</ul>

</div>

@endif

<form action="{{route('governments.update',$government->id)}}" method="POST">
@csrf
@method('PUT')
<label>Create Government:</label>
<input type="text" name="name" value="{{$government->name}}" />
<br>
<input type="submit" name="submit" class="btn btn-success" value="create" />

</form>


@endsection







