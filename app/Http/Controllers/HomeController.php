<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Carbon\Carbon;
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
        $anio = date("Y");
        
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

        $totalJuventud = Evento:: whereBetween('edad', [16, 26])
            ->whereYear('created_at',$anio)
            ->count();

        $totalAdultez = Evento:: whereBetween('edad', [27, 59])
            ->whereYear('created_at',$anio)
            ->count();
        
        $totalPersonaMayor = Evento:: whereBetween('edad', [60, 200])
            ->whereYear('created_at',$anio)
            ->count();

        // ---------------- GRAFICAS PARA EL LUGAR O AREA DEL EVENTO ADVERSO ---------------------

        $almacen = Evento:: where('servicio','ALMACEN')
            ->whereYear('created_at',$anio)
            ->count();
        
        $cendis = Evento:: where('servicio','CENDIS')
            ->whereYear('created_at',$anio)
            ->count();

        $ceye = Evento:: where('servicio','CEYE')
            ->whereYear('created_at',$anio)
            ->count();

        $consultaExterna = Evento:: where('servicio','CONSULTA EXTERNA')
            ->whereYear('created_at',$anio)
            ->count();
        
        $dental = Evento:: where('servicio','DENTAL')
            ->whereYear('created_at',$anio)
            ->count();
        
        $farmacia = Evento:: where('servicio','FARMACIA')
            ->whereYear('created_at',$anio)
            ->count();

        $hospitalizacion = Evento:: where('servicio','HOSPITALIZACION')
            ->whereYear('created_at',$anio)
            ->count();

        $imagenologia = Evento:: where('servicio','IMAGENOLOGIA Y RAYOS X')
            ->whereYear('created_at',$anio)
            ->count();

        $laboratorio = Evento:: where('servicio','LABORATORIO')
            ->whereYear('created_at',$anio)
            ->count();

        $medicinaPreventiva = Evento:: where('servicio','MEDICINA PREVENTIVA')
            ->whereYear('created_at',$anio)
            ->count();

        $nutricion = Evento:: where('servicio','NUTRICION')
            ->whereYear('created_at',$anio)
            ->count();

        $patologia = Evento:: where('servicio','PATOLOGIA')
            ->whereYear('created_at',$anio)
            ->count();

        $quirofano = Evento:: where('servicio','QUIROFANO')
            ->whereYear('created_at',$anio)
            ->count();

        $saludReproductiva = Evento:: where('servicio','SALUD REPRODUCTIVA')
            ->whereYear('created_at',$anio)
            ->count();

        $tococirugia = Evento:: where('servicio','TOCOCIRUGIA')
            ->whereYear('created_at',$anio)
            ->count();

        $UCIAdultos = Evento:: where('servicio','U.C.I. ADULTOS')
            ->whereYear('created_at',$anio)
            ->count();

        $UCINeonatales = Evento:: where('servicio','U.C.I. NEONATALES')
            ->whereYear('created_at',$anio)
            ->count();

        $UCIPediatricos = Evento:: where('servicio','U.C.I. PEDIATRICOS')
            ->whereYear('created_at',$anio)
            ->count();

        $urgencias = Evento:: where('servicio','URGENCIAS')
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

        // ------------------------------ GRAFICAS PARA TIPO DE INCIDENTE ---------------------------------------

        $tipoAESP = Evento:: where('incidente_categoria',1)
            ->whereYear('created_at',$anio)
            ->count();
        
        $tipoMMU = Evento:: where('incidente_categoria',2)
            ->whereYear('created_at',$anio)
            ->count();

        $tipoPCI = Evento:: where('incidente_categoria',3)
            ->whereYear('created_at',$anio)
            ->count();

        $tipoDEB = Evento:: where('incidente_categoria',4)
            ->whereYear('created_at',$anio)
            ->count();

        $tipoACC = Evento:: where('incidente_categoria',5)
            ->whereYear('created_at',$anio)
            ->count();
        
        $tipoPFR = Evento:: where('incidente_categoria',6)
            ->whereYear('created_at',$anio)
            ->count();
        
        $tipoSAP = Evento:: where('incidente_categoria',7)
            ->whereYear('created_at',$anio)
            ->count();

        $tipoNUT = Evento:: where('incidente_categoria',8)
            ->whereYear('created_at',$anio)
            ->count();
        
        $tipoASC = Evento:: where('incidente_categoria',9)
            ->whereYear('created_at',$anio)
            ->count();

        $tipoMCI = Evento:: where('incidente_categoria',10)
            ->whereYear('created_at',$anio)
            ->count();

        $tipoOTRO = Evento:: where('incidente_categoria',12)
            ->whereYear('created_at',$anio)
            ->count();

         // ------------------------------ GRAFICAS PARA GRAVEDAD DEL DAÑO ---------------------------------------

        $sinDano = Evento:: where('gravedad','SIN DAÑO')
            ->whereYear('created_at',$anio)
            ->count();

        $bajo = Evento:: where('gravedad','BAJO')
            ->whereYear('created_at',$anio)
            ->count();

        $moderado = Evento:: where('gravedad','MODERADO')
            ->whereYear('created_at',$anio)
            ->count();

        $grave = Evento:: where('gravedad','GRAVE')
            ->whereYear('created_at',$anio)
            ->count();

        $muerte = Evento:: where('gravedad','MUERTE')
            ->whereYear('created_at',$anio)
            ->count();

        // ------------------------------ PERSONA DIRECTAMETE INVOLUCRADA ---------------------------------------

        $PDIAdministrativo = Evento:: where('persona_involucrada','ADMINISTRATIVO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDICamillero = Evento:: where('persona_involucrada','CAMILLERO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIEnfermeria = Evento:: where('persona_involucrada','ENFERMERÍA')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIMedico = Evento:: where('persona_involucrada','MEDICO')
            ->whereYear('fecha_hora',$anio)
            ->count();
        
        $PDINutriologo = Evento:: where('persona_involucrada','NUTRIOLOGO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIOdontologo = Evento:: where('persona_involucrada','ODONTOLOGO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIOtro = Evento:: where('persona_involucrada','OTRO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIPersonalEnFormacion = Evento:: where('persona_involucrada','PERSONAL EN FORMACIÓN')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIQuimico = Evento:: where('persona_involucrada','QUIMICO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        $PDIRadiologo = Evento:: where('persona_involucrada','RADIOLOGO')
            ->whereYear('fecha_hora',$anio)
            ->count();

        // ------------------------------ POR NIVEL DE UNIDAD ---------------------------------------

        $primerNivel = Evento:: where('nivel',1)
            ->whereYear('fecha_hora',$anio)
            ->count();

        $segundoNivel = Evento:: where('nivel',2)
            ->whereYear('fecha_hora',$anio)
            ->count();

        $tercerNivel = Evento:: where('nivel',3)
            ->whereYear('fecha_hora',$anio)
            ->count();

        // --------------------------- PASAMOS TODOS LOS VALORES A LA VISTA -----------------------

        $anio = Carbon::now()->year;

        $datosPorTipo = [
            'Adverso' => [],
            'Cuasifalla' => [],
            'Centinela' => []
        ];

        foreach ([
            'Adverso' => 'EVENTO ADVERSO',
            'Cuasifalla' => 'CUASI-FALLA',
            'Centinela' => 'EVENTO CENTINELA'
        ] as $clave => $tipo) {
            for ($mes = 1; $mes <= 12; $mes++) {
                $datosPorTipo[$clave][] = Evento::whereYear('created_at', $anio)
                    ->whereMonth('created_at', $mes)
                    ->where('clasificacion_del_evento', $tipo)
                    ->count();
            }
        }


        

        return view('home', compact(
            'datosPorTipo',
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

            'almacen',
            'cendis',
            'ceye',
            'consultaExterna',
            'dental',
            'farmacia',
            'hospitalizacion',
            'imagenologia',
            'laboratorio',
            'medicinaPreventiva',
            'nutricion',
            'patologia',
            'quirofano',
            'saludReproductiva',
            'tococirugia',
            'UCIAdultos',
            'UCINeonatales',
            'UCIPediatricos',
            'urgencias',

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

            'tipoAESP',      
            'tipoMMU',
            'tipoPCI',
            'tipoDEB',
            'tipoACC',
            'tipoPFR',
            'tipoSAP',
            'tipoNUT' ,       
            'tipoASC',
            'tipoMCI',
            'tipoOTRO',

            'sinDano', 
            'bajo',
            'moderado',
            'grave',
            'muerte',

            'PDIAdministrativo',
            'PDICamillero',
            'PDIEnfermeria',
            'PDIMedico',      
            'PDINutriologo',
            'PDIOdontologo',
            'PDIOtro',
            'PDIPersonalEnFormacion',
            'PDIQuimico',
            'PDIRadiologo',

            'primerNivel',
            'segundoNivel',
            'tercerNivel',
        ));
    }
}
