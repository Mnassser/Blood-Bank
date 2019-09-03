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
       <tr><th>ID</th>
        <th>الاسم</th>
       
       <th>المجموعة</th>
       <th>ops</th>
       </tr>
    @foreach($contacts as $contact)

       <tr><td>{{$contact->id}}</td><td>{{$contact->subject}}</td>
        <td>{{$contact->message}}</td>
        <td>{{$contact->name}}</td>
<td>      @role('admin')
          <form action="{{route('contacts.destroy',$contact->id)}}" method="post">
          @endrole
        <a href="{{url('bloodbank/contacts/'.$contact->id)}}" class="btn btn-warning">show</a> 
         
           @csrf
           @method('DELETE')
           @role('admin')
           <input type="submit" class="btn btn-danger" value="delete" name="delete"/> 
            @endrole
          </form>
      
      
    @endforeach
</table>

    


@endsection