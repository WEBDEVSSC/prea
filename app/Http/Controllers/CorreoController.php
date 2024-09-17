<?php

namespace App\Http\Controllers;

use App\Mail\CorreoRegistro;
use App\Models\Correo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Obtener todos los registros de la tabla correos
        $correos = Correo::all();

        // Retornar la vista 'timbrado.index' y pasarle los registros
        return view('timbrado.index', compact('correos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('timbrado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recibimos y validamos el correo
        $request->validate([
            'correo' => 'required|email|unique:correos,correo',
            'area' => 'required|string',
        ],[
            'correo.unique' => 'El correo ya se encuentra registrado en la base de datos',
            'correo.required' => 'Se debe ingresar un correo electronico',
            'area.required' => 'Se debe registrar un área',
        ]);

        // Crea una nueva instancia del modelo Correo
        $correo = new Correo();

        // Asigna el valor del campo 'correo' del formulario al atributo 'correo' del modelo
        $correo->correo = $request->correo;
        $correo->area = $request->area;
        
        // Guarda el nuevo registro en la base de datos
        $correo->save();

        // Notificamos por correo
        Mail::to($request->correo)->send(new CorreoRegistro);

        // Redirigimos y mandamos el mensaje de exito
        return redirect()->route('timbradoIndex')->with('success', 'El correo se registro correctamente');         
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
    public function edit($id)
    {
        //Buscamos el correo en la db
        $timbrado = Correo::findOrFail($id);

        //Retornamos el valor a la vista de edicion
        return view('timbrado.edit', compact('timbrado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validamos los campos del request
        $request->validate([
            'correo' => 'required|email|unique:correos,correo,' . $id,
            'area' => 'required|string',
        ],[
            'correo.unique' => 'El correo ya se encuentra registrado en la base de datos',
            'correo.required' => 'Se debe ingresar un correo electronico',
            'area.required' => 'Se debe registrar un área',
        ]);

        // Encontramos el registro con el id
        $correo = Correo::findOrFail($id);

        // Asiugnamos los valores a los campos
        $correo->correo = $request->correo;
        $correo->area = $request->area;

        // Guardamos en la db
        $correo->save();

        // Redirigimos y mandamos el mensaje de exito
        return redirect()->route('timbradoIndex')->with('update', 'El correo se actualizo correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontramos el registro con el id
        $correo = Correo::findOrFail($id);

        // Eliminamos el registro
        $correo->delete();

        // Redirigimos y mandamos el mensaje de exito
        return redirect()->route('timbradoIndex')->with('destroy', 'El correo se elimino correctamente'); 
    }
}
