<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarteleraController extends Controller
{
    public function __construct()
    {
        //Son 5 funciones de 7, es mejor usar el método "except" que es lo contrario a "only"
        $this->middleware('auth')->only('show', 'index', 'mostrar_trillers');
        // $this->middleware('auth')->except('index', 'show');
    }

    public function __invoke(Request $request)
    {
        $peliculas = [
            ['title' => 'proyecto 1']
        ];
        
        return view('catalogo', ['peliculas' => $peliculas]);
    }

    public function index()
    {
        $topSemanales = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/all/week?api_key=dd974a88eac4b6306518cfba28e6e350&language=es')
            ->json()['results'];

        $generosArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=dd974a88eac4b6306518cfba28e6e350&language=es')
            ->json()['genres'];

        $generos = collect($generosArray)->mapWithKeys(function ($genero){
            return [$genero['id'] => $genero['name']];
        }); 
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?api_key=197b965cfaac7b58e372bf8aeb7acc3a&language=es-MX&page=1')
        ->json()['results'];

        $mejorCalificadas = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/top_rated?api_key=197b965cfaac7b58e372bf8aeb7acc3a&language=es-MX&page=1')
        ->json();
        $laMejor = $mejorCalificadas['results'][0];
            //dump($topSemanales);
            //dump($popularMovies);
        return view('catalogo', [
            'topSemanales' => $topSemanales,
            'generos' => $generos,
            'popularMovies'=> $popularMovies,
            'laMejor'=>$laMejor
        ]);
    }


    
    public function mostrar_trillers($id){
        $peliculas = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'/videos?api_key=197b965cfaac7b58e372bf8aeb7acc3a&language=es-US');
        $videos = collect($peliculas->json()['results']);

        $trillers = $videos->filter(function ($video) {
            return stripos($video['type'], 'trailer') !== false;
            });

            if ($trillers->isNotEmpty()) {
                $firstTriller = $trillers->first();
                $trillers = $firstTriller;
            } else {
                $trillers = null;
            }
        return view('peliculas',compact('trillers'));

           // dump($trillers);            
        
    }
    public function show($id)
    {
        
        $pelicula = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=dd974a88eac4b6306518cfba28e6e350&language=es')
            ->json();

        //dump($pelicula);

        return view('catalogo_show')->with('pelicula', $pelicula);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
