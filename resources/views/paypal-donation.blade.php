@extends('layouts.HTML-guest')

@section('title','paypal-donation')
    
@section('content')
<main class="paypal-sec">
    <div class="row align-items-center">
        <div class="col-7">
            <div class="paypal-text">
                <h1 class="titulos">apoyanos con tu donacion atravez de paypal</h1>
                <p class="parrafos">
                    nuestro sistema de subscripciones no es como otras paginas de streaming <br>
                    nuestro modelo de negocios consiste en realizar una donacion mensual <br>
                    atravez de paypal puede ser desde $10 mxn y con esto tendras acceso a <br>
                    toda nuestra galeria de peliculas y series.
                </p>
            </div>
        </div>
        <div class="col-4">
            <div class="paypal-don">
                <h2>¡Tu decides cuanto donar!</h2>
                <p>tu donacion nos ayuda a mejorar el servicio de netmex</p>
                <form action="#">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input class="form-check-input mt-1" type="radio" value="5" aria-label="Radio button for following text input">
                        </div>
                        <input type="text" class="form-control" placeholder="$5"aria-label="Text input with radio button" disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input class="form-check-input mt-1" type="radio" value="10" aria-label="Radio button for following text input">
                        </div>
                        <input type="text" class="form-control" placeholder="$10"aria-label="Text input with radio button" disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="radio" value="15" aria-label="Radio button for following text input">
                        </div>
                        <input type="text" class="form-control" placeholder="$15"aria-label="Text input with radio button" disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="radio" aria-label="Radio button for following text input">
                        </div>
                        <input type="text" class="form-control" placeholder="otra cantidad"aria-label="Text input with radio button">
                    </div>
                    <div class="cont-pp-btn">
                    <button class="btn btn-success">aqui va un boton de paypal</button>
                
                    </div>
                </form>
            </div>
        </div>
        <div class="col-1">

        </div>
    </div>
</main>
@endsection
