@extends('layouts.app')


@section('content')

@if($errors->any())
	<ul>
	@foreach($errors->all() as $error)
		<li class="btn-danger">{{$error}}</li>
	@endforeach
</ul>
@endif



<form action="{{ route('categories.store')}}" method="post">
@csrf
<label>Create:</label>
<input type="text" name="name"/>
<br>
<input type="submit" name="submit" class="btn btn-success" value="create" />

</form>


@endsection