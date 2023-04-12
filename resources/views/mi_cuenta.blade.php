@extends('layouts.app')

@section('title','Mi cuenta')

@section('content')
<div class="contenido">
          
      
    <form method="POST" action="{{ route('avatar.store') }}" enctype="multipart/form-data">
                @csrf
            @foreach ($perfiles as $perfil)
            <div class="card mb-3" style=" max-width: 1500px;color:black; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <div class="row g-0" style="">
                <div class="col-md-4">
                    <img style="height: 500px;" src="{{$perfil->getUrl()}}" class="card-img" alt="">
                    <div class="input-group mb-3" style="
                        margin-top:-8.5%;
                        width: 80%;
                        bottom: 0;
                        font-size: 15px;
                        background: #2a703f58;
                        color: #fff;
                        text-align: center;
                        padding:0px;">
                        <label for="perfil">Cambiar imagen</label>
                        <input style="position: absolute;
                        display: block;
                        width: 100%;
                        opacity: 0;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        cursor: pointer;" type="file" name="perfil"   accept="image/*" >
                        <button style="
                        padding:0;
                        font-size:12px; 
                        width:100px; 
                        display:block;
                        margin-left:100%;
                        margin-top:-6.3%;
                        " class="btn btn-outline-success" ttype="submit"  id="button-addon2">Subir</button>
                    </div> 
            
                
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title"> {{Auth::user()->name}} Mi perfil</h5>
                    <p class="card-text">
                        <h2>Informacion de tu cuenta.</h2>
                    <ul class="list-group" >
                        <li class="list-group item">Nombre de usuario: {{Auth::user()->name}}</li>
                        <li class="list-group item">Correo electronico: {{Auth::user()->email}}</li>
                        <li class="list-group item" style="display: inline;">Contraseña: <input style="width: 200px;" type="password" value="{{Auth::user()->password}}" disabled> </li>
                        <li class="list-group item" >  
                            <div class="input-group mb-2">
                                <label for="avatar">Icono de perfil: </label>
                                <input type="file" name="avatar"   accept="image/*" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-success" type="submit"  id="button-addon2"  data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-custom-class="custom-tooltip"
        data-bs-title="This top tooltip is themed via CSS variables.">Cargar</button>
                            
                            </div> 
                        
                        </li>
                        
                    </ul>
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
    </form>



       
      @endforeach
    {{-- <img src="{{ Auth::user()->getFirstMedia('perfiles')->getUrl('thumb') }}"  >
     --}}
    


    

    
    

</div>
@endsection