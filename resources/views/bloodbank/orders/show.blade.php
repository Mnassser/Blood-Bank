@extends('layouts.app')

@section('content')

<table class="table-hover">
       <tr><th>ID</th><th>المحافظة</th><th>العمليات</th>
       	<th>phone</th><th>email</th><th>العمليات</th></tr>
@foreach($clients as $client)

       <tr><td>{{$client->id}}</td><td>{{$client->name}}</td>
       	<th>{{$client->phone}}</th><th>{{$client->email}}</th><th>العمليات</th>
        <td><a href='governments/{{$client->id}}' class="btn btn-warning">show</a>  
          <a href='#' class="btn btn-success">edit</a>
          <a href='#' class="btn btn-danger">delete</a></td></tr>
       
      
@endforeach
</table>


@endsection