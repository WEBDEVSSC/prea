<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Buscamos todos los registros de la base de datos
        $usuarios = User::all();

        // Retornamos la vista y mandamos los datos
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornamos la vista para el formulario
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $request->validate([
            'nombre'=>'required|string',
            'correo'=>'required|email|unique:users,email',
            'password'=>'required|string',
            'rPassword'=>'required|string|same:password',
            'categoria'=>'required|integer',
            'nivel'=>'required|integer',
            'clues'=>'required|string',
        ],[
            'rPassword.same'=>'Las contraseñas no coinciden',
            'correo.unique'=>'El correo ya se encuentra registrado',            
        ]);
        
        
        // Creamos una instancia del modelo
        $user = new User();

        // Asignamos los valores a los campos
        $user->name=$request->nombre;
        $user->email=$request->correo;
        $user->password=Hash::make($request->password);
        $user->categoria=$request->categoria;
        $user->nivel=$request->nivel;
        $user->clues=$request->clues;

        // Guardamos el registro
        $user->save();

        //Redireccionamos con el mensaje de exito
        return redirect()->route('usuarioIndex')->with('success', 'El usuario se registro correctamente'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
