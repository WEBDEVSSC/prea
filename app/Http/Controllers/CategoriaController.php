<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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

        // Retronamos la vista con el objeto
        return view('categoria.show', compact('categoria'));
    }
}
