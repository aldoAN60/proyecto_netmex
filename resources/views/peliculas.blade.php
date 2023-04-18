@extends('layouts.catalogoLYT')
@section('title','contacto')
@section('css-style')
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>
<link rel="stylesheet" href="/css/catalogo.css">
@endsection
@section('content')
@if ($trillers)
<h2 class="titulos">{{ $trillers['name'] }}</h2>
<iframe width="1345" height="480" src="https://www.youtube.com/embed/{{ $trillers['key'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@else
<h2>No se encontraron tráilers para esta película.</h2>
@endif
@endsection