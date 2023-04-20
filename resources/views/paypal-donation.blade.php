@extends('layouts.HTML-guest')

@section('title','paypal-donation')
@section('css-style')
<link rel="stylesheet" href="/css/paypal-section.css">
@endsection
@section('javascript')
<script src="/js/paypal.js"></script>
@endsection
@section('content')
<main class="paypal-sec">
    @if (session('status'))
        <h1>{{session('status')}}</h1>
    @endif
    <div class="row align-items-center">
        <div class="col-7">
            <div class="paypal-text">
                <h1 class="titulos">Apoyanos con tu donacion atravez de paypal</h1>
                <p class="parrafos" style="margin-top: 4rem;">
                    Nuestro sistema de subscripciones no es como otras paginas de streaming <br>
                    nuestro modelo de negocios consiste en realizar una donacion mensual <br>
                    atravez de paypal puede ser desde $10 mxn y con esto tendras acceso a <br>
                    toda nuestra galeria de peliculas y series.
                </p>
            </div>
        </div>
        <div class="col-4">
            <div class="paypal-don">
                <h2>¡Tu decides cuanto donar!</h2>
                <p>Tu donacion nos ayuda a mejorar el servicio de netmex</p>
                <form action="{{url('/paypal/pay')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-text">
                            <input name="check_5" class="form-check-input mt-1" id="choose_5" type="checkbox" value="5" onclick="selection(this)" >
                        </div>
                        <input name="amount_5" type="text" class="form-control" placeholder="$5" disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input name="check_10" class="form-check-input mt-1"id="choose_10" type="checkbox" value="10" onclick="selection(this)">
                        </div>
                        <input name="amount_10" type="text" class="form-control" placeholder="$10" disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input name="check_15" class="form-check-input mt-1"id="choose_15" type="checkbox" value="15" onclick="selection(this)">
                        </div>
                        <input type="text" class="form-control" placeholder="$15" disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" id="choose_any" name="check_any" type="checkbox" onclick="selection(this)">
                        </div>
                        <input type="number" id="any_amount" name="any_amount" class="form-control" placeholder="otra cantidad" value="{{old('any_amount')}}" disabled>
                        
                    </div>
                    @error('any_amount')
                        <p>{{$message}}</p>
                    @enderror
                    <div class="cont-pp-btn">
                        <button class="btn btn-success" id="paypal-button" disabled>donar</button> 
                    </div>
                </form>
            </div>
        </div>
        <div class="col-1">

        </div>
    </div>
</main>
@endsection
