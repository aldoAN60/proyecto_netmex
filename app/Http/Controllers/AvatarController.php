<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/perfil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        // Asigna los valores a las propiedades del usuario
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        
        /*Dentro de esta validación se verifica si el input con llamado "profile_picture"  
        no esta vacio entonces añade la imagen la imagen */
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $filename = time() . '.' . $profilePicture->getClientOriginalExtension();
            $profilePicture->storeAs('public/profile_pictures', $filename);
            $user->imguser = $filename;
        }
        // Guarda el usuario
        $user->save();

        return redirect()->back()->with('success', 'Usuario creado satisfactoriamente.');
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
         $user = User::findOrFail($id);
       // $user = Auth::user(); // Obtener el usuario autenticado actualmente

        // Asigna los valores a las propiedades del usuario
        $user->name = $request->name;
        $user->email = $request->email;

        // Actualiza la imagen de perfil si se proporciona una nueva
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $filename = time().'.'. $profilePicture->getClientOriginalExtension();
            $profilePicture->storeAs('public/profile_pictures', $filename);
            $user->imguser = $filename;
        }

        // Verificar si el campo contraseña actual tenga datos 
        if ($request->password_actual != "") {
            echo "Actualizado1";
            //valida si la contraseña actual es igual a la clave del usuario en session
            if (Hash::check($request->password_actual, $user->password)) {
                
                echo "Actualizado2";

                //valida si la contraseña nueva sea igual al campo de confirmación de contraseña 
                if ($request->contrasena == $request->confirmacion) {
                    //valida si la contraseña nueva sea mayor a 8 caracteres
                    echo "Actualizad3";
                    if (strlen($request->contrasena) > 8) {
                        //guarda en la columna contraseña lo que hay en el input contraseña encriptado
                        $user->password = Hash::make($request->input('contrasena'));
                        echo "Actualizado";
                    }
                }
            }
        }
        $user->save();
        return redirect()->back()->with('success', 'Usuario actualizado satisfactoriamente.');
        /*
         Verificar si se proporcionó una nueva contraseña
        if ($request->filled('password')) {
            //valida si la contraseña actual es igual a la clave del usuario en session
            if (Hash::check($request->password_actual, $user->password)) {
                if ($request->password == $request->confirm_password) {
                    if (strlen($request->password) > 8) {
                        $user->password = Hash::make($request->input('password'));
                    }
                }
            }
        }

        if ($request->filled('password')) {
        //     $user->password = Hash::make($request->input('password'));
        // }
        */
        // Guarda el usuario
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    }
}