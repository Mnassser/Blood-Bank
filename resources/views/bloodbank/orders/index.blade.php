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
    
    <hr>
    
    

      <table class="table table-hover">
       <tr>

        <th>ID</th>
        <th>name</th>
        <th>phone</th>
        <th>amount</th>
        <th>Hospital Name</th>
        <th>BloodType</th>
        
        <th>City_id</th>
        <th>Notice</th>
        <th>Op'\s</th>

     </tr>
@foreach($orders as $order)

       <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->name}}</td>
          <td>{{$order->phone}}</td>
          <td>{{$order->amount}}</td>
      <td>{{$order->hospital_name}}</td>
        <td>{{$order->bloodtype->name}}</td>

         <td>{{optional($order->city)->name}}</td>

          <td>{{optional($order->client)->name}}</td>

        <td>{{$order->notice}}</td>
        
      <td>
        @role('admin')
          <form action="{{route('orders.destroy',$order->id)}}" method="POST">   
           @csrf
          @method('DELETE')
           <input type="submit" class="btn btn-danger" value="delete" name="delete"/> 
          </form>
       @endrole


       </td>
      
@endforeach
</table>

{{$orders->links()}}
   
    <br>


@endsection