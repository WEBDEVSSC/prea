<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
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
        // Consultamos todas las CLUES
        $clues = Unidad::orderBy('nombre', 'asc')->get();
        
        // Retornamos la vista para el formulario
        return view('usuario.create', compact('clues'));
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
            'cuasifalla' => 'nullable|boolean',
            'adverso' => 'nullable|boolean',
            'centinela' => 'nullable|boolean',
        ],[
            'rPassword.same'=>'Las contraseñas no coinciden',
            'correo.unique'=>'El correo ya se encuentra registrado', 
            'password.required'=>'Este campo es requerido',     
            'rPassword.required'=>'Este campo es requerido',     
        ]);

        //dd($request->cuasifalla);

        // Consultamos los datos de la CLUES
        $clues = Unidad::findOrFail($request->clues);

        // Creamos una instancia del modelo
        $user = new User();

        // Asignamos los valores a los campos
        $user->name=$request->nombre;
        $user->email=$request->correo;
        $user->password=Hash::make($request->password);
        $user->categoria=$request->categoria;
        $user->nivel=$request->nivel;
        $user->clues=$clues->clues;
        $user->clues_id=$clues->id;
        $user->clues_jurisdiccion=$clues->jurisdiccion;
        $user->clues_nombre=$clues->nombre;
        $user->clues_categoria=$clues->categoria;
        $user->cuasifalla = $request->cuasifalla;
        $user->adverso = $request->adverso;
        $user->centinela = $request->centinela;

        // Guardamos el registro
        $user->save();

        //Redireccionamos con el mensaje de exito
        return redirect()->route('usuarioIndex')->with('success', 'El usuario se registro correctamente'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Consultamos el registro con el id
        $user = User::findOrFail($id);

        return view('usuario.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Buscamos el usuario por el ID
        $user = User::findOrFail($id);

        // Consultamos todas las CLUES
        $clues = Unidad::orderBy('nombre', 'asc')->get();

        // Redireccinamos a la vista con el objeto
        return view('usuario.edit',compact('user','clues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscamos el usuario por el ID
        $user = User::findOrFail($id);

        // Validamos los datos ingresados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:users,email,' . $id,
            'password'=> 'nullable|string|confirmed',
            'rPassword'=>'nullable|string|same:password',
            'categoria'=>'required|integer',
            'nivel'=>'required|integer',
            'clues'=>'required|string',            
            'cuasifalla' => 'nullable|boolean',
            'adverso' => 'nullable|boolean',
            'centinela' => 'nullable|boolean',
        ],[
            'rPassword.same'=>'Las contraseñas no coinciden',
            'correo.unique'=>'El correo ya se encuentra registrado', 
            'password.required'=>'Este campo es requerido',     
            'rPassword.required'=>'Este campo es requerido',     
        ]);

        // Actualizamos los datos
        $user->name = $request->nombre;
        $user->email = $request->correo;

        // Solo actualiza el password si no está vacío
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->categoria = $request->categoria;
        $user->nivel = $request->nivel;
        $user->clues = $request->clues;
        $user->cuasifalla = $request->cuasifalla;
        $user->adverso = $request->adverso;
        $user->centinela = $request->centinela;

        // Guarda los cambios
        $user->save();

        // Redirecciona con un mensaje de éxito
        return redirect()->route('usuarioShow',['id' => $id])->with('update', 'Usuario actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
