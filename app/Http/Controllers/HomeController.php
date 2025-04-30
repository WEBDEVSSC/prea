<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

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
        $usuario = Auth::user();
        
        // Establecemos el año en curso
        $anio = 2025;
        
        // Contamos el total de eventos CUASI-FALLA
        $cuasiFalla = Evento::where('clasificacion_del_evento','CUASI-FALLA')
            ->whereYear('created_at', $anio)
            ->count();

        // Contamos el total de eventos EVENTO ADVERSO
        $eventoAdverso = Evento::where('clasificacion_del_evento','EVENTO ADVERSO')
            ->whereYear('created_at', $anio)
            ->count();

        // Contamos el total de eventos EVENTO CENTINELA
        $eventoCentinela = Evento::where('clasificacion_del_evento','EVENTO CENTINELA')
            ->whereYear('created_at', $anio)
            ->count();

        // Contamos el total de eventos
        $totalEvento = Evento::whereYear('created_at', $anio)
                     ->count();

        // ------------------------------ GRAFICAS POR SEXO ---------------------------------------

        // Masculino
        $totalMasculino = Evento::where('sexo','MASCULINO')
            ->whereYear('created_at', $anio)
            ->count();

        if ($totalEvento > 0) 
        {
               $porcentajeMasculino = ($totalMasculino / $totalEvento) * 100;
        } 
        else 
        {
            $porcentajeMasculino = 0; // O cualquier valor que tenga sentido en este caso
        }        

        // Femenino
        $totalFemenino = Evento:: where('sexo','FEMENINO')
            ->whereYear('created_at',$anio)
            ->count();

        if ($totalEvento > 0) 
        {
               $porcentajeFemenino = ($totalFemenino / $totalEvento) * 100;
        } 
        else 
        {
            $porcentajeFemenino = 0; // O cualquier valor que tenga sentido en este caso
        }
        

        // -------------------------- GRAFICAS POR CONTEO DE JURISDICCION -------------------------

        // Jurisdiccion 1
        $totalJurisdiccionUno = Evento:: where('jurisdiccion',1)
            ->whereYear('created_at',$anio)
            ->count();

        // Jurisdiccion 2
        $totalJurisdiccionDos = Evento:: where('jurisdiccion',2)
        ->whereYear('created_at',$anio)
        ->count();

        // Jurisdiccion 3
        $totalJurisdiccionTres = Evento:: where('jurisdiccion',3)
            ->whereYear('created_at',$anio)
            ->count();

        // Jurisdiccion 4
        $totalJurisdiccionCuatro = Evento:: where('jurisdiccion',4)
            ->whereYear('created_at',$anio)
            ->count();

        // Jurisdiccion 5
        $totalJurisdiccionCinco = Evento:: where('jurisdiccion',5)
            ->whereYear('created_at',$anio)
            ->count();
        
        // Jurisdiccion 6
        $totalJurisdiccionSeis = Evento:: where('jurisdiccion',6)
            ->whereYear('created_at',$anio)
            ->count();

        // Jurisdiccion 7
        $totalJurisdiccionSiete = Evento:: where('jurisdiccion',7)
            ->whereYear('created_at',$anio)
            ->count();

        // Jurisdiccion 8
        $totalJurisdiccionOcho = Evento:: where('jurisdiccion',8)
            ->whereYear('created_at',$anio)
            ->count();

        // -------------------------- GRAFICAS PARA RANGOS DE EDAD  ------------------------------

        $totalPrimeraInfancia = Evento:: whereBetween('edad', [0, 5])
            ->whereYear('created_at',$anio)
            ->count();

        $totalInfancia = Evento:: whereBetween('edad', [6, 11])
            ->whereYear('created_at',$anio)
            ->count();
        
        $totalAdolescencia = Evento:: whereBetween('edad', [12, 15])
            ->whereYear('created_at',$anio)
            ->count();

        $totalJuventud = Evento:: whereBetween('edad', [14, 26])
            ->whereYear('created_at',$anio)
            ->count();

        $totalAdultez = Evento:: whereBetween('edad', [27, 59])
            ->whereYear('created_at',$anio)
            ->count();
        
        $totalPersonaMayor = Evento:: whereBetween('edad', [60, 200])
            ->whereYear('created_at',$anio)
            ->count();

        // ---------------- GRAFICAS PARA EL LUGAR O AREA DEL EVENTO ADVERSO ---------------------

        $archivoClinico = Evento:: where('servicio','ARCHIVO CLINICO')
            ->whereYear('created_at',$anio)
            ->count();
        
        $caja = Evento:: where('servicio','CAJA')
            ->whereYear('created_at',$anio)
            ->count();

        $cirugia = Evento:: where('servicio','CIRUGIA')
            ->whereYear('created_at',$anio)
            ->count();

        $enfermeria = Evento:: where('servicio','ENFERMERIA')
            ->whereYear('created_at',$anio)
            ->count();
        
        $estacionamiento = Evento:: where('servicio','ESTACIONAMIENTO')
            ->whereYear('created_at',$anio)
            ->count();
        
        $farmacia = Evento:: where('servicio','FARMACIA')
            ->whereYear('created_at',$anio)
            ->count();

        $ginecologiaObstetricia = Evento:: where('servicio','GINECOLOGIA/OBSTETRICIA')
            ->whereYear('created_at',$anio)
            ->count();

        $hospitalizacion = Evento:: where('servicio','HOSPITALIZACION')
            ->whereYear('created_at',$anio)
            ->count();

        $imagenologiaRayosX = Evento:: where('servicio','IMAGENOLOGIA Y RAYOS X')
            ->whereYear('created_at',$anio)
            ->count();

        $laboratorio = Evento:: where('servicio','LABORATORIO')
            ->whereYear('created_at',$anio)
            ->count();

        $medicinaInterna = Evento:: where('servicio','MEDICINA INTERNA')
            ->whereYear('created_at',$anio)
            ->count();

        $moduloDeIncapacidades = Evento:: where('servicio','MODULO DE INCAPACIDADES')
            ->whereYear('created_at',$anio)
            ->count();

        $pediatria = Evento:: where('servicio','PEDIATRIA')
            ->whereYear('created_at',$anio)
            ->count();

        $recepcion = Evento:: where('servicio','RECEPCION')
            ->whereYear('created_at',$anio)
            ->count();

        $trabajoSocial = Evento:: where('servicio','TRABAJO SOCIAL')
            ->whereYear('created_at',$anio)
            ->count();

        $urgencias = Evento:: where('servicio','URGENCIAS')
            ->whereYear('created_at',$anio)
            ->count();

        $consultaExterna = Evento:: where('servicio','CONSULTA EXTERNA')
            ->whereYear('created_at',$anio)
            ->count();

        $vigilancia = Evento:: where('servicio','VIGILANCIA')
            ->whereYear('created_at',$anio)
            ->count();

        $uciAdultos = Evento:: where('servicio','U.C.I. ADULTOS')
            ->whereYear('created_at',$anio)
            ->count();

        $uciPediatricos = Evento:: where('servicio','U.C.I. PEDIATRICOS')
            ->whereYear('created_at',$anio)
            ->count();

        $uciNeonatales = Evento:: where('servicio','U.C.I. NEONATALES')
            ->whereYear('created_at',$anio)
            ->count();

        // ------------------------------------- TURNO  -------------------------------------------

        $matutino = Evento:: where('turno','MATUTINO')
            ->whereYear('created_at',$anio)
            ->count();

        $vespertino = Evento:: where('turno','VESPERTINO')
            ->whereYear('created_at',$anio)
            ->count();

        $nocturno = Evento:: where('turno','NOCTURNO')
            ->whereYear('created_at',$anio)
            ->count();

        $jornadaAcumulada = Evento:: where('turno','JORNADA ACUMULADA')
            ->whereYear('created_at',$anio)
            ->count();

        // ------------------------------------- MES DE REGISTRO ----------------------------------

        $enero2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 1) 
            ->count();

        $febrero2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 2) 
            ->count();

        $marzo2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 3) 
            ->count();

        $abril2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 4) 
            ->count();

        $mayo2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 5) 
            ->count();

        $junio2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 6) 
            ->count();

        $julio2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 7) 
            ->count();

        $agosto2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 8) 
            ->count();

        $septiembre2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 9) 
            ->count();

        $octubre2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 10) 
            ->count();

        $noviembre2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 11) 
            ->count();

        $diciembre2024 = Evento::whereYear('created_at', $anio)
            ->whereMonth('created_at', 12) 
            ->count();

        // --------------------------- PASAMOS TODOS LOS VALORES A LA VISTA -----------------------
        

        return view('home', compact(
            'usuario',
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
