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

<style type="text/css">
	/*
    * Estamos estableciendo la posición del botón en absoluto para que podamos moverlo en relación con su contenedor. 
    * Luego, estamos estableciendo la posición superior e izquierda del botón en un 50% cada una para que el botón esté
    * centrado horizontalmente y verticalmente en su contenedor. Finalmente, estamos aplicando una transformación 
    * CSS para mover el botón hacia atrás en un 50% de su propio ancho y altura, 
    * para que quede centrado perfectamente en el centro de su contenedor. 
    */
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
        background-color: #3B3B3B;
    }

    .vjs-default-skin .vjs-volume-level {
        background-color: #B3B3B3;
    }

	.contenedor-video {
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>

<div class="container-fluid">
	<div class="card contenedor-video">
		<div class="card-body">
			<h5 class="card-title">{{ $pelicula['title'] }}</h5>
			<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
			<video class="video-js vjs-default-skin vjs-big-play-button" style="margin-bottom: 15px;" controls preload="none" width="500" height="260" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
				<source src="/videos/conoce2motolika.mp4" type="video/mp4" />
				<img src="/img/cns.jpg" alt="Navegador qlo">
				El navegador no soporta el contenido multimedia
			</video>
		<!--	<a type="button" class="btn btn-primary" style="background: #0b593c; --bs-btn-border-color: #0b593c; --bs-btn-hover-border-color: #565e64; width: 128px;"><i class="fa fa-play" style="font-size:14px"></i>   VER AHORA</a>	-->
		</div>
	</div>
</div>
