@extends('layouts.HTML-guest')
@section('title','ERROR')


@section('content')
<main class="error-session" style="margin-top: 8rem; margin-bottom: 8.3rem;">
    <h1 class="h1 titulos">UPSS...</h1>
    <svg width="120" height="120" fill="none" stroke="#c20000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
        <path d="m4.93 4.93 14.14 14.14"></path>
    </svg>
    <h2 class="titulos">  parece que no puedes acceder</h2>
    <h3 class="titulos">Es necesario que inicies sesión o te registres</h3>    
</main>

@endsection