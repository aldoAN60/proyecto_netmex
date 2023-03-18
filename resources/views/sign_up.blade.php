@extends('layouts.app')
@section('title',"sign up")
@section('content')
<div class="contenido" >


        <div class="container-fluid text-center">
            
            <main class="cont-form">
                <div class="row">
                    <div class="col">
                        <div class="sign-up">
                            <form method="POST" action="{{ route('register') }}" >
                                @csrf
                                <h3 class="titulos"> Ingresa un correo electronico y una contraseña 
                                        para empezar tu membresia</h3>
                                <p class="parrafos">solo unos pasos mas y listo! <br>
                                A nosotros tampoco nos gustan los trámites.
                                </p>
                                
                                <div class="mb-4">
                                    <input id="name" type="text" class="frm form-control  @error('name') is-invalid @enderror"  name="name"  aria-describedby="emailHelp" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus>
                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input  id="email" type="email" class="frm form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email" aria-describedby="emailHelp" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                             </div>
                                <div class="mb-4">
                                    <input id="password"  type="password" class="frm form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                </div>
                                <div class="mb-4">
                                        <input id="password-confirm" type="password" class="frm form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-success" id="btn_subs">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>    
    </div>
        @endsection