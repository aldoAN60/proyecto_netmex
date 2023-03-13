@extends('layouts.HTML-guest')
    @section('title','subscripcion')
        
@section('content')
    
<main class="cont-form">
    <div class="row">
        <div class="col">
            <div class="sign-up">
                <form  action="{{ route('sign_up.store')}}" method="POST">
                    @csrf
                    <h3 class="titulos"> Ingresa un correo electronico y una contraseña 
                            para empezar tu membresia</h3>
                    <p class="parrafos">solo unos pasos mas y listo! <br>
                    A nosotros tampoco nos gustan los trámites.
                    </p>
                    <div class="mb-4">
                        <input name="email" type="email" class="form-control" id="frm-email" placeholder="Email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-4">
                        <input name="password" type="password" class="form-control" id="frm-password" placeholder="contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn_subs">Siguiente</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection