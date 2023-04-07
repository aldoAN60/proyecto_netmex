<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarteleraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

            //dump($topSemanales);
        
        return view('catalogo', [
            'topSemanales' => $topSemanales,
            'generos' => $generos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
