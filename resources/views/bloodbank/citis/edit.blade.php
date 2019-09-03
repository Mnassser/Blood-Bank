@extends('layouts.app')


@section('content')



@if($errors->any())
	<ul>
	@foreach($errors->all() as $error)
		<li class="btn-danger">{{$error}}</li>
	@endforeach
</ul>
@endif




<form action="{{route('governments.citis.update',[$governments_id,$city->id])}}" method="POST">
@csrf
@method('PUT')
<label>Create city:</label>
<input type="text" name="name" value="{{$city->name}}" />
<br>
<input type="submit" name="submit" class="btn btn-success" value="create" />

</form>


@endsection