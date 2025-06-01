<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\IncidenteCategoria;
use App\Models\IncidenteOpcion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource. ADMINISTRADOR
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = AutH::user();

        //dd($user->nivel);

        // Obtenemos la categoria en una variable
        $nivel = $user->nivel;
        $categoria = $user->categoria;
        $unidad = $user->clues;
        $anio = Carbon::now()->year;
        
        // Opcion para ADMINISTRADOR 1
        if($nivel == 1){

            // Consultamos todos los registros de la tabla eventos
            $eventos = Evento::whereYear('created_at', $anio)
                ->orderBy('id', 'desc')
                ->get();

        }
        // Opcion para JURISDICCIONES
        elseif($nivel == 2){

            // Consultamos todos los registros por jurisdiccion
            $eventos = Evento::whereYear('created_at', $anio)
                ->where('categoria',$categoria)
                ->orderBy('id','desc')
                ->get();

        }
        // Opcion para UNIDADES
        elseif($nivel == 3){
            
            //Consultamos los registros por unidad
            $eventos = Evento::whereYear('created_at', $anio)
                ->where('unidad',$unidad)
                ->orderBy('id','desc')
                ->get();

        }
        // Opcion para CUANDO NO TENGAN NIVEL
        else{

            abort(403, 'Nivel de acceso no permitido');

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

        // Ruta completa del archivo
        $imagePath = public_path('img/qrcode-salud-coah.png');

        // Leer el contenido de la imagen
        $imageData = base64_encode(file_get_contents($imagePath));

        // Cargar la vista y pasarle los datos
        $pdf = PDF::loadView('eventos.pdf', [
            'evento' => $evento, 
            'imageData' => $imageData
        ]);

        // Mostramos el PDF generado
        return $pdf->stream($evento->folio.'.pdf');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete(); 

        return redirect()->route('eventoIndex')->with('destroy', 'El registro de elimino correctamente');
    }
}
