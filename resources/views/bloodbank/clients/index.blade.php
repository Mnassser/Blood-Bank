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
          <form action="{{route('clients.update',$client->id)}}" method="POST" >
              @csrf
              @method('PUT')
          @if($client->active != 1)
          <input type="submit" name="submit" class="btn btn-primary" value="active"/>
          
        @elseif($client->active == 1)

          <input type="submit" name="submit" class="btn btn-warning" value="deactve"/>


        @endif



          </form>

      </td>@role('admin')
      <td><form action="{{route('clients.destroy',$client->id)}}" method="POST">
          @csrf
          @method('DELETE')
            <input type="submit" name="submit" class="btn btn-danger" value="delete"/>
        </form>
      @endrole</td></tr>
       
      
@endforeach
</table>


@endsection