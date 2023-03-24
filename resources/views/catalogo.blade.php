<?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap-5.2.3-dist/css/bootstrap.min.css">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js">

    <title>Catálogo</title>
</head>
<body class="p-3 m-0 border-0 bd-example">

    <div id="carouselExampleFade" class="carousel slide carousel-fade pointer-event" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!--
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text></svg>
                -->
                <img src="/img/imgPruebas/ironMan.jpg" alt="Iron Man 3" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">

            </div>
            <div class="carousel-item">
                <!--
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#666"></rect><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
                -->
                <img src="/img/imgPruebas/hP.jpg" alt="Harry Potter" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">
            </div>
            <div class="carousel-item">
                <!--
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
                -->
                <img src="/img/imgPruebas/tbs.jpg" alt="Sepa, ahí dice, pero que hueva revisar. xd" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <header>
    </header>

    <section>
    </section>

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


    <div class="container" id="chido">
        @foreach ($topSemanales as $topSemanal)
            <div class="card mb-3" style="width: 250px; height: 375px; margin: 10px; float: left;">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $topSemanal['id'] }}">
                    <img class="card-img-top" src="{{ 'https://image.tmdb.org/t/p/w500'.$topSemanal['poster_path'] }}">
                </a>
            </div>

            <div class="modal fade" id="staticBackdrop{{ $topSemanal['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"> @if ($topSemanal['media_type'] == "tv") {{ $topSemanal['name'] }} @else {{ $topSemanal['title'] }} @endif | Ficha de la película </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $topSemanal['overview']}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Comprar</button>
                    </div>
                    </div>
                </div>
    </div>
        @endforeach
    </div>
</body>

<!-- <script src="https://gist.github.com/fredyfx/f3cfb8de0edc80a3946606fb8d31046d.js"></script>
<script>
    const header = document.querySelector('header');
    const section = document.querySelector('section');
    const contenedor = document.querySelector('#chido');
    const contenedorModal = document.querySelector('#modalin');
    
    //Declaramos nuestra peticion para consulta de api donde está el JSON
    const requestURL = 'https://api.themoviedb.org/3/trending/all/week?api_key=dd974a88eac4b6306518cfba28e6e350'
    //Declaramos un objeto para hacer la solicitud
    const request = new XMLHttpRequest();

    //Para definir que tipo de solicitud queremos, utilizamos el método open
    //pasando como primer parametro el tipo GET en este caso, como segundo
    //parametro será el enlace de nuestro JSON
    request.open('GET', requestURL);

    // ¡! POR CUESTIONES DEL TUTORIAL, ESTO SE REEMPLAZÓ !!
    // ¡! SIN EMBARGO, LO DEJARÉ AQUÍ, PORQUE TAMBIÉN ES POSIBLE USAR ESA PROPIEDAD ¡!

    //-------------------------------------------
    //Indicamos que la respuesta es de tipo JSON |
    //------------------------------------------

    request.responseType = 'text';

    //Enviamos nuestra solicitud mediante el método send
    request.send();

    //Al cargar nuestra solicitud...
    request.onload = function() {

        //declaramos la variable películas qué almacenará la solicitud del JSON (así es como lo entiendo, pero en serio que no entiedo la docuemntación de esto)
        const peliculasText = request.response;
        const peliculasJson = JSON.parse(peliculasText);

        //llamamos a las funciones para cargar al iniciar
        //topSemanal(peliculasJson);
        //peliculas(peliculasJson);
        
        //peliculasModal(peliculasJson);
    }

    function topSemanal(jsonObj) {
        const pelis = jsonObj['results'];

        alert(pelis[0].media_type);

        if (pelis[0].media_type === 'tv') {
            const tTitulo = document.createElement('h2');
            const tSipnosis = document.createElement('p');
            
            tTitulo.textContent = pelis[0].name; //SERIES    
            tSipnosis.textContent = 'Sipnósis serie: ' +  pelis[0].overview;

            header.appendChild(tTitulo);
            header.appendChild(tSipnosis);
        } else {                                                           
            const tTitulo = document.createElement('h2');
            const tSipnosis = document.createElement('p');
            
            tTitulo.textContent = pelis[0].title; //PELÍCULAS
            tSipnosis.textContent = 'Sipnósis película: ' +  pelis[0].overview;

            header.appendChild(tTitulo);
            header.appendChild(tSipnosis);
        }
    }
    /**FALTA PROBRAR EXHAUSTIVAMENTE */

    function amonos() {
        const pelis = jsonObj['results'];

        for (var i = 0; i < pelis.length; i++) {

            if (pelis[i].media_type === 'tv') {
                
                alert(pelis[i].name);
            }
            else{
                
                alert(pelis[i].title);
            }
        }
    }

    function peliculas(jsonObj) {
        const pelis = jsonObj['results'];

        for (var i = 0; i < pelis.length; i++) {

            const contenedores = document.createElement('div');
            contenedores.className = 'card mb-3';
            contenedores.style.width = '250px';
            contenedores.style.height = '375px';
            contenedores.style.margin = '10px';
            contenedores.style.float = 'left';

            const direcciona = document.createElement('a');
            direcciona.setAttribute('id', 'clicModal');
            
            const imgRsc = document.createElement('img');
            imgRsc.className = 'card-img-top';
            imgRsc.src = 'https://image.tmdb.org/t/p/w500' + pelis[i].poster_path;
            
            const pelicula = document.createElement('div');
            pelicula.className = 'card-body';

            const titulo = document.createElement('h5');
            titulo.className = 'card-title';

            const sipnosis = document.createElement('p');
            sipnosis.className = 'card-text';

            //usamos la función con la propiedad textContent
            //la cual pienso que es para inyectar directamente el texto
            //que contendrá la etiqueta "article" y "p", respectivamente
            if (pelis[i].media_type === 'tv') {
                titulo.textContent = pelis[i].name;
            }
            else{
                titulo.textContent = pelis[i].title;
            }
            //el valor que asignamos proviene de nuestra variable 
            sipnosis.textContent = pelis[i].overview;

            direcciona.appendChild(imgRsc);
           
            //Mostramos nuestro contenido
            contenedores.appendChild(direcciona);
            //contenedores.appendChild(pelicula);
            //pelicula.appendChild(titulo);
            //pelicula.appendChild(sipnosis);

            contenedor.appendChild(contenedores);

            section.appendChild(contenedor);
        }
    }

    const peliculasModal = document.getElementById('clicModal');

    peliculasModal.addEventListener('click', function(event) {
        //const pelis = jsonObj['results'];

        //for(var i = 0; i < pelis.length; i++) {
            const modalDialogD = document.createElement('div');
            modalDialogD.className = 'modal-dialog';

            const modalContentD = document.createElement('div');
            modalContentD.className = 'modal-content';

            const modalHeaderD = document.createElement('div');
            modalHeaderD.className = 'modal-header';

            const modalTitleD = document.createElement('h1');
            modalTitleD.className = 'modal-title fs-5'
            //modalTitleD.textContent = pelis[i].title;
            modalTitleD.textContent = event.titulo;

            const modalBtnCloseD = document.createElement('button'); 
            modalBtnCloseD.type = 'button';
            modalBtnCloseD.className = 'btn-close';

            const modalBodyD = document.createElement('div');
            modalBodyD.className = 'modal-body';

            const modalSipnosisD = document.createElement('p');
            //modalSipnosisD.textContent = pelis[i].overview;
            modalSipnosisD.className = 'fst-normal';
            modalSipnosisD.textContent = event.sipnosis;

            const modalFooterD = document.createElement('div');
            modalFooterD.className = 'modal-footer';

            const modalBtnCerrarD = document.createElement('button');
            modalBtnCerrarD.type = 'button';
            modalBtnCerrarD.className = 'btn btn-secondary';
            modalBtnCerrarD.textContent = 'Cerrar';

            const modalBtnVerD = document.createElement('button');
            modalBtnVerD.type = 'button';
            modalBtnVerD.className = 'btn btn-primary';
            modalBtnVerD.textContent = 'Wachar';
        

            //contenedores.appendChild(modalDialogD);
            modalDialogD.appendChild(modalContentD);
            modalContentD.appendChild(modalHeaderD);
            modalContentD.appendChild(modalBodyD);
            modalContentD.appendChild(modalFooterD);
            
            modalHeaderD.appendChild(modalTitleD);
            modalHeaderD.appendChild(modalBtnCloseD);

            modalBodyD.appendChild(modalSipnosisD);
            
            modalFooterD.appendChild(modalBtnCerrarD);

            modalFooterD.appendChild(modalBtnVerD);

            contenedorModal.appendChild(modalDialogD);
            section.appendChild(contenedorModal);
        
        //}
    });

    peliculasModal.dispatchEvent(miEvento);

</script>
-->
</html>