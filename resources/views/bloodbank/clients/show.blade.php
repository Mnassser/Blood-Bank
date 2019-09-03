@extends('layouts.app')

@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Citis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Citis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <a href="{{ route('governments.citis.create', $id) }}">Add City</a>
    <hr>
    
      <div class="row">

      <table class="table-hover">
       <tr><th>ID</th><th>المحافظة</th><th>العمليات</th></tr>
 	 @foreach($citis as $city)

       <tr><td>{{$city->id}}</td><td>{{$city->name}}</td>


          
        <td><a href='{{$id}}/citis/{{$city->id}}' class="btn btn-warning">show</a>  
          <a href='governments/{{$city->id}}/edit' class="btn btn-success">edit</a>
           @csrf
           @method('DELETE')
           <input type="submit" class="btn btn-danger" value="delete" name="delete"/> 
          
      
@endforeach
</table>
</div>
    


@endsection