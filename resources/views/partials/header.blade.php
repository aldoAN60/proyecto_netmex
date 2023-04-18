<div id="app">
  <nav class="navbar navbar-expand-sm navbar-dark" >
    <a class="navbar-brand" href="{{route('inicio')}}" style="margin-top:-20%;"><img src="{{asset('img/logo/nm.png')}}" style="width: 80px;  " alt=""></a>
    <ul class="navbar-nav" >
      <li class="nav-item" >
        <a class="nav-link {{Active('inicio')}}" href="{{route('inicio')}}" >Inicio</a>
      </li>
      @auth
      <li class="nav-item" >
        <a class="nav-link {{Active('paypal-donation')}}" href="{{route('paypal-donation')}}" >donacion</a>
      </li>    
      @endauth
      
      <li class="nav-item" >
        <a class="nav-link {{ Active('contacto') }}"href="{{route('contacto')}}"  >Contacto</a>
      </li>
      @auth
      <li class="nav-item" >
        <a class="nav-link {{ Active('catalogo') }}" href="{{route('catalogo.index')}}" >catalogo</a>
      </li >
      @endauth
      @guest
      @if (Route::has('login'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}" style="margin-top:-17%; " data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
          <i class="bi bi-person-circle" style="font-size: 35px;"></i>
          <p style="margin-top: -10%; "> {{ __('Login') }}</p> 
        </a>
      </li>
      @endif
      @if (Route::has('register'))
      <li class="nav-item" >
        <button class="btn btn-success" style="padding: 0%; height: 30px; width:70px; border-radius:15px; margin-top:0%;">
          <a class="nav-link" href="{{route('sign_up')}}" style="margin-left:-5%;width:73px;margin-top:-10%; "> 
            Sign up
          </a>
        </button>
      </li>
      @endif
      @else
      <li class="nav-item" >
        <a class="nav-link {{ Active('mi_cuenta') }}" href="{{route('mi_cuenta')}}" >Mi cuenta</a>
      </li >
      <li class="nav-item">
        <a class="nav-link avatar" href="{{route('mi_cuenta')}}"> 
          <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" alt="avatar" class="rounded-circle" style="font-size: 35px;">
          <p style="margin-top: -10%; "> {{ Auth::user()->name }}</p> 
        </a>
      </li>   
      <li class="nav-item" >
        <a class="nav-link" href="{{ route('inicio') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a> 
      </li>      
      @endguest
    </ul>
  </nav>
</div>
<form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none" >
@csrf
</form>{{-- modal para el inicio de session --}}
<div class="modal fade" style="margin-left:3%; " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style="background-color:#8383837c; ">
      <div class="card" style="width: 25rem;color: rgb(0, 0, 0);background-color: #8383837c;margin-right: auto; margin-left: auto; position:fixed; margin-top: 5%; box-shadow: 0 50px 50px 100px rgba(16, 107, 16, 0.336); ">
        <div class="modal-header" >
          <h1 class="modal-title fs-1 escritura" id="staticBackdropLabel" >Inicia Secion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-floating mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="floatingInput" placeholder="name@example.com" required autocomplete="email" autofocus>
              <label for="floatingInput">Email address</label>
              @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="form-floating">
              <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required autocomplete="current-password"> 
              <label for="floatingPassword">Password</label>
              <div id="emailHelp" class="form-text">Nunca compartas tu contraseña con nadie</div>
              @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
            </div>
            <div>
              <button type="submit" class="btn btn-success" style="margin-left:39%; ">{{ __('Iniciar')}}</button>
              @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a>
              @endif 
            </div>
        </form>
      </div>
    </div>
  </div>
</div>