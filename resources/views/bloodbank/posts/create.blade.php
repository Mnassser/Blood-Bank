@extends('layouts.app')


@section('content')

@role('admin|editor')
@if($errors->any())

<div class="alert alert-danger">
	<ul>

		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach

</ul>

</div>

@endif

<div class="container">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-5">
		
					<h2>Create</h2>
				</div>

<!-- 
				{!! Form::open() !!}
				  {!! Form::text('title' ,'العنةنا',[
                    'class' => 'form-control'
				  ])!!}
                {!! Form::close() !!}
 -->



			<form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">

				@csrf
				<input type="text" name="title" class="form-control" />
				<br>
				<textarea name="body" class="form-control"></textarea>
				<br>
				<input type="file" name="image" class="form-control" />
				<br>
				<select class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">
                    	{{$category->name}}
                    </option>



                    @endforeach
                  </select>
				<br>
				<input type="submit" name="" class="btn btn-success" />



			</form>
		</div>

</div>
@else
cant access
@endrole
@endsection