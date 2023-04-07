<?php
    //IMPORTAMOS LIBRERÍAS
    //PARA PETICIÓN
    use Illuminate\Http\Request;
    //PARA PETICIONES HTTP (GET Y POST)
    use Illuminate\Support\Facades\Http;
?>

<!-- INICIA DOCUMENTO HTML -->
<!DOCTYPE html>
<!-- DEFINIMOS EL LENGUAJE DEL DOCUMENTO HTML EN ESPAÑOL -->
<html lang="es">
<!-- INICIA LA ETIQUETA HEAD (CONTIENE METADATOS Y ENLACES) -->
<head>

    <!-- LOS METADATOS QUE CONFIGURAN NUESTRO DOCUMENTO -->
    <!-- CÓDIFICACIÓN DE TEXTO -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- PARA LA VISUALIZACIÓN DEL DOCUMENTOS EN DISPOSITIVOS MÓVILES -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ENLACES PARA EL RECURSO DE BOOTSTRAP (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap-5.2.3-dist/css/bootstrap.min.css">

    <!-- ENLACES PARA EL RECURSO DE BOOTSTRAP (ARCHIVO DE CONFIGURACIÓN) -->
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">    

    <!-- ENLACES PARA EL RECURSO DE BOOTSTRAP (SCRIPTS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js">

    <!-- ENLACES PARA EL RECURSO DE CLOUDFIRE (FUENTES) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ENLACES PARA EL RECURSO DE CSS (PROPIAS DE SUNIVS) -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- ENLACES PARA EL RECURSO DE VIDEO.JS -->
    <link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/4.12/video.js"></script>

    <!-- ENLACE PARA TAILWINDCSS -->
    <!-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> -->


    <style type="text/css">
        .vjs-default-skin {
            /* Añadir tu personalización aquí */
            background-color: #f7f7f7;
            color: #333;
            font-family: 'Helvetica Neue', sans-serif;
        }
        .vjs-default-skin .vjs-big-play-button { 
            font-size: 2em; 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .vjs-default-skin .vjs-control-bar {
            /* Añadir tu personalización aquí */
            background-color: #333;
            font-family: 'Helvetica Neue', sans-serif;
            color: #FFFFFF;
        }

        .vjs-default-skin .vjs-play-progress {
            /* Añadir tu personalización aquí */
            background-color: #000000;
        }

        .vjs-default-skin .vjs-volume-level {
            background-color: #000000;
        }

        .vjs-default-skin .vjs-progress-control .vjs-play-progress:before {
            background-image: url(icons/nuevo-icono.png);
        }
        
        .contenedorInfo {
            position: relative;
            display: inline-block;
        }

        .estrella:before {
            content: "\2605";
            font-size: 25px;
            color: #f0ad4e;
            display: inline-block;
        }

        .spanMas {
            position: absolute;
            top: 7.5px;
            left: 25px; /* ajusta esta propiedad para posicionar el span */
        }

        .spanPlus {
            top: 6px;
            left: 60px;
        }

        .spanPlusPlus {
            top: 8px;
            left: 30px;
        }
        
        .spanPlusPlus li {
            float: left;
            display: block;
            text-decoration: none;
            margin-left: 4px;
        }
    </style>

    <title>Catálgo</title>
</head>
<!-- TERMINA ETIQUETA HEAD -->

<!-- INICIA ETIQUETA BODY (CONTIENE CARRUSEL, CATÁLOGO CONTENIDO TOP SEMANAL, MODAL)-->
<body>

    <div class="container">
        <header>
            <div class="row">
                <div class="col-sm-2" style="padding:0px">
                    <div class="icono">
                        LOGO
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cont_btns">
                        <button type="button" class="btn btn-primary" id="btn_paypal"><a href="" alt="">donacion por paypal</a></button>
                        <button type="button" class="btn" id="btn_login"><a href="">iniciar sesion</a></button>
                    </div>
                </div>
            </div>
        </header>

        <!-- INICIA CARRUSEL -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade pointer-event" data-bs-ride="carousel">

        <!-- CONTENEDOR CARRUSEL -->
            <div class="carousel-inner">
                <!-- DECLARAMOS UNA PORTADA -->
                <div class="carousel-item active">
                    <img src="/img/imgPruebas/ironMan.jpg" alt="Iron Man 3" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">
                </div>
                <!--
                <div class="carousel-item">
                    <img src="/img/imgPruebas/hP.jpg" alt="Harry Potter" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">
                </div>
                <div class="carousel-item">
                    <img src="/img/imgPruebas/tbs.jpg" alt="Sepa, ahí dice, pero que hueva revisar. xd" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">
                </div>
                -->
                <!-- MOSTRAMOS TODAS Y CADA UNA DE LAS PORTADAS DE LAS PELÍCULAS -->
                @foreach ($topSemanales as $topSemanal)
                <div class="carousel-item">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500'.$topSemanal['backdrop_path'] }}" alt="@if ($topSemanal['media_type'] == 'tv') {{ $topSemanal['name'] }} @else {{ $topSemanal['title'] }} @endif" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>@if ($topSemanal['media_type'] == 'tv') {{ $topSemanal['name'] }} @else {{ $topSemanal['title'] }} @endif</h5>
                        
                    </div>
                </div>
                @endforeach
            </div>

        <!-- FLECHA IZQUIERDA CARRUSEL -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <!-- FLECHA DERECHA CARRUSEL -->
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--
    Button trigger modal 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
    </button>
    -->

    <!-- Modal 
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
        </div>
    </div>
    -->

    <!-- CONTENEDOR DE TOP SEMANAL -->
    <div class="container-fluid" id="chido">
        @foreach ($topSemanales as $topSemanal)
            <div class="card mb-3" style="width: 250px; height: 375px; margin: 10px; float: left; background: none;">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $topSemanal['id'] }}" style="cursor: pointer;">
                    <img class="card-img-top" src="{{ 'https://image.tmdb.org/t/p/w500'.$topSemanal['poster_path'] }}">
                </a>
            </div>

            <div class="modal fade" id="staticBackdrop{{ $topSemanal['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="color: #FFFFFF; background: #0F0F0F;">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> @if ($topSemanal['media_type'] == "tv") {{ $topSemanal['name'] }} @else {{ $topSemanal['title'] }} @endif | NETMEX </h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="background: #038c5a; font: condensed 120% sans-serif; font-size: 15pt;">
                            <div class="container" style="width:60%; float: left;">
                                <video id="video" class="video-js vjs-default-skin" style="margin-bottom: 15px;" controls preload="none" width="444" height="250" poster="{{ 'https://image.tmdb.org/t/p/w500'.$topSemanal['backdrop_path'] }}"  data-setup="{}">
                                    <source src="/videos/conoce2motolika.mp4" type='video/mp4'>
                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                </video>
                                <div class="mt-2">
                                    <div class="contenedorInfo">
                                        <div class="estrella text-warning w-4"></div>
                                        <span class="ml-1 spanMas">{{ round($topSemanal['vote_average'] * 10) .'%' }}</span>
                                        <span class="spanMas spanPlus" >|</span>
                                        <span class="spanMas spanPlusPlus">
                                            <ul>
                                            @foreach($topSemanal['genre_ids'] as $genero)
                                                <li>{{ $generos->get($genero) }}@if(!$loop->last), @endif</li>
                                            @endforeach
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="container" style="width:40%; float: left;">
                                {{ $topSemanal['overview']}}
                            </div>
                        </div>
                        <div class="modal-footer" style="background: #038c5a; --bs-modal-footer-border-color: #038c5a;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: #000000; --bs-btn-border-color: #000000;">Cerrar</button>
                            <button type="button" class="btn btn-primary" style="background: #0b593c; --bs-btn-border-color: #0b593c; --bs-btn-hover-border-color: #565e64; width: 128px;">Wachar       <i class="fa fa-play" style="font-size:14px"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <footer class="main_footer">
        <h4 class="titulos">Preguntas? llama al 477 166 2121</h4>
        <ul>
            <li><a  href="http://">contactanos</a></li>
            <li><a  href="http://">privacidad</a></li>
            <li><a  href="http://">terminos de uso</a></li>
            <li><a  href="http://">cuenta</a></li>
        </ul>
    </footer>
</body>
</html>