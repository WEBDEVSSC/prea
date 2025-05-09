<?php

namespace App\Http\Controllers;

use App\Exports\EventoExport;
use App\Models\Evento;
use App\Models\Unidad;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReporteMensualMailable;
use App\Models\User;
use Carbon\Carbon;

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
     * Funcion para exportar el archivo de Excel de todos los eventos
     */
    public function reporteExcel(Request $request)
    {
        // Validar las fechas
        $validated = $request->validate([
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio',
        ]);

        // Obtener las fechas de inicio y fin
        $inicio = $validated['inicio'];
        $fin = $validated['fin'];

        // Exportar el archivo Excel
        return Excel::download(new EventoExport($inicio, $fin), 'eventos-'.$inicio.'-to-'.$fin.'.xlsx');
        
        // Retornamos la descarga del archivo Excel
        // return Excel::download(new EventoExport,'eventos.xlsx');
    }

    public function generarReporteMensualPDF()
    {
        $nombrePDF = 'REPORTE-PREA-MENSUAL-' . date('Y-m-d') . '.pdf';
        $rutaPDF = 'public/pdfs/'.$nombrePDF;

        if (!Storage::exists('public/pdfs')) {
            Storage::makeDirectory('public/pdfs');
        }

        // Obtener el primer y último día del mes anterior
        $inicioMesAnterior = Carbon::now()->subMonthNoOverflow()->startOfMonth();
        $finMesAnterior = Carbon::now()->subMonthNoOverflow()->endOfMonth();

        // Formateo para mostrar en el PDF
        $inicioMesStr = $inicioMesAnterior->format('d-m-Y');
        $finMesStr = $finMesAnterior->format('d-m-Y');

        // Consultamos todos los eventos del mes anterior
        $eventosMes = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])->get();
        $contadorEventos = $eventosMes->count();

        $eventosAdverso = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->where('clasificacion_del_Evento', 'EVENTO ADVERSO')
            ->count();

        $eventosCuasiFalla = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->where('clasificacion_del_Evento', 'CUASI-FALLA')
            ->count();

        $eventosCentinela = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->where('clasificacion_del_Evento', 'EVENTO CENTINELA')
            ->count();

        $listaDeEventos = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->get();

            /**
             * 
             * 
             * RANGOS DE EDAD
             * 
             */

        $rangoEdadLactantes = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [0, 1])
            ->count();

        $rangoEdadPreescolares = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [2, 4])
            ->count();

        $rangoEdadEscolares = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [5, 9])
            ->count();

        $rangoEdadPreAdolescentes = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [10, 14])
            ->count();

        $rangoEdadAdolescentes = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [15, 19])
            ->count();

        $rangoEdadAdultosJovenes = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [20, 24])
            ->count();

        $rangoEdadAdultos = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [25, 44])
            ->count();

        $rangoEdadAdultosMayores = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->where('edad', [45, 59])
            ->count();

        $rangoEdadAdultosMayoresInicio = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->where('edad', [60, 64])
            ->count();
    
        $rangoEdadAdultosMayores = Evento::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])
            ->where('edad', '>=', 65)
            ->count();


        // Generar el PDF AQUI PASAMOS TODAS LAS VARIABLES 
        $pdf = Pdf::loadView('export.reporte-mensual', [
            'nombre' => 'Juan Pérez',
            'contadorEventos' => $contadorEventos,
            'eventosAdverso' => $eventosAdverso,
            'eventosCuasiFalla' => $eventosCuasiFalla,
            'eventosCentinela' => $eventosCentinela,
            'listaDeEventos' => $listaDeEventos,
            'fechaInicio' => $inicioMesStr,
            'fechaFin' => $finMesStr,
            'eventos' => $eventosMes,
            'rangoEdadLactantes' => $rangoEdadLactantes
        ]);

        // Cambiar la orientación de la página a horizontal (landscape)
        $pdf->setPaper('A4', 'landscape');

        // Guardar el PDF
        Storage::put($rutaPDF, $pdf->output());

        $usuarios = User::where('reporte_semanal', 1)->get();

        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(
                new ReporteMensualMailable(
                    $usuario->name,
                    $rutaPDF,
                    $inicioMesStr,
                    $finMesStr
                )
            );
        }

        return 'Reporte mensual enviado correctamente: ' . $nombrePDF;
    }

}
