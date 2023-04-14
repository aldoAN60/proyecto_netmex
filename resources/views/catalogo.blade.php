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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

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
            margin-left: 4px;
            width: 53px;
        }

        span ul li a:hover {
            color: #F0F0F0;
            text-decoration: none;
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
                <?php
                /**
                * @description: Mostramos las películas en carrusel, replicando el código por cada registro ($topSemanal) 
                * @author: Alfredo Serrano - 28/03/23
                * @param json: Película a mostrar
                **/
                ?>
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
                                @if($topSemanal['id'] == "594767") <source src="/videos/shazam.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
                                @if($topSemanal['id'] == "76600") <source src="/videos/avatar.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
                                @if($topSemanal['id'] == "603692") <source src="/videos/jw4.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
                                @if($topSemanal['id'] == "502356") <source src="/videos/smb.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
                                @if($topSemanal['id'] == "677179") <source src="/videos/c3.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
                                @if($topSemanal['id'] == "640146") <source src="/videos/antman.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
                                @if($topSemanal['id'] == "315162") <source src="/videos/pib2.mp4" @else src="/videos/conoce2motolika.mp4" @endif type='video/mp4'>
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
                                        <i class="bi bi-film" style="font-size: 18px;"></i></i>
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
    @yield('content')

    <footer class="main_footer">
        <h4 class="titulos">Preguntas? llama al 477 166 2121</h4>
        <ul>
            <li><a  href="http://">contactanos</a></li>
            <li><a  href="http://">privacidad</a></li>
            <li><a  href="http://">terminos de uso</a></li>
            <li><a  href="http://">cuenta</a></li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>