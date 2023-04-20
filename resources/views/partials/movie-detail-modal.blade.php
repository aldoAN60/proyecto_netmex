<div class="modal fade" id="{{$movie['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-background">
                
                <h1 class="modal-title fs-5 titulos" id="exampleModalLabel">Netmex | {{$movie['original_title']}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body body-modal-background">
                <div class="cont-info"> 
                    <p class="parrafos">{{Str::limit($movie['release_date'], 4, '') }}<span>|</span></p>
                    <p class="parrafos">{{$movie['original_language']}}<span>|</span></p>
                        @foreach($movie['genre_ids'] as $genero)
                        <p class="parrafos"><a href="#"> {{ $generos->get($genero) }}@if (!$loop->last)&nbsp;<span style="font-weight: 900; line-height: 1em;">·</span>&nbsp;@endif </a></p>
                        @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <img src="{{'https://image.tmdb.org/t/p/w500'.$movie['backdrop_path'] }}" alt="{{ $movie['original_title'] }}" class="img-fluid">
                    </div>
                    <div class="col-md-6 modal-dialog-scrollable">
                        <p class="parrafos">{{ $movie['overview'] }}</p>                
                        <p class="parrafos">Calificación: {{round($movie['vote_average'] * 10).'%'  }}</p>
                        <h4 class="parrafos">Reparto:</h4>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-auto">
                        <div class="cont-credits">
                            @foreach($creditosPorPelicula[$movie['id']] as $actor)
                                <div class="cont-character">
                                    <p class="parrafos"><strong>Nombre:</strong> {{ $actor['nombre'] }}</p>
                                    @if ($actor['foto'])
                                        <img src="{{ $actor['foto'] }}" alt="{{ $actor['nombre'] }}">
                                    @endif
                                    <p class="parrafos"><strong>Personaje:</strong> {{ $actor['personaje'] }}</p>
                                    
                                </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            <div class="modal-footer modal-background">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success"><a href="{{route('peliculas.triller',$movie['id'])}}" style="color:#fff !important;">Reproducir</a></button>
            </div>
        </div>
    </div>
</div>