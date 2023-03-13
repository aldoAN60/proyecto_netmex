@extends('layouts.HTML-guest')
@section('title','contacto')

@section('content')

<div class="col-12">
    <div class="cont-form">
        <h1 class="titulos">Nos gustaria escucharte</h1>
        <p class="parrafos">tu retroalimentacion nos ayuda a mejorar nuestro servicio</p>
        <main  class="contact-form">
            <form method="POST" action="{{ route('contacto') }}">
                @csrf        
                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="nombre">
                @error('nombre')
                    <p class="error-message">{{$message}}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="subject_body" class="form-label"><p class="parrafos" style="margin-bottom: 0px">ya tengo cuenta</p></label>
                    <input type="checkbox" name="check" id="count-enable" onclick="activar()">
                    <input style="display:none;" name="n_subscriptor" class="form-control" value="{{ old('n_subscriptor')}}" id="n_sub"   type="number" placeholder="ingresa tu numero de subscriptor">
                    @error('n_subscriptor')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="correo electronico">
                    @error('email')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input name="asunto" type="text" class="form-control" value="{{ old('asunto') }}" placeholder="asunto">
                    @error('asunto')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea  name="descripcion" class="form-control" value="{{ old('descripcion') }}" placeholder="descipción"></textarea>
                    @error('descripcion')
                        <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-success">enviar</button>
            </form>
        </main>
        <p class="parrafos"> @if (session('status'))
            {{ session('status') }}
            @endif </p>
    </div>
</div> 
@endsection

    