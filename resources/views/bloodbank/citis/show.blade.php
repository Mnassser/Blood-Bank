@extends('layouts.app')

@section('content')

<table class="table table-bordered">
       <tr><th>ID</th><th>اسم المستخدم</th><th>رقم الهاتف</th>
       	<th>الايميل</th><th>مفعل</th><th>العمليات</th></tr>
@foreach($clients as $client)

       <tr>
       	<td>{{$client->id}}</td>
       	<td>{{$client->name}}</td>
       	<td>{{$client->phone}}</td>
       	<th>{{$client->email}}</td>
       	<td>
       		@if($client->active == 1)
       		<form >
       			
       		<input type='submit'  value ="active" class="btn btn-danger"/>
       		</form>
       	@elseif($client->active != 1)

       		<input type='submit'  value ="Deactive" class="btn btn-primary"/>


       	@endif
       	</td>
        <td>
       		<a href='governments/{{$client->id}}' class="btn btn-warning">show</a>  
          <a href='#' class="btn btn-success">edit</a>
          <a href='#' class="btn btn-danger">delete</a>

      </td></tr>
       
      
@endforeach
</table>


@endsection