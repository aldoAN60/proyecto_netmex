@extends('layouts.HTML-guest')

@section('title','Mi cuenta')

@section('content')
<div class="container" style="color:black;">

        <div class="row justify-content-center">
    
            <div class="col-md-0">
    
    
    
    
                <div class="card">
    
                    <div class="card-header">{{ __('Actualizar Datos') }}</div>
    
                    <div class="card-body">
    
                        <div class="container">
    
                            <div class="content padre">
    
                                <div class="slider hijo" id="slider">
    
                                    {{-- <img class="imagenPerfil" src="/img/moduloPerfil.jpg"> --}}
    
                                </div>
    
                                <div class="vertical-line"></div>
    
                                <div class="formulario hijo">
    
    
    
    
    
                                    <form method="POST" action="{{ route('perfil.update', Auth::user()->id) }}"
    
                                        enctype="multipart/form-data">
    
                                        @csrf
    
    
    
    
                                        <center class="">
    
                                            <img style="width: 200px;  clip-path: ellipse(50% 40% at 50% 50%); border-radius:100px 100px;"
    
                                                @if (Auth::user()->imguser != 'NULL') src="{{ asset('storage/profile_pictures/' . Auth::user()->imguser) }}"
    
                                            @elseif (Auth::user()->imguser == 'NULL')
    
                                                src="img/slider7.jpg" @endif
    
                                                alt={{ Auth::user()->imguser }}>
    
                                        </center>
    
    
    
    
                                        <div class="row mb-3">
    
                                            <label for="profile_picture"
    
                                                class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>
    
    
    
    
                                            {{-- aquí esta el input para agregar la imagen  --}}
    
                                            <div class="col-md-6">
    
                                                <input id="img" type="file" accept="image/*"
    
                                                    class="form-control @error('profile_picture') is-invalid @enderror"
    
                                                    name="profile_picture" value="{{ Auth::user()->imguser }}">
    
                                            </div>
    
                                        </div>
    
    
    
    
                                        <div class="row mb-3">
    
                                            <label for="name"
    
                                                class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
    
    
    
    
                                            <div class="col-md-6">
    
                                                <input id="name" type="text"
    
                                                    class="form-control @error('name') is-invalid @enderror"
    
                                                    name="name" value="{{ Auth::user()->name }}" required
    
                                                    autocomplete="name" autofocus>
    
                                            </div>
    
                                        </div>
    
    
    
    
                                        <div class="row mb-3">
    
                                            <label for="email"
    
                                                class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
    
    
    
    
                                            <div class="col-md-6">
    
                                                <input id="email" type="email"
    
                                                    class="form-control @error('email') is-invalid @enderror"
    
                                                    name="email" value="{{ Auth::user()->email }}" required
    
                                                    autocomplete="email">
    
                                            </div>
    
                                        </div>
    
    
    
    
                                       
    
    
    
    
                                        <div class="row mb-3">
    
                                            <label for="password_actual"
    
                                                class="col-md-4 col-form-label text-md-end">{{ __('Contraseña Actual') }}</label>
    
    
    
    
                                            <div class="col-md-6">
    
                                                <input id="password" type="" class="form-control"
    
                                                    name="password_actual" value="{{ Auth::user()->password }}" autocomplete="password_actual">
    
                                            </div>
    
                                        </div>
    
    
    
    
                                        <div class="row mb-3">
    
                                            <label for="contrasena"
    
                                                class="col-md-4 col-form-label text-md-end">{{ __('Nueva Contraseña') }}</label>
    
    
    
    
                                            <div class="col-md-6">
    
                                                <input id="contrasena" type="" class="form-control"
    
                                                    name="contrasena"  autocomplete="contrasena">
    
                                            </div>
    
                                        </div>
    
    
    
    
                                        <div class="row mb-3">
    
                                            <label for="confirmacion"
    
                                                class="col-md-4 col-form-label text-md-end">{{ __('Confirma Nueva Contraseña') }}</label>
    
    
    
    
                                            <div class="col-md-6">
    
                                                <input id="confirmacion" type="" class="form-control"
    
                                                    name="confimacion"  autocomplete="confirmacion">
    
                                            </div>
    
                                        </div>
    
    
    
    
    
                                        <div class="row mb-0">
    
                                            <div class="col-md-6 offset-md-4">
    
                                                <button type="submit" class="btn btn-primary">
    
                                                    {{ __('GUARDAR') }}
    
                                                </button>
    
                                            </div>
    
                                        </div>
    
                                    </form>
    
    
    
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    
    
    
    
         
    
    
    
    
    
    
    
    
    
    
    
    
    @endsection