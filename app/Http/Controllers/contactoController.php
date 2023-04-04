<?php

namespace App\Http\Controllers;

use App\Models\contacto_clientes;
use Illuminate\Http\Request;

class contactoController extends Controller
{
    /*
     * @description: retorna la vista contacto 
     * @author: Aldo Armenta 29/03/2023
     * @param: view: contacto 
     * * 
    */
    public function index()
    {
        return view('contacto');
    }

    public function create()
    {
        //
    }

        /*
     * @description: validar parametros de formulario de contacto
     * @author: Aldo Armenta 29/03/2023
     * @param: Request: insertar mensaje en BD
     * * 
    */
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


    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
