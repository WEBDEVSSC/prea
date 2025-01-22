<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\IncidenteCategoria;
use App\Models\IncidenteOpcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Barryvdh\DomPDF\Facade\Pdf;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource. ADMINISTRADOR
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = FacadesAuth::user();

        // Obtenemos la categoria en una variable
        $nivel = $user->nivel;
        $categoria = $user->categoria;
        $unidad = $user->clues;
        
        // Opcion para ADMINISTRADOR 1
        if($nivel == 1){
            
            $anio = 2025;

            // Consultamos todos los registros de la tabla eventos
            $eventos = Evento::whereYear('created_at', $anio)
                ->orderBy('id', 'desc')
                ->get();

        }
        // Opcion para JURISDICCIONES
        elseif($nivel == 2){

            $anio = 2025;

            // Consultamos todos los registros por jurisdiccion
            $eventos = Evento::whereYear('created_at', $anio)
                ->where('categoria',$categoria)
                ->orderBy('id','desc')
                ->get();

        }
        // Opcion para UNIDADES
        else{

            $anio = 2025;
            
            //Consultamos los registros por unidad
            $eventos = Evento::whereYear('created_at', $anio)
                ->where('unidad',$unidad)
                ->orderBy('id','desc')
                ->get();

        }
        
        //Mandamos llamar la vista y pasamos los parametros en un arreglo
        return view('eventos.index',['eventos' => $eventos]);
    }

    /**
     * Display a listing of the resource. JURISDICCION
     */
    public function jurisdiccion()
    {
        // Consultamos todos los registros de la tabla eventos
        $eventos = Evento::orderBy('id', 'desc')->get();

        //Mandamos llamar la vista y pasamos los parametros en un arreglo
        return view('eventos.index',['eventos' => $eventos]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el registro por su ID
        $evento = Evento::find($id);

        // Consultamos la categoria
        $categoria = IncidenteCategoria::find($evento->incidente_categoria);
        $categoria_nombre = $categoria->categoria;

        // Consultamos la descripcion
        $descripcion = IncidenteOpcion::find($evento->incidente_descripcion);
        $descripcion_nombre = $descripcion->opcion;

        // Validamos los factores
        $factorIncidenteUno = ($evento->factores_incidente_uno === 'SI');     
        $factorIncidenteDos = ($evento->factores_incidente_dos === 'SI');     
        $factorIncidenteTres = ($evento->factores_incidente_tres === 'SI');     
        $factorIncidenteCuatro = ($evento->factores_incidente_cuatro === 'SI');     
        $factorIncidenteCinco = ($evento->factores_incidente_cinco === 'SI');     
        $factorIncidenteSeis = ($evento->factores_incidente_seis === 'SI');     
        $factorIncidenteSiete = ($evento->factores_incidente_siete === 'SI');     
        $factorIncidenteOcho = ($evento->factores_incidente_ocho === 'SI');   
        
        // Validamos las acciones de mejora
        $accionMejoraUno = ($evento->acciones_mejora_uno === 'SI');    
        $accionMejoraDos = ($evento->acciones_mejora_dos === 'SI');    
        $accionMejoraTres = ($evento->acciones_mejora_tres === 'SI');    
        $accionMejoraCuatro = ($evento->acciones_mejora_cuatro === 'SI');    
        $accionMejoraCinco = ($evento->acciones_mejora_cinco === 'SI');    
        $accionMejoraSeis = ($evento->acciones_mejora_seis === 'SI');    
        $accionMejoraSiete = ($evento->acciones_mejora_siete === 'SI');    
        $accionMejoraOcho = ($evento->acciones_mejora_ocho === 'SI');    

        // Retornamos la vista con el valor
        return view('eventos.show',[
            'evento'=> $evento,
            'categoria_nombre'=>$categoria_nombre,
            'descripcion_nombre'=>$descripcion_nombre,
            'factorIncidenteUno'=>$factorIncidenteUno,
            'factorIncidenteDos'=>$factorIncidenteDos,
            'factorIncidenteTres'=>$factorIncidenteTres,
            'factorIncidenteCuatro'=>$factorIncidenteCuatro,
            'factorIncidenteCinco'=>$factorIncidenteCinco,
            'factorIncidenteSeis'=>$factorIncidenteSeis,
            'factorIncidenteSiete'=>$factorIncidenteSiete,
            'factorIncidenteOcho'=>$factorIncidenteOcho,
            'accionMejoraUno'=>$accionMejoraUno,
            'accionMejoraDos'=>$accionMejoraDos,
            'accionMejoraTres'=>$accionMejoraTres,
            'accionMejoraCuatro'=>$accionMejoraCuatro,
            'accionMejoraCinco'=>$accionMejoraCinco,
            'accionMejoraSeis'=>$accionMejoraSeis,
            'accionMejoraSiete'=>$accionMejoraSiete,
            'accionMejoraOcho'=>$accionMejoraOcho,
        ]);

    }

    public function pdf($id)
    {
        // Consultamos los datos del evento
        $evento = Evento::findOrFail($id);

        // Cargar la vista y pasarle los datos
        $pdf = PDF::loadView('eventos.pdf', ['evento' => $evento]);

        // Mostramos el PDF generado
        return $pdf->stream('evento_'.$evento->folio.'.pdf');
    }
}
