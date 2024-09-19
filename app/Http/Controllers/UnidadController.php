<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Consultamos todas las unidades de la DB
        $unidades = Unidad::orderBy('jurisdiccion', 'asc')->get();

        // Retornamos la vista con los registros
        return view('unidad.index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostramos el formulario
        return view('unidad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los campos
        $request->validate([
            'clues' => 'required|string|unique:unidades,clues',
            'jurisdiccion' => 'required',
            'unidad' => 'required|string',
        ],[
            'clues.required'=> 'Este campo es obligatorio',
            'clues.unique'=> 'La CLUES ya se encuentra registrada',
            'jurisdiccio .required'=> 'Este campo es obligatorio',
            'unidad.required'=> 'Este campo es obligatorio',
        ]);
        
        // Creamos el objeto
        $unidad = new Unidad();

        // Asignamos los campos
        $unidad->clues = $request->clues;
        $unidad->jurisdiccion = $request->jurisdiccion;
        $unidad->nombre = $request->unidad;
        $unidad->categoria = 9999;

        //Guardamos los datos
        $unidad->save();

        //Redireccionamos con el mensaje de exito
        return redirect()->route('unidadIndex')->with('success', 'La unidad se registro correctamente'); 


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
        // Buscamos la unidad en la tabla
        $unidad = Unidad::findOrFail($id);

        // Retornamos la vista con los valores de unidad
        return view('unidad.edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validamos los datos del formulario
        $request->validate([
            'clues'=>'required|string|unique:unidades,clues,'. $id,
            'jurisdiccion'=>'required',
            'nombre'=>'required|string',
        ],[
            'clues.required'=>'Este campo es requerido',
            'clues.unique'=>'Ya se encuentra registrada esta clave',
            'jurisdiccion.required'=>'Se debe seleccionar una jurisdicción',
            'nombre.required'=>'Se debe ingresar un nombre',
        ]);

        // Buscamos el registro en la base de datos
        $unidad = Unidad::findOrFail($id);

        // Asignamos los valores a los campos
        $unidad->clues = $request->clues;
        $unidad->jurisdiccion = $request->jurisdiccion;
        $unidad->nombre = $request->nombre;

        // Actualizamos el registro
        $unidad->save();

        // Redirigimos y mandamos el mensaje de exito
        return redirect()->route('unidadIndex')->with('update', 'Los datos de la unidad se actualizarón correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscamos el registro basado en el id
        $unidad = Unidad::findOrFail($id);

        // Eliminamos el registro
        $unidad->delete();

        // Redirigimos y mandamos el mensaje de exito
        return redirect()->route('unidadIndex')->with('destroy', 'La unidad se elimino correctamente'); 
    }

    /**
     * Consultamos todas las unidades que esten asigandas al usuario que inicio sesion
     */
    public function misUnidades()
    {
        // Obtener el usuario autenticado
        $user = FacadesAuth::user();

        // Obtenemos la categoria en una variable
        $nivel = $user->nivel;
        $categoria = $user->categoria;
        $unidad = $user->clues;

        // Consultamos todas las unidades de la DB
        $unidades = Unidad::where('categoria', $categoria)->get();

        // Retornamos la vista con los registros
        return view('mis-unidades.index', compact('unidades'));
    }
}
