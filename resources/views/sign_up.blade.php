@extends('layouts.HTML-guest')
@section('title','subscripcion')
@section('css-style')
<link rel="stylesheet" href="/css/subscripcion.css">
@endsection

@section('content')
    
<main class="cont-form">
    @if (session('status'))
    <h1 class="parrafos">{{session('status')}}</h1>
@endif
    <div class="row">
        <div class="col">
            <div class="sign-up">
                <form method="POST">
                    @csrf
                    <h3 class="titulos"> Ingresa un correo electronico y una contraseña 
                            para empezar tu membresia</h3>
                    <p class="parrafos">solo unos pasos mas y listo! <br>
                    A nosotros tampoco nos gustan los trámites.
                    </p>
                    <div class="mb-4">
                        @if (session('email_RS'))
                        <input name="email" type="email" class="form-control" id="frm-email" placeholder="Email" aria-describedby="emailHelp" value="{{session('email_RS')}}" required>
                        @endif
                    </div>
                    <div class="mb-4">
                        <input name="password" type="password" class="form-control" id="frm-password" placeholder="contraseña" required>
                    </div>
                    <button class="btn btn-primary" id="btn_subs">Siguiente</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
