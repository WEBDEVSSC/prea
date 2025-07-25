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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        //$inicioMesAnterior = Carbon::now()->subMonthNoOverflow()->startOfMonth();
        //$finMesAnterior = Carbon::now()->subMonthNoOverflow()->endOfMonth();

        $inicioMesAnterior = Carbon::now()->subMonthNoOverflow()->startOfMonth()->startOfDay(); // 1er día del mes anterior a las 00:00:00
        $finMesAnterior = Carbon::now()->subMonthNoOverflow()->endOfMonth()->endOfDay(); // último día del mes anterior a las 23:59:59

        // Formateo para mostrar en el PDF
        $inicioMesStr = $inicioMesAnterior->format('d-m-Y');
        $finMesStr = $finMesAnterior->format('d-m-Y');

        // Consultamos todos los eventos del mes anterior
        $eventosMes = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])->get();
        $contadorEventos = $eventosMes->count();

        $eventosAdverso = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('clasificacion_del_Evento', 'EVENTO ADVERSO')
            ->count();

        $eventosCuasiFalla = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('clasificacion_del_Evento', 'CUASI-FALLA')
            ->count();

        $eventosCentinela = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('clasificacion_del_Evento', 'EVENTO CENTINELA')
            ->count();

        $listaDeEventos = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->get();

            /**
             * 
             * 
             * REPORTES POR JURISDICCIONES
             * 
             */

        $totalJ1 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',1)
            ->count();

        $totalJ2 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',2)
            ->count();

        $totalJ3 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',3)
            ->count();

        $totalJ4 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',4)
            ->count();

        $totalJ5 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',5)
            ->count();

        $totalJ6 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',6)
            ->count();

        $totalJ7 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',7)
            ->count();

        $totalJ8 = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('jurisdiccion',8)
            ->count();

            /**
             * 
             * 
             * REPORTES POR SEXO
             * 
             */

        $totalMasculino = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('sexo','MASCULINO')
            ->count();

        $totalFemenino = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('sexo','FEMENINO')
            ->count();

            /**
             * 
             * 
             * RANGOS DE EDAD
             * 
             */

        $totalPrimeraInfancia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [0, 5])
            ->count();

        $totalInfancia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [6, 11])
            ->count();
        
        $totalAdolescencia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [12, 15])
            ->count();

        $totalJuventud = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [16, 26])
            ->count();

        $totalAdultez = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [27, 59])
            ->count();
        
        $totalPersonaMayor = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->whereBetween('edad', [60, 200])
            ->count();

            /**
             * 
             * 
             * POR TURNO
             * 
             */

        $totalMatutino = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('turno','MATUTINO')
            ->count();

        $totalVespertino = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('turno','VESPERTINO')
            ->count();
        
        $totalNocturno = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('turno','NOCTURNO')
            ->count();

        $totalJornadaAcumulada = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('turno','JORNADA ACUMULADA')
            ->count();

            /**
             * 
             * 
             * LUGAR O AREA DEL EVENTO ADVERSO
             * 
             */

        $almacen = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','ALMACEN')
            ->count();
        
        $cendis = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','CENDIS')
            ->count();

        $ceye = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','CEYE')
            ->count();

        $consultaExterna = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','CONSULTA EXTERNA')
            ->count();
        
        $dental = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','DENTAL')
            ->count();
        
        $farmacia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','FARMACIA')
            ->count();

        $hospitalizacion = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','HOSPITALIZACION')
            ->count();

        $imagenologia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','IMAGENOLOGIA Y RAYOS X')
            ->count();

        $laboratorio = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','LABORATORIO')
            ->count();

        $medicinaPreventiva = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','MEDICINA PREVENTIVA')
            ->count();

        $nutricion = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','NUTRICION')
            ->count();

        $patologia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','PATOLOGIA')
            ->count();

        $quirofano = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','QUIROFANO')
            ->count();

        $saludReproductiva = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','SALUD REPRODUCTIVA')
            ->count();

        $tocoCirugia = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','TOCOCIRUGIA')
            ->count();

        $UCIAdultos = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','U.C.I. ADULTOS')
            ->count();

        $UCINeonatales = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','U.C.I. NEONATALES')
            ->count();

        $UCIPediatricos = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','U.C.I. PEDIATRICOS')
            ->count();

        $urgencias = Evento::whereBetween('fecha_hora', [$inicioMesAnterior, $finMesAnterior])
            ->where('servicio','URGENCIAS')
            ->count();

        // Gráfica de tipos de eventos
        $chartConfigEventos = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Adversos', 'Cuasi-Falla', 'Centinela'],
                'datasets' => [[
                    'label' => 'Eventos',
                    'data' => [$eventosAdverso, $eventosCuasiFalla, $eventosCentinela],
                    'backgroundColor' => ['#facc15', '#f97316', '#f87171'],
                ]]
                ],
                'options' => [
                    'plugins' => [
                        'datalabels' => [
                            'display' => false
                        ]
                    ]
                ]
        ];

        $responseEventos = Http::withOptions(['verify' => false])
            ->timeout(30)
            ->get('https://quickchart.io/chart', [
                'c' => json_encode($chartConfigEventos)
            ]);

        if ($responseEventos->successful()) {
            $imageBase64Eventos = 'data:image/png;base64,' . base64_encode($responseEventos->body());
        } else {
            Log::error('Error al generar la gráfica de eventos: ' . $responseEventos->status());
            $imageBase64Eventos = null;
        }

        // Gráfica por jurisdicción
        $chartConfigJurisdiccion = [
            'type' => 'pie',
            'data' => [
                'labels' => ['J1', 'J2', 'J3', 'J4', 'J5', 'J6', 'J7', 'J8'],
                'datasets' => [[
                    'label' => 'Jurisdicciones',
                    'data' => [$totalJ1, $totalJ2, $totalJ3, $totalJ4, $totalJ5, $totalJ6, $totalJ7, $totalJ8],
                    'backgroundColor' => [
                        '#facc15', '#f97316', '#f87171', '#34d399',
                        '#60a5fa', '#a78bfa', '#f472b6', '#fb923c'
                    ],
                ]]
                ],
                    'options' => [
                'plugins' => [
                    'datalabels' => [
                        'display' => false
                    ]
                ]
            ]
        ];

        $responseJurisdiccion = Http::withOptions(['verify' => false])
            ->timeout(30)
            ->get('https://quickchart.io/chart', [
                'c' => json_encode($chartConfigJurisdiccion)
            ]);

        if ($responseJurisdiccion->successful()) {
            $imageBase64Jurisdiccion = 'data:image/png;base64,' . base64_encode($responseJurisdiccion->body());
        } else {
            Log::error('Error al generar la gráfica de jurisdicciones: ' . $responseJurisdiccion->status());
            $imageBase64Jurisdiccion = null;
        }

        // Gráfica por sexo
        $chartConfigSexo = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Masculino', 'Femenino'],
                'datasets' => [[
                    'label' => 'Jurisdicciones',
                    'data' => [$totalMasculino, $totalFemenino],
                    'backgroundColor' => [
                        '#60a5fa', '#f472b6'
                    ],
                ]]
                ],
                    'options' => [
                'plugins' => [
                    'datalabels' => [
                        'display' => false
                    ]
                ]
            ]
        ];

        $responseSexo = Http::withOptions(['verify' => false])
            ->timeout(30)
            ->get('https://quickchart.io/chart', [
                'c' => json_encode($chartConfigSexo)
            ]);

        if ($responseSexo->successful()) {
            $imageBase64Sexo = 'data:image/png;base64,' . base64_encode($responseSexo->body());
        } else {
            Log::error('Error al generar la gráfica de jurisdicciones: ' . $responseSexo->status());
            $imageBase64Sexo = null;
        }

        // Gráfica por rango de edad
        $chartConfigRangoDeEdad = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Primera Infancia', 'Infancia','Adolescencia','Juventud','Adultez','Adulto Mayor'],
                'datasets' => [[
                    'label' => 'Jurisdicciones',
                    'data' => [$totalPrimeraInfancia, $totalInfancia, $totalAdolescencia, $totalJuventud, $totalAdultez, $totalPersonaMayor],
                    'backgroundColor' => [
                        '#facc15', '#f97316', '#f87171', '#34d399', '#60a5fa', '#a78bfa'
                    ],
                ]]
                ],
                    'options' => [
                'plugins' => [
                    'datalabels' => [
                        'display' => false
                    ]
                ]
            ]
        ];

        $responseRangoDeEdad = Http::withOptions(['verify' => false])
            ->timeout(30)
            ->get('https://quickchart.io/chart', [
                'c' => json_encode($chartConfigRangoDeEdad)
            ]);

        if ($responseRangoDeEdad->successful()) {
            $imageBase64RangoDeEdad = 'data:image/png;base64,' . base64_encode($responseRangoDeEdad->body());
        } else {
            Log::error('Error al generar la gráfica de jurisdicciones: ' . $responseRangoDeEdad->status());
            $imageBase64RangoDeEdad = null;
        }

        // Gráfica por turno
        $chartConfigTurno = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Matutino', 'Vespertino', 'Nocturno', 'Jornada Acumulada'],
                'datasets' => [[
                    'label' => 'Jurisdicciones',
                    'data' => [$totalMatutino, $totalVespertino, $totalNocturno, $totalJornadaAcumulada],
                    'backgroundColor' => [
                        '#f43f5e', '#10b981', '#3b82f6', '#8b5cf6'
                        ],
                ]]
                ],
                    'options' => [
                'plugins' => [
                    'datalabels' => [
                        'display' => false,
                    ]
                ]
            ]
        ];

        $responseTurno = Http::withOptions(['verify' => false])
            ->timeout(30)
            ->get('https://quickchart.io/chart', [
                'c' => json_encode($chartConfigTurno)
            ]);

        if ($responseTurno->successful()) {
            $imageBase64Turno = 'data:image/png;base64,' . base64_encode($responseTurno->body());
        } else {
            Log::error('Error al generar la gráfica de jurisdicciones: ' . $responseTurno->status());
            $imageBase64Turno = null;
        }


        // Generar el PDF AQUI PASAMOS TODAS LAS VARIABLES 
        $pdf = Pdf::loadView('export.reporte-mensual', [
            'imageBase64Eventos' => $imageBase64Eventos,
            'imageBase64Jurisdiccion' => $imageBase64Jurisdiccion,
            'imageBase64RangoDeEdad' => $imageBase64RangoDeEdad,
            'imageBase64Sexo' => $imageBase64Sexo,
            'imageBase64Turno' => $imageBase64Turno,
            'nombre' => 'Juan Pérez',
            'contadorEventos' => $contadorEventos,
            'eventosAdverso' => $eventosAdverso,
            'eventosCuasiFalla' => $eventosCuasiFalla,
            'eventosCentinela' => $eventosCentinela,
            'listaDeEventos' => $listaDeEventos,
            'fechaInicio' => $inicioMesStr,
            'fechaFin' => $finMesStr,
            'eventos' => $eventosMes,

            'totalJ1'=> $totalJ1,
            'totalJ2'=> $totalJ2,
            'totalJ3'=> $totalJ3,
            'totalJ4'=> $totalJ4,
            'totalJ5'=> $totalJ5,
            'totalJ6'=> $totalJ6,
            'totalJ7'=> $totalJ7,
            'totalJ8'=> $totalJ8,

            'totalMasculino' => $totalMasculino,
            'totalFemenino' => $totalFemenino,

            'totalPrimeraInfancia' => $totalPrimeraInfancia,
            'totalInfancia' => $totalInfancia,
            'totalAdolescencia' => $totalAdolescencia,
            'totalJuventud' => $totalJuventud,
            'totalAdultez' => $totalAdultez,
            'totalPersonaMayor' => $totalPersonaMayor,

            'totalMatutino' => $totalMatutino,
            'totalVespertino' => $totalVespertino,
            'totalNocturno' => $totalNocturno,
            'totalJornadaAcumulada' => $totalJornadaAcumulada,

            'almacen' => $almacen,
            'cendis' => $cendis,
            'ceye' => $ceye,
            'consultaExterna' => $consultaExterna,
            'dental' => $dental,
            'farmacia' => $farmacia,
            'hospitalizacion' => $hospitalizacion,
            'imagenologia' => $imagenologia,
            'laboratorio' => $laboratorio,
            'medicinaPreventiva' => $medicinaPreventiva,
            'nutricion' => $nutricion,
            'patologia' => $patologia,
            'quirofano' => $quirofano,
            'saludReproductiva' => $saludReproductiva,
            'tocoCirugia' => $tocoCirugia,
            'UCIAdultos' => $UCIAdultos,
            'UCINeonatales' => $UCINeonatales,
            'UCIPediatricos' => $UCIPediatricos,
            'urgencias' => $urgencias,
        ]);

        // Cambiar la orientación de la página a horizontal (landscape)
        //$pdf->setPaper('A4', 'landscape');

        // Guardar el PDF
        Storage::put($rutaPDF, $pdf->output());

        $usuarios = User::where('reporte_semanal', 1)->get();

        foreach ($usuarios as $usuario) 
        {
            Mail::to($usuario->email)->send(
                new ReporteMensualMailable(
                    $usuario->name,
                    $rutaPDF,
                    $inicioMesStr,
                    $finMesStr
                )
            );

            Log::info('📧 Reporte mensual enviado a: ' . $usuario->email);
        }

        
        //$this->info('Reporte mensual enviado a: ' . $usuario->email); // → Se imprime en la consola
    }

}
