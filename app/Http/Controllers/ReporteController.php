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
use App\Mail\ReporteSemanalMailable;
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

    public function generarReporteSemanalPDF()
    {
        //dd(Carbon::now()->format('Y-m-d H:i:s'));
        
        $nombrePDF = 'REPORTE-PREA-' . date('Y-m-d') . '.pdf';
        $rutaPDF = 'public/pdfs/'.$nombrePDF;

        if (!Storage::exists('public/pdfs')) {
            Storage::makeDirectory('public/pdfs');
        }

        // Obtener el lunes de la semana pasada
        $lunesPasado = Carbon::now()->startOfWeek()->subWeek(); // Lunes anterior
        $domingoPasado = Carbon::now()->startOfWeek()->subDay(); // Domingo anterior

        // Opcional: Formateo
        $lunesPasadoStr = $lunesPasado->format('d-m-Y');
        $domingoPasadoStr = $domingoPasado->format('d-m-Y');

        // Consultamos todos los eventos de la semana pasada
        $eventosSemanaPasada = Evento::whereBetween('created_at', [$lunesPasado, $domingoPasado])->get();
        $contadorEventos = $eventosSemanaPasada->count();

        $eventosAdverso = Evento::whereBetween('created_at', [$lunesPasado, $domingoPasado])
            ->where('clasificacion_del_Evento', 'EVENTO ADVERSO')
            ->count();

        $eventosCuasiFalla = Evento::whereBetween('created_at', [$lunesPasado, $domingoPasado])
            ->where('clasificacion_del_Evento', 'CUASI-FALLA')
            ->count();

        $eventosCentinela = Evento::whereBetween('created_at', [$lunesPasado, $domingoPasado])
            ->where('clasificacion_del_Evento', 'EVENTO CENTINELA')
            ->count();

        // Pasamos todos los datos al PDF
        $pdf = Pdf::loadView('export.reporte-semanal', [
            'nombre' => 'Juan Pérez',

            'contadorEventos' => $contadorEventos,
            'eventosAdverso' => $eventosAdverso,
            'eventosCuasiFalla' => $eventosCuasiFalla,
            'eventosCentinela' => $eventosCentinela,

            'fechaInicio' => $lunesPasadoStr,
            'fechaFin' => $domingoPasadoStr,
            'eventos' => $eventosSemanaPasada
        ]);

        // Guardar PDF
        Storage::put($rutaPDF, $pdf->output());

        // Obtenemos todos los usuarios que acepten el correo de REPORTE SEMANAL
        $correos = User::where('reporte_semanal', 1)->pluck('email')->toArray();

        // Obtenemos el objeto usuario para sacar sus datos
        $usuarios = User::where('reporte_semanal', 1)->get();

        // Recorremos el arreglo de usuarios para ir cargando el nombre
        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(
                new ReporteSemanalMailable(
                    $usuario->name,
                    $rutaPDF,
                    $lunesPasadoStr,
                    $domingoPasadoStr
                )
            );
        }

        return 'PDF guardado y correo enviado exitosamente como ' . $nombrePDF;
    }
}
