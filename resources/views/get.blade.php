@extends('layouts.HTML-guest')
@section("title","pruba-GET")
@section('content')
    
<h1>pruba funcion</h1>
@foreach ($gets as $get)
    <h2>{{ $get->email }}</h2>
@endforeach
@endsection