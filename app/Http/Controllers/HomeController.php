<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Contamos el total de eventos CUASI-FALLA
        $cuasiFalla = Evento::where('clasificacion_del_evento','CUASI-FALLA')
            ->whereYear('fecha_hora', 2024)
            ->count();

        // Contamos el total de eventos EVENTO ADVERSO
        $eventoAdverso = Evento::where('clasificacion_del_evento','EVENTO ADVERSO')
            ->whereYear('fecha_hora', 2024)
            ->count();

        // Contamos el total de eventos EVENTO CENTINELA
        $eventoCentinela = Evento::where('clasificacion_del_evento','EVENTO CENTINELA')
            ->whereYear('fecha_hora', 2024)
            ->count();

        // Contamos el total de eventos
        $totalEvento = Evento::whereYear('created_at', 2024)
                     ->count();

        // ------------------------------ GRAFICAS POR SEXO ---------------------------------------

        // Masculino
        $totalMasculino = Evento::where('sexo','MASCULINO')
            ->whereYear('fecha_hora', 2024)
            ->count();

        // Pórcentaje Masculino
        $porcentajeMasculino = ($totalMasculino / $totalEvento) * 100;

        // Femenino
        $totalFemenino = Evento:: where('sexo','FEMENINO')
            ->whereYear('fecha_hora',2024)
            ->count();

        // Pórcentaje Masculino
        $porcentajeFemenino = ($totalFemenino / $totalEvento) * 100;
        

        // -------------------------- GRAFICAS POR CONTEO DE JURISDICCION -------------------------

        // Jurisdiccion 1
        $totalJurisdiccionUno = Evento:: where('jurisdiccion',1)
            ->whereYear('fecha_hora',2024)
            ->count();

        // Jurisdiccion 2
        $totalJurisdiccionDos = Evento:: where('jurisdiccion',2)
        ->whereYear('fecha_hora',2024)
        ->count();

        // Jurisdiccion 3
        $totalJurisdiccionTres = Evento:: where('jurisdiccion',3)
            ->whereYear('fecha_hora',2024)
            ->count();

        // Jurisdiccion 4
        $totalJurisdiccionCuatro = Evento:: where('jurisdiccion',4)
            ->whereYear('fecha_hora',2024)
            ->count();

        // Jurisdiccion 5
        $totalJurisdiccionCinco = Evento:: where('jurisdiccion',5)
            ->whereYear('fecha_hora',2024)
            ->count();
        
        // Jurisdiccion 6
        $totalJurisdiccionSeis = Evento:: where('jurisdiccion',6)
            ->whereYear('fecha_hora',2024)
            ->count();

        // Jurisdiccion 7
        $totalJurisdiccionSiete = Evento:: where('jurisdiccion',7)
            ->whereYear('fecha_hora',2024)
            ->count();

        // Jurisdiccion 8
        $totalJurisdiccionOcho = Evento:: where('jurisdiccion',8)
            ->whereYear('fecha_hora',2024)
            ->count();

        // -------------------------- GRAFICAS PARA RANGOS DE EDAD  ------------------------------

        $totalPrimeraInfancia = Evento:: whereBetween('edad', [0, 5])
            ->whereYear('fecha_hora',2024)
            ->count();

        $totalInfancia = Evento:: whereBetween('edad', [6, 11])
            ->whereYear('fecha_hora',2024)
            ->count();
        
        $totalAdolescencia = Evento:: whereBetween('edad', [12, 15])
            ->whereYear('fecha_hora',2024)
            ->count();

        $totalJuventud = Evento:: whereBetween('edad', [14, 26])
            ->whereYear('fecha_hora',2024)
            ->count();

        $totalAdultez = Evento:: whereBetween('edad', [27, 59])
            ->whereYear('fecha_hora',2024)
            ->count();
        
        $totalPersonaMayor = Evento:: whereBetween('edad', [60, 200])
            ->whereYear('fecha_hora',2024)
            ->count();

        // ---------------- GRAFICAS PARA EL LUGAR O AREA DEL EVENTO ADVERSO ---------------------

        $archivoClinico = Evento:: where('servicio','ARCHIVO CLINICO')
            ->whereYear('fecha_hora',2024)
            ->count();
        
        $caja = Evento:: where('servicio','CAJA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $cirugia = Evento:: where('servicio','CIRUGIA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $enfermeria = Evento:: where('servicio','ENFERMERIA')
            ->whereYear('fecha_hora',2024)
            ->count();
        
        $estacionamiento = Evento:: where('servicio','ESTACIONAMIENTO')
            ->whereYear('fecha_hora',2024)
            ->count();
        
        $farmacia = Evento:: where('servicio','FARMACIA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $ginecologiaObstetricia = Evento:: where('servicio','GINECOLOGIA/OBSTETRICIA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $hospitalizacion = Evento:: where('servicio','HOSPITALIZACION')
            ->whereYear('fecha_hora',2024)
            ->count();

        $imagenologiaRayosX = Evento:: where('servicio','IMAGENOLOGIA Y RAYOS X')
            ->whereYear('fecha_hora',2024)
            ->count();

        $laboratorio = Evento:: where('servicio','LABORATORIO')
            ->whereYear('fecha_hora',2024)
            ->count();

        $medicinaInterna = Evento:: where('servicio','MEDICINA INTERNA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $moduloDeIncapacidades = Evento:: where('servicio','MODULO DE INCAPACIDADES')
            ->whereYear('fecha_hora',2024)
            ->count();

        $pediatria = Evento:: where('servicio','PEDIATRIA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $recepcion = Evento:: where('servicio','RECEPCION')
            ->whereYear('fecha_hora',2024)
            ->count();

        $trabajoSocial = Evento:: where('servicio','TRABAJO SOCIAL')
            ->whereYear('fecha_hora',2024)
            ->count();

        $urgencias = Evento:: where('servicio','URGENCIAS')
            ->whereYear('fecha_hora',2024)
            ->count();

        $consultaExterna = Evento:: where('servicio','CONSULTA EXTERNA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $vigilancia = Evento:: where('servicio','VIGILANCIA')
            ->whereYear('fecha_hora',2024)
            ->count();

        $uciAdultos = Evento:: where('servicio','U.C.I. ADULTOS')
            ->whereYear('fecha_hora',2024)
            ->count();

        $uciPediatricos = Evento:: where('servicio','U.C.I. PEDIATRICOS')
            ->whereYear('fecha_hora',2024)
            ->count();

        $uciNeonatales = Evento:: where('servicio','U.C.I. NEONATALES')
            ->whereYear('fecha_hora',2024)
            ->count();

        // ------------------------------------- TURNO  -------------------------------------------

        $matutino = Evento:: where('turno','MATUTINO')
            ->whereYear('fecha_hora',2024)
            ->count();

        $vespertino = Evento:: where('turno','VESPERTINO')
            ->whereYear('fecha_hora',2024)
            ->count();

        $nocturno = Evento:: where('turno','NOCTURNO')
            ->whereYear('fecha_hora',2024)
            ->count();

        $jornadaAcumulada = Evento:: where('turno','JORNADA ACUMULADA')
            ->whereYear('fecha_hora',2024)
            ->count();

        // ------------------------------------- MES DE REGISTRO ----------------------------------

        $enero2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 1) 
            ->count();

        $febrero2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 2) 
            ->count();

        $marzo2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 3) 
            ->count();

        $abril2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 4) 
            ->count();

        $mayo2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 5) 
            ->count();

        $junio2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 6) 
            ->count();

        $julio2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 7) 
            ->count();

        $agosto2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 8) 
            ->count();

        $septiembre2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 9) 
            ->count();

        $octubre2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 10) 
            ->count();

        $noviembre2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 11) 
            ->count();

        $diciembre2024 = Evento::whereYear('fecha_hora', 2024)
            ->whereMonth('fecha_hora', 12) 
            ->count();

        // --------------------------- PASAMOS TODOS LOS VALORES A LA VISTA -----------------------
        

        return view('home', compact(
            'cuasiFalla',
            'eventoAdverso',
            'eventoCentinela',
            'totalEvento',
            'totalMasculino',
            'totalFemenino',
            'porcentajeMasculino',
            'porcentajeFemenino',
            'totalJurisdiccionUno',
            'totalJurisdiccionDos',
            'totalJurisdiccionTres',
            'totalJurisdiccionCuatro',
            'totalJurisdiccionCinco',
            'totalJurisdiccionSeis',
            'totalJurisdiccionSiete',
            'totalJurisdiccionOcho',
            'totalPrimeraInfancia',
            'totalInfancia',
            'totalAdolescencia',
            'totalJuventud',
            'totalAdultez',
            'totalPersonaMayor',
            'archivoClinico',
            'caja',
            'cirugia',
            'enfermeria',
            'estacionamiento',
            'farmacia',
            'ginecologiaObstetricia',
            'hospitalizacion',
            'imagenologiaRayosX',
            'laboratorio',
            'medicinaInterna',
            'moduloDeIncapacidades',
            'pediatria',
            'recepcion',
            'trabajoSocial',
            'urgencias',
            'consultaExterna',
            'vigilancia',
            'uciAdultos',
            'uciPediatricos',
            'uciNeonatales',
            'matutino',
            'vespertino',
            'nocturno',
            'jornadaAcumulada',
            'enero2024',
            'febrero2024',
            'marzo2024',
            'abril2024',
            'mayo2024',
            'junio2024',
            'julio2024',
            'agosto2024',
            'septiembre2024',
            'octubre2024',
            'noviembre2024',
            'diciembre2024',
        ));
    }
}
