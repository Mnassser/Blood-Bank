@extends('layouts.app')

@section('content')

	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <a href="/bloodbank/governments/create"class="btn btn-primary">Create</a>
    <hr>
    
    

    	<table class="table table-hover">
       <tr><th>ID</th><th>المحافظة</th><th>العمليات</th></tr>
@foreach($governments as $government)

       <tr><td>{{$government->id}}</td><td>{{$government->name}}</td>

@role('admin')
       		<form action="{{route('governments.destroy',$government->id)}}" method="post">
       	@endrole
        <td><a href="{{url('bloodbank/governments/'.$government->id.'/citis')}}" class="btn btn-warning">show</a>	
       		<a href='/bloodbank/governments/{{$government->id}}/edit' class="btn btn-success">edit</a>
           @csrf
           @method('DELETE')
           @role('admin')
           <input type="submit" class="btn btn-danger" value="delete" name="delete" onclick="return confirm('لو اتمسحت هتتمرمط اقسم بالله');"/> 
           @endrole
          </form>
       
      
@endforeach
</table>

    


@endsection