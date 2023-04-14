<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $avatars = auth()->user()->getMedia('avatar');
    $perfiles =auth()->user()->getMedia('perfil');
       return view('mi_cuenta',compact('avatars'), compact('perfiles'));
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
        // @description validar existencia de imegen en bd y sustituir



        $user = auth()->user();

        $defaultPerfilUrl = 'https://thumbs.dreamstime.com/z/l%C3%ADnea-an%C3%B3nima-icono-del-avatar-hombre-ejemplo-vector-perfil-de-defecto-aislado-en-blanco-dise%C3%B1o-masculino-estilo-esquema-127784971.jpg';
        $defaultAvatarUrl = 'https://thumbs.dreamstime.com/z/l%C3%ADnea-an%C3%B3nima-icono-del-avatar-hombre-ejemplo-vector-perfil-de-defecto-aislado-en-blanco-dise%C3%B1o-masculino-estilo-esquema-127784971.jpg';
      
        if (isset($request['avatar'])) {
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
           
        } 
        if(!isset($request['avatar'])){
        $user->addMediaFromUrl($defaultAvatarUrl)->toMediaCollection('avatar');

        }

        if (isset($request['perfil'])) {
            $user->clearMediaCollection('perfil');

            $user->addMediaFromRequest('perfil')->toMediaCollection('perfil');
        }
        if (!isset($request['perfil'])) {
            $user->addMediaFromUrl($defaultPerfilUrl)->toMediaCollection('perfil');
        
        }
       
        return redirect()->back();
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
