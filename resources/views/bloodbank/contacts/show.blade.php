@extends('layouts.app')

@section('content')


<h1>{{$contact->name}}</h1>
<br>
<h1>{{$contact->email}}</h1>

<h1>{{$contact->phone}}</h1>
<h1>{{$contact->subject}}</h1>
<h1>{{$contact->message}}</h1>
@endsection