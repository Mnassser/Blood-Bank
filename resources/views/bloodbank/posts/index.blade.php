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
    @role('admin|editor')
    <a href="posts/create"class="btn btn-primary">Create</a>
    <hr>
    
    @endrole
     

      <table class="table table-hover">
       <tr><th>ID</th><th>الاسم</th>
       <th>category_id</th>
       <th>المجموعة</th>
       <th>ops</th>
       </tr>
       @role('admin|editor')
    @foreach($posts as $post)

       <tr><td>{{$post->id}}</td><td>{{$post->title}}</td>
        <td>{{$post->category_id}}</td>
        <td>{{$post->category->name}}</td>
<td>  @role('admin')

          <form action="{{route('posts.destroy',$post->id)}}" method="post">
      @endrole
        <a href="{{url('bloodbank/posts/'.$post->id)}}" class="btn btn-warning">show</a> 
          <a href='posts/{{$post->id}}/edit' class="btn btn-success">edit</a>
           @csrf
           @method('DELETE')
           @role('admin')
           <input type="submit" class="btn btn-danger" value="delete" name="delete"/> 
           @endrole
          </form>
      
      
    @endforeach
    @endrole
</table>

    


@endsection