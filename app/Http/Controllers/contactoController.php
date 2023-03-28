<?php

namespace App\Http\Controllers;

use App\Models\contacto_clientes;
use Illuminate\Http\Request;

class contactoController extends Controller
{
    
    public function index()
    {
        return view('contacto');
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre'=>'required|max:50|min:2',
            'n_subscriptor'=> 'min:8',
            'email'=>'required|email',
            'asunto'=>'required|max:50|min:5',
            'descripcion'=>'required|min:10'
        ]);
        $data = new contacto_clientes;
        $data->nombre = $request->input('nombre');
        $data->n_subscriptor = $request->input('n_subscriptor');
        $data->email = $request->input('email');
        $data->asunto = $request->input('asunto');
        $data->descripcion = $request->input('descripcion');
        $data->save();
        return back()->with('status','Hemos recibimos su mensaje, por favor espere nuestra respuesta');
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
