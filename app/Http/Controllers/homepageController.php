<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    /*
     * @description: retorna la vista inicio 
     * @author: Aldo Armenta 29/03/2023
     * @param: view: inicio 
     * * 
    */
    public function index()
    {
        return view('inicio');
    }
    /*
     * @description: validar email y enviar a la vista de inicio de sesion
     * @author: Aldo Armenta 29/03/2023
     * @param: Request: email a validar 
     * * 
    */
    public function sign_up_email(Request $request){
        $request->validate([
            'start_email'=> 'required|email',
        ]
        ,
        [
            'start_email.email'=>'es necesario agregar un correo electronico valido',
            'start_email.required'=>'es necesario agregar un correo electronico'
        ]);
        $email_RS = $request->input('start_email');
        $status='ya solo quedan pocos pasos';
        return redirect('/sign_up')->with(compact('status','email_RS')); 
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
