@extends('layouts.app')
@section('title',"inicio")
@section('content')
<div class="contenido" >

<h1>NetMex</h1>

            <div class="row" id="cont-slo-imgs">
                <div class="col-sm-7">
                    <div class="slogan">
                        <h2 class="titulos">Tus peliculas favoritas en un mismo lugar</h2>
                        <h5 class="titulos">Disfruta donde quieras y cuando quieras</h5>
                        <p class="parrafos">¿Quieres ver Netmex ya? incresa tu email para crear una cuenta</p>
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="correo electronico" aria-label="Correo electronico" aria-describedby="button-addon2">
                            <button class="btn" type="button" id="btn_ini">Comenzar ></button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/movies/pelicula_1.jpg" class="img" alt="..."> <!-- nombre original de class "d-block w-100" -->
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="carrusel_img">
                                        <h3 class="titulos">El exorsista</h3>
                                        <p class="parrafos">una niña que esta bien creisi un cura va sacarle el chamuco a punta de vergazos y agua bendita</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/img/movies/pelicula_2.jpg" class="img" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="carrusel_img">
                                        <h3 class="titulos">Metropolis</h3>
                                        <p class="parrafos">no se no la he visto XD</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/img/movies/pelicula_3.jpg" class="img" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="carrusel_img">
                                        <h3 class="titulos">El jajas</h3>
                                        <p class="parrafos">un viejo loco que se la pasa riendo cuando esta nervioso o asustado mata a 3 weyes en el metro y se hace anarquista</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="jump_line">
            </div>
            
            <div class="row row-cols-2" id="cont_disp">
                <div class="col">
                    <div id="img_disp">
                        <img src="/img/device/devices.png" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="col">
                    <article id="text_disp" align="justify">
                        <h1 class="titulos">Cuando quieras donde quieras</h1>
                        <p class="parrafos">peliculas desde tu telefono, tablet y computadora.
                        Vive una experiencia unica con una amplia selección de titulos en HD.
                        Además, puedes ver  en cuatro pantallas en simultáneo para que nadie se quede afuera.</p>
                    </article>
                </div>
                <hr class="jump_line">
            </div>
            <div class="row">
                <div class="col">
                    <nav class="FQ">
                        <h1 class="display-2">Preguntas frecuentes</h1>
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#FQ_1" aria-expanded="false" aria-controls="FQ_1">
                                ¿Que es Netmex? <p>+</p>
                            </button>
                            <div class="collapse" id="FQ_1">
                                <div class="card card-body">
                                    <p  class="parrafos">Netmex es una plataforma 100% mexicana que busca brindar la mejor experiencia
                                        en el straming. <br>
                                        que en base a una donacion puedes disfrutar de todas las peliculas de nuestro catalogo
                                    </p>
                                </div>
                            </div>
                            <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#FQ_2" aria-expanded="false" aria-controls="FQ_2">
                                ¿Es bueno Netmex para los niños? <p>+</p>
                            </button>
                            <div class="collapse" id="FQ_2">
                                <div class="card card-body">
                                    <p  class="parrafos">La experiencia de Netflix para niños está incluida 
                                        en la membresía para que los padres tengan el control mientras los peques 
                                        disfrutan series y películas familiares en su propio espacio.</p>
                                </div>
                            </div>
                            <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#FQ_3" aria-expanded="false" aria-controls="FQ_3">
                                ¿Por que una donación en vez de pagar un plan? <p>+</p>
                            </button>
                            <div class="collapse" id="FQ_3">
                                <div class="card card-body">
                                    <p  class="parrafos">Netmex es una plataforma 100% mexicana que busca brindar la mejor
                                        en el straming. <br>
                                        que en base a una donación puedes disfrutar de todas las peliculas de nuestro catalogo
                                    </p>
                                </div>
                            </div>
                            <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#FQ_4" aria-expanded="false" aria-controls="FQ_4">
                                ¿Como puedo donar? <p>+</p>
                            </button>
                            <div class="collapse" id="FQ_4">
                                <div class="card card-body">
                                    <p  class="parrafos">Netmex es una plataforma 100% mexicana que busca brindar la mejor
                                        en el straming. <br>
                                        que en base a una donacion puedes disfrutar de todas las peliculas de nuestro catalogo
                                    </p>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <hr class="jump_line">
            </div>
        </div>
        
</div>
        
   @endsection