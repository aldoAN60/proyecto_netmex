@extends('layouts.catalogoLYT')
@section('title','catalogo')
@section('css-style')
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.12/video.js"></script>
<link rel="stylesheet" href="/css/catalogo.css">
@endsection
@section('content')
<nav class="cont-carrusel">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <nav class="flexbox-img" style="background-image: url({{'https://image.tmdb.org/t/p/w1280'.$laMejor['backdrop_path'] }});">
                    <nav class="flexbox-titles">
                        <h2 class="titulos visible-shadow">{{$laMejor['original_title']}}</h2>
                        <h4 class="titulos visible-shadow"> más recomendada</h4>
                        <nav class="descripcion">
                            <p class="parrafos P-small visible-shadow"> {{$laMejor['overview']}}</p>
                        </nav>
                        <button type="button" class="btn btn-light ">
                            <svg width="30" height="30" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                <path d="m10 8 6 4-6 4V8z"></path>
                            </svg>
                            <span class="rec-btn txt-bold"><a href="{{route('peliculas.triller',$laMejor['id'])}}" style="color:#000 !important;">Reproducir</a></span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg width="30" height="30" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                            <span class="rec-btn txt-bold">Mas información</span> 
                        </button>
                        @include('partials.movie-info-modal')  
                    </nav>
                </nav>
            </div>
            
            @foreach ($popularMovies as $movie)
            <div class="carousel-item">
                <nav class="flexbox-img" style="background-image: url({{'https://image.tmdb.org/t/p/w1280'.$movie['backdrop_path'] }});">
                    <nav class="flexbox-titles">
                        <h2 class="titulos visible-shadow">{{$movie['title']}}</h2>
                        <nav class="descripcion">
                            <p class="parrafos P-small visible-shadow">{{$movie['overview']}}</p>
                        </nav>
                        <button type="button" class="btn btn-light ">
                            <svg width="30" height="30" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                <path d="m10 8 6 4-6 4V8z"></path>
                            </svg>
                            <span class="rec-btn txt-bold"><a href="{{route('peliculas.triller',$movie['id'])}}" style="color:#000 !important;">Reproducir</a></span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#{{$movie['id']}}">
                            <svg width="30" height="30" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                            <span class="rec-btn txt-bold">Mas información</span> 
                        </button>
                        
    @include('partials.movie-detail-modal') 
                    </nav>
                </nav>
            </div>
            @endforeach
            
        </div>        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> 
    
</nav>


<!-- CONTENEDOR DE TOP SEMANAL -->
<div class="container-fluid text-center">
    <div class="row">
        <div class="col">
            <div class="container-fluid" id="chido">
                <?php
                /**
                * @description: Mostramos las películas, replicando el código por cada registro ($$topSemanal) 
                * @author: Alfredo Serrano - 28/03/23
                * @param json: Película a mostrar
                **/
                ?>
                <!-- POR CADA REGISTRO -->
                @foreach ($topSemanales as $topSemanal)
                <!-- DIV CONTENEDOR DE LA PELÍCULA -->
                <div class="card mb-3" style="width: 250px; height: 375px; margin: 10px; float: left; background: none;">
                    <!-- ETIQUETA <a> QUE ACTIVA MODAL -->
                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $topSemanal['id'] }}" style="cursor: pointer;">
                        <!-- ETIQUETA <img> LA CUAL, MUESTRA LA PORTADA -->
                        <img class="card-img-top" src="{{ 'https://image.tmdb.org/t/p/w500'.$topSemanal['poster_path'] }}">
                    </a>
                </div>
                <!-- ETIQUETA MODAL CONTENEDORA -->
                <div class="modal fade" id="staticBackdrop{{ $topSemanal['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <!-- CON ESTE DIV, CON SU CLASE, DEFINIMOS EL TAMAÑO DE NUESTRO MODAL -->
                    <div class="modal-dialog modal-lg">
                    <!-- AQUÍ INICIA EL CONTENIDO DE NUESTRO MODAL (HEAD, BODY, FOOTER) -->
                        <div class="modal-content">
                            <!-- HEAD DEL MODAL -->
                            <div class="modal-header" style="color: #FFFFFF; background: #0F0F0F;">
                                <!-- TÍTULO DEL MODAL -->
                                <!-- 
                                -   CON IF VALIDAMOS SI EL VALOR DE 'media_type' ES IGUAL A TV, DE SER ASÍ, EL CAMPO A MOSTRAR 
                                -   EN EL TÍTULO DEL MODAL ES name SI NO ES TV, ENTONCES ES movie.
                                -   DE ESTA MANERA MOSTRAREMOS SIN ERRORES EL NOMBRE DE LA SERIE O DE LA PELÍCULA
                                -->
                                <h1 class="modal-title fs-5" id="staticBackdropLabel"> @if ($topSemanal['media_type'] == "tv") {{ $topSemanal['name'] }} @else {{ $topSemanal['title'] }} @endif | NETMEX </h1>
                                <!-- BOTÓN CERRAR DEL MODAL -->
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- ESTE ES EL BODY DE NUESTRO MODAL -->
                            <div class="modal-body" style="background: #038c5a; font: condensed 120% sans-serif; font-size: 15pt; color: #FFFFFF;">
                            <!-- CREAMOS UN DIV CON CLASE CONTAINER PARA TENER UN MANEJO AMPLIO DEL CONTENIDO -->
                                <div class="container" style="width:60%; float: left;">
                                <!-- ETIQUETA VÍDEO QUE MUESTRA EL TRAILER LA PELÍCULA -->
                                    <video id="video" class="video-js vjs-default-skin" style="margin-bottom: 15px;" controls preload="none" width="444" height="250" poster="{{ 'https://image.tmdb.org/t/p/w500'.$topSemanal['backdrop_path'] }}"  data-setup="{}">
                                        <source src="/videos/conoce2motolika.mp4" type='video/mp4'>
                                        <p class="vjs-no-js">Para ver este vídeo debes habilitar JavaScript <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                    <!-- CON ESTO TENEMOS UN MARGIN TOP -->
                                    <div class="mt-2">
                                        <!-- OTRO CONTENEDOR QUE DA ESTILO A LOS METADATOS -->
                                        <div class="contenedorInfo">
                                            <!-- CON CSS CREAMOS UNA ESTRELLA, PARA ESO USAMOS EL DIV -->
                                            <div class="estrella text-warning w-4"></div>
                                            <!-- EN ESTA MOSTRAOS LA PUNTUACIÓN DE LA PELÍCULA -->
                                            <span class="ml-1 spanMas">{{ round($topSemanal['vote_average'] * 10) .'%' }}</span>
                                            <!-- ESTE SÍMBOLO AYUDARÁ A SEPARAR LA CALIFICACIÓN DE LOS GÉNEROS DE LA PELÍCULA -->
                                            <span class="spanMas spanPlus">| &nbsp;</span>
                                            <!-- CON ESTE SPAN, MOSTRAMOS NUESTOS GENEROS -->
                                            <span class="spanMas spanPlusPlus">
                                                <ul>
                                                    <?php   
                                                    /**
                                                    * @description: Imprimimos en pantalla, en la etiqueta li la fecha de estreno de cada película o fecha de transmisión 
                                                    * @author: Alfredo Serrano - 11/04/23
                                                    * @param json: id de genero
                                                    **/
                                                    ?>
                                                    <li> @if ($topSemanal['media_type'] == "tv") {{ Str::limit($topSemanal['first_air_date'], 4, '') }} @else {{ Str::limit($topSemanal['release_date'], 4, '') }} @endif<span style="font-weight: 900; line-height: 1em;">·</span>&nbsp;</li>
                                                    <li style="margin-left: 0px;"> {{ strtoupper($topSemanal['original_language']) }} </li>
                                                </ul>
                                            </span>
                                            <i class="bi bi-film" style="font-size: 18px;"></i>
                                            <span class="float-end">
                                                <ul style="padding-left: 4px;">
                                                    <?php   
                                                    /**
                                                    * @description: Imprimimos en pantalla, en la etiqueta li los generos de cada película  
                                                    * @author: Alfredo Serrano - 28/03/23
                                                    * @param json: id de genero
                                                    **/
                                                    ?>
                                                    @foreach($topSemanal['genre_ids'] as $genero)
                                                        <li><a href="#"> {{ $generos->get($genero) }}@if (!$loop->last)&nbsp;<span style="font-weight: 900; line-height: 1em;">·</span>&nbsp;@endif </a></li>
                                                    @endforeach
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- CON ESTE CONTENEDOR MOSTRAMOS LA DESCRIPCIÓN DE NUESTRA PELÍCULA (SIPNÓSIS) -->
                                <div class="container" style="width:40%; float: left;">
                                    {{ $topSemanal['overview']}}
                                </div>
                            </div>
                            <!-- FOOTER DEL MODAL, CONTIENE UN BOTÓN PARA CERRAR EL MODAL Y OTRO PARA IR DIRECTO A LA PELÍCULA -->
                            <div class="modal-footer" style="background: #038c5a; --bs-modal-footer-border-color: #038c5a;">
                                <a type="button" href="" class="btn btn-secondary" data-bs-dismiss="modal" style="background: #000000; --bs-btn-border-color: #000000;">Cerrar</a>
                                <a type="button" href="{{ route('catalogo.show', $topSemanal['id']) }}"  class="btn btn-primary" style="background: #0b593c; --bs-btn-border-color: #0b593c; --bs-btn-hover-border-color: #565e64; width: 128px;">Wachar       <i class="fa fa-play" style="font-size:14px"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection        
</div>

