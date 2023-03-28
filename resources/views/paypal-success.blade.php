@extends('layouts.HTML-guest')
@section('title','donacion exitosa')
@section('css-style')
<link rel="stylesheet" href="/css/paypal-success.css">
@endsection
@section('content')
    <main class="paypal-success">
        @if (session('status'))
        <h1 class="titulos">{{session('status')}}</h1>
    @endif
    <div class="row">
        <div class="col">
            <small class="parrafos">es hora de ver peliculas 🍿</small>
            <p class="parrafos">gracias por tu donacion, ahora puedes disfrutar de cientos de peliculas <br>
            aqui tienes algunas recomendaciones</p>
        </div>
    </div>
    </main>
    <section class="cont-recomendations">
        @foreach ($popularMovies as $movie)
        <div class="card text-bg-dark">
            <img src="{{'https://image.tmdb.org/t/p/w300/'.$movie['poster_path']}}" class="card-img" alt="..."> 
            <div class="card-img-overlay">
                <div class="view-movie-content">
                    <a href="{{route('inicio')}}" target="_blank">
                        <h5 class="card-title">{{$movie['title']}} </h5>
                        <p class="card-text">{{$movie['release_date']}}</p>
                        <p class="card-text"> Ver en netmex <svg width="20" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </p>
                    </a>

                    
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection