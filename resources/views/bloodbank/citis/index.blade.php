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
    <a href="citis/create"class="btn btn-primary">Create</a>
    <hr>
    
      

      <table class="table table-hover">
       <tr><th>ID</th><th>المحافظة</th><th>العمليات</th></tr>
@foreach($citis as $city)

       <tr><td>{{$city->id}}</td><td>{{$city->name}}</td>

        @role('admin')
          <form action="{{route('governments.citis.destroy',[$city->id,$governments_id])}}" method="post">
            @endrole
        <td>
          <a href="/bloodbank/governments/{{$city->id}}/citis/{{$governments_id}}/edit" class="btn btn-success">edit</a>
           @csrf
                   @role('admin')
           @method('DELETE')

           <input type="submit" class="btn btn-danger" value="delete" name="delete"/> 
           @endrole
          </form>
       
      
@endforeach
</table>

    


@endsection