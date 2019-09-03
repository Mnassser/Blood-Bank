@extends('layouts.app')


@section('content')



@if($errors->any())
	<ul>
	@foreach($errors->all() as $error)
		<li class="btn-danger">{{$error}}</li>
	@endforeach
</ul>
@endif




<form action="{{ route('governments.citis.store',$governments_id)}}" method="post">
@csrf
<label>Create city:</label>
<input type="text" name="name"/>
<br>
<input type="submit" name="submit" class="btn btn-success" value="create" />

</form>


@endsection