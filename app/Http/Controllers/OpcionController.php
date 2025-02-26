<?php

namespace App\Http\Controllers;

use App\Models\IncidenteCategoria;
use App\Models\IncidenteOpcion;
use Illuminate\Http\Request;

class OpcionController extends Controller
{
    public function create($id)
    {        
        // Buscamos el nombre de la categoria
        $categoria = IncidenteCategoria::findOrFail($id);
        
        // Regresamos la vista
        return view('opcion.create', compact('categoria'));
    }

    public function store(Request $request, $id)
    {
        // Validamos los datos
        $validated = $request->validate([
            'nombre' => 'required|string'
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'El campo nombre es tipo texto',
        ]);

        // Creamos el objeto
        $opcion = new IncidenteOpcion();

        // Asignamos los valores
        $opcion->opcion = $request->nombre;
        $opcion->relacion = $id;

        // Guardamos los datos
        $opcion->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('categoriaShow', $id)->with('successOpcion', 'Registro realizado correctamente');
    }

    public function edit($id)
    {
        //Buscamos el registro
        $opcion = IncidenteOpcion::findOrFail($id);

        //Regresamos la vista
        return view('opcion.edit', compact('opcion'));
    }

    public function update(Request $request, $id)
    {
        // Validamos los datos
        $validated = $request->validate([
            'opcion' => 'required|string',
        ],[
            'opcion.required' => 'El campo es obligatorio',
            'opcion.string' => 'El campo es de tipo texto',
        ]);

        // Buscamos el registro
        $opcion = IncidenteOpcion::findOrFail($id);

        // Categoria
        $categoria = IncidenteCategoria::where('id',$opcion->relacion)->first();

        // Asignamos los datos
        $opcion->opcion = $request->opcion;

        // Guardamos el registro
        $opcion->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('categoriaShow',$categoria->id)->with('updateOpcion', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Buscamos el ID
        $opcion = IncidenteOpcion::findOrFail($id);

        // Categoria
        $categoria = IncidenteCategoria::where('id',$opcion->relacion)->first();

        // Verificar si la categoría existe
        if (!$opcion) 
        {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }

        // Eliminar la categoría
        $opcion->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('categoriaShow', $categoria->id)->with('destroyOpcion', 'Registro eliminado correctamente');
    }
}
