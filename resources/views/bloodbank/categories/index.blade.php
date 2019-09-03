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
    <a href="/bloodbank/categories/create"class="btn btn-primary">Create</a>
    <hr>
    

      <table class="table table-hover">
       <tr><th>ID</th><th>المحافظة</th><th>العمليات</th></tr>
@foreach($categories as $category)

       <tr><td>{{$category->id}}</td><td>{{$category->name}}</td>

                @role('admin')

          <form action="{{route('categories.destroy',$category)}}" method="post">
                 @endrole

        <td>
          <a href='/bloodbank/categories/{{$category->id}}/edit' class="btn btn-success">edit</a>
          @role('admin')

           @csrf
           @method('DELETE')
           <input type="submit" class="btn btn-danger" value="delete" name="delete" onclick="return confirm('if deleted it will delete posts {thanks for mostafa swiedan}');" /> 
           @endrole
          </form>
       
      
@endforeach
</table>

    


@endsection