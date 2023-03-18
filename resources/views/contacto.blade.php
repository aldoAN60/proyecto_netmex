@extends('layouts.app')

@section('title','Contacto')

@section('content')
<div class="contenido" >


<section class="jumbotron jumbotron-fluid">
    <div class="container" style="color:white;">
      <h1 class="display-4">Misión, Visión y Valores</h1>
      <p class="lead">En MiEmpresaCine, nos dedicamos a ofrecer experiencias únicas e inolvidables en la pantalla grande.</p>
    </div>
  </section>
  <div class="container" style="color:white;">
    <div class="row">
      <div class="col-md-4">
        <h2>Misión</h2>
        <p>Nuestra misión es proporcionar a nuestros clientes una experiencia de cine excepcional, a través de la selección cuidadosa de películas, la proyección de alta calidad y la atención al detalle en todas nuestras operaciones.</p>
      </div>
      <div class="col-md-4">
        <h2>Visión</h2>
        <p>Nuestra visión es ser líderes en la industria cinematográfica, ofreciendo siempre lo mejor en términos de calidad, innovación y servicio al cliente.</p>
      </div>
      <div class="col-md-4">
        <h2>Valores</h2>
        <ul>
          @foreach ($porte as $porteItem)
         <li> {{ $porteItem['title'] }}</li> 
          @endforeach
          </ul>
      </div>
    </div>
  </div>
  </div>
  <!--Esta linea valida el formilario como confiable-->
  @csrf
  <section class="redes">
    <span class="tooltip" >facebook </span>
    <span><a href="https://www.facebook.com/octavio.martinezgonzalez.737"><i class="fab fa-facebook-f" id="f" ></i></a></span>
    <span class="tooltip">Twitter</span>
    <span><i class="fab fa-twitter" id="t" ></i></span>    
    <span class="tooltip">Instagram</span>
    <span><i class="fab fa-instagram" id="i"></i></span>   
    <span class="tooltip">GitHub</span>
    <span><i class="fab fa-github" id="g"></i></span>    
    <span class="tooltip">YouTube</span>
    <span><a href="https://www.youtube.com/@octaviomartinezgonzalez1603/featured"><i class="fab fa-youtube" id="y"></i></a></span>

</section>
@endsection