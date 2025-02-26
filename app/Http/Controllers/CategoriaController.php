<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\IncidenteOpcion;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //

    public function index()
    {
        // Consultamos todas las categotias
        $categorias = Categoria::all();

        // Retornamos la vista con el objeto
        return view('categoria.index',compact('categorias'));
    }

    public function show($id)
    {
        // Consultamos el registro
        $categoria = Categoria::findOrFail($id);

        // Consultamos todas las opciones
        $opciones = IncidenteOpcion::where('relacion', $id)->get();

        // Retronamos la vista con el objeto
        return view('categoria.show', compact('categoria','opciones'));
    }

    public function create()
    {
        // Retornamos la vista del formulario
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        // Validamos los datos
        $validated = $request->validate([
            'nombre' => 'required|string',
        ],[
            'nombre.required' => 'El campo es obligatorio',
            'nombre.string' => 'El campo es tipo texto',
        ]);

        // Creamos la instancia
        $categoria = new Categoria();

        $categoria->categoria = $request->nombre;

        $categoria->save();

        // Redireccionamos con el evento 
        return redirect()->route('categoriaIndex')->with('success', 'Los datos se registrarón correctamente');
    }

    public function edit($id)
    {
        // Buscamos el registro
        $categoria = Categoria::findOrFail($id);

        // Retornamos la vista con el objeto
        return view('categoria.edit',compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        // Validamos los datos
        $validated = $request->validate([
            'nombre' => 'required|string',
        ],[
            'nombre.required' => 'El campo es obligatorio',
            'nombre.string' => 'El campo es tipo texto',
        ]);

        // Buscar el registro a actualizar
        $categoria = Categoria::findOrFail($id);

        // Actualizamos los campos
        $categoria->categoria = $request->input('nombre');

        // Guardamos los datos
        $categoria->save();

        // Retornamos la vista con el mensaje de exito
        return redirect()->route('categoriaIndex')->with('update', 'Los datos se actualizarón correctamente.');

    }

    public function delete($id)
    {
        // Buscamos el ID
        $categoria = Categoria::findOrFail($id);

        // Verificar si la categoría existe
        if (!$categoria) 
        {
            return redirect()->back()->with('error', 'La categoría no existe.');
        }

        // Eliminar la categoría
        $categoria->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('categoriaIndex')->with('destroy', 'Registro eliminado correctamente');
    }

    
}
