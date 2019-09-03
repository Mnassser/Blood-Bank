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





<form action="{{ route('posts.update',$post->id)}}" method="post">
@csrf
@method('PUT')
<label>Update:</label>
<input type="text"  class="form-control" name="title" value="{{$post->title}}" />
<br>
<input type="file" name="image"  class="form-control"/>

<br>
<select class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">
                    	{{$category->name}}
                    </option>



                    @endforeach
                  </select>
                  <br>
<textarea name="body" class="form-control" >{{$post->body}}</textarea>
<br>
<input type="submit" name="submit" class="btn btn-success" value="create" />

</form>


@endsection