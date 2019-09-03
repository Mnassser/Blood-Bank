@extends('layouts.app')
@inject('category',App\Model\Category)
@section('content')


<h1>{{$post->title}}</h1>
<br>
<p>{{$post->body}}</p>
<h3>{{$category->find($post->category_id)->name}}</h3>
@endsection