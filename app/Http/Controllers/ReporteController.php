<?php

namespace App\Http\Controllers;

use App\Exports\EventoExport;
use App\Models\Evento;
use App\Models\Unidad;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostramos la vista del formulario
        return view('reporte.index');
    }

    /**
     * Buscar todos los registros con las fechas
     */

     public function search(Request $request)
     {
         $request->validate([
            'fecha_inicio'=>'required|date',
            'fecha_fin'=>'required|date|after_or_equal:fecha_inicio',
         ],[
            'fecha_inicio.required'=>'Seleccione una fecha',
            'fecha_fin.required'=>'Seleccione una fecha',
            'fecha_fin.after_or_equal'=>'Debe ser mayor a la fecha de inicio',
         ]);

        // Asegura que la fecha_fin incluya todo el día
        $fechaFin = \Carbon\Carbon::parse($request->fecha_fin)->endOfDay();
        
        // Formatear fecha de inicio
        $fechaInicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('d-m-Y'); 

         // Búsqueda de eventos
        $eventos = Evento::whereBetween('created_at', [$request->fecha_inicio, $fechaFin])->get();

        // Contar eventos por unidad
        $conteoPorUnidad = $eventos->groupBy('unidad')->map(function ($grupo) {
            return $grupo->count();
        })->sortByDesc(function ($conteo) {
            return $conteo;
        });

        // Obtener los nombres de las unidades para la vista
        $unidades = Unidad::whereIn('clues', $conteoPorUnidad->keys())->pluck('nombre', 'clues');

        // Retorno de la vista con los eventos y el conteo por unidad
        return view('reporte.show', [
            'fechaInicio'=> $fechaInicio,
            'fechaFin'=> \Carbon\Carbon::parse($request->fecha_fin)->format('d-m-Y'), // Formatear fecha de fin
            'eventos' => $eventos,
            'conteoPorUnidad' => $conteoPorUnidad,
            'unidades' => $unidades,
        ]);
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Funcion para exportar el archivo de Excel de todos los eventos
     */
    public function reporteExcel()
    {
        // Retornamos la descarga del archivo Excel
        return Excel::download(new EventoExport,'eventos.xlsx');
    }
}
