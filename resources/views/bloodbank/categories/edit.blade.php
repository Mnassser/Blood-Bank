@extends('layouts.app')


@section('content')


@if($errors->any())
	<ul>
	@foreach($errors->all() as $error)
		<li class="btn-danger">{{$error}}</li>
	@endforeach
</ul>
@endif



<form action="{{route('categories.update',$category->id)}}" method="post">
@csrf
@method('PUT')
<label>Update:</label>
<input type="text" name="name" value="{{$category->name}}" />
<br>
<input type="submit" name="submit" class="btn btn-success" value="create" />

</form>


@endsection