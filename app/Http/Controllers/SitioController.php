<?php

namespace App\Http\Controllers;

use App\Mail\EventoCentinela;
use App\Models\Correo;
use App\Models\Evento;
use App\Models\IncidenteCategoria;
use App\Models\IncidenteOpcion;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SitioController extends Controller
{
    /**
     * Llenamos el select de categorias
     */
    public function getCategorias()
    {
        $categorias = IncidenteCategoria::all();
        return response()->json($categorias);
    }

    /**
     * Llenamos el select de opciones de la categoria
     */
    public function getOpciones($categoria_id)
    {
        $opciones = IncidenteOpcion::where('relacion', $categoria_id)->get();
        return response()->json($opciones);
    }

    /**
     * Llenamos el select de unidades
     */
    public function getUnidades()
    {
        $unidades = Unidad::all();
        return response()->json($unidades);
    }
    
    /**
     * Mostramos el formualario publico
     */
    public function create()
    {
        // Retornamos la vista WELCOME con el formulario publico
        return view('welcome');
    }

    /**
     * Cargamos los datos y los registramos en la DB
     */
    public function store(Request $request)
    {
        $request->validate([
            'clasificacion_del_evento'=>'required',
            'unidad'=>'required',
            'edad'=>'required|integer',
            'sexo'=>'required',
            'servicio'=>'required',
            'turno'=>'required',
            'fecha_hora' => 'required|date_format:Y-m-d\TH:i',
            'persona_involucrada'=>'required',
            'persona_involucrada_otro'=>'string|nullable',
            'persona_testigos'=>'required',
            'persona_testigos_otro'=>'string|nullable',
            'descripcion' => 'required|string',
            'categoria'=>'required',
            'opcion'=>'required',
            'gravedad'=>'required',
            'factores_incidente_uno' => 'required_without_all:factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_dos' => 'required_without_all:factores_incidente_uno,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_tres' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_cuatro' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_cinco' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_seis' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_siete',
            'factores_incidente_siete' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis',
            'evitar_evento'=>'required',
            'como_evitar_evento' => 'required|string',
            'proporciono_informacion'=>'required',
            'quien_proporciono'=>'required',
            'acciones_mejora'=>'required',
            'acciones_mejora_uno' => 'required_without_all:acciones_mejora_dos,acciones_mejora_tres,acciones_mejora_cuatro,acciones_mejora_cinco,acciones_mejora_seis,acciones_mejora_siete,acciones_mejora_ocho',
            'acciones_mejora_dos' => 'required_without_all:acciones_mejora_uno,acciones_mejora_tres,acciones_mejora_cuatro,acciones_mejora_cinco,acciones_mejora_seis,acciones_mejora_siete,acciones_mejora_ocho',
            'acciones_mejora_tres' => 'required_without_all:acciones_mejora_uno,acciones_mejora_dos,acciones_mejora_cuatro,acciones_mejora_cinco,acciones_mejora_seis,acciones_mejora_siete,acciones_mejora_ocho',
            'acciones_mejora_cuatro' => 'required_without_all:acciones_mejora_uno,acciones_mejora_dos,acciones_mejora_tres,acciones_mejora_cinco,acciones_mejora_seis,acciones_mejora_siete,acciones_mejora_ocho',
            'acciones_mejora_cinco' => 'required_without_all:acciones_mejora_uno,acciones_mejora_dos,acciones_mejora_tres,acciones_mejora_cuatro,acciones_mejora_seis,acciones_mejora_siete,acciones_mejora_ocho',
            'acciones_mejora_seis' => 'required_without_all:acciones_mejora_uno,acciones_mejora_dos,acciones_mejora_tres,acciones_mejora_cuatro,acciones_mejora_cinco,acciones_mejora_siete,acciones_mejora_ocho',
            'acciones_mejora_siete' => 'required_without_all:acciones_mejora_uno,acciones_mejora_dos,acciones_mejora_tres,acciones_mejora_cuatro,acciones_mejora_cinco,acciones_mejora_seis,acciones_mejora_ocho',
            'acciones_mejora_ocho' => 'required_without_all:acciones_mejora_uno,acciones_mejora_dos,acciones_mejora_tres,acciones_mejora_cuatro,acciones_mejora_cinco,acciones_mejora_seis,acciones_mejora_siete',
        ], [
            'clasificacion_del_evento.required' => 'El campo de clasificación del evento es obligatorio.',
            'unidad.required' => 'El campo unidad es obligatorio.',
            'edad.required' => 'El campo edad es obligatorio.',
            'edad.required' => 'El campo edad es obligatorio.',
            'edad.integer' => 'El campo edad debe ser un número.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'servicio.required' => 'Debe seleccionar un lugar o area',
            'turno.required' => 'Debe seleccionar un turno',
            'fecha_hora.required' => 'El campo fecha y hora es obligatorio.',
            'fecha_hora.date_format' => 'El formato de la fecha y hora no es válido. Debe ser YYYY-MM-DDTHH:MM.',
            'persona_involucrada.required' => 'Debe seleccionar una opción',
            'persona_testigos.required' => 'Debe seleccionar una opción',
            'descripcion.required' => 'La descripción del evento es necesaria',
            'categoria.required' => 'Es necesario seleccionar una categoria',
            'opcion.required' => 'Es necesario seleccionar una opcion',
            'gravedad.required' => 'Es necesario seleccionar una opción',
            'factores_incidente_uno.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'factores_incidente_dos.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'factores_incidente_tres.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'factores_incidente_cuatro.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'factores_incidente_cinco.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'factores_incidente_seis.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'factores_incidente_siete.required_without_all' => 'Debe seleccionar al menos un factor que haya contribuido al incidente.',
            'evitar_evento.required' => 'Debe seleccionar una opción.',
            'como_evitar_evento.required' => 'Debe ingresar un comentario.',
            'proporciono_informacion.required' => 'Debe seleccionar una opción.',
            'quien_proporciono.required' => 'Debe seleccionar una opción.',
            'acciones_mejora.required' => 'Debe seleccionar una opción.',
            'acciones_mejora_uno.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_dos.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_tres.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_cuatro.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_cinco.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_seis.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_siete.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
            'acciones_mejora_ocho.required_without_all' => 'Debe seleccionar al menos una acción de mejor.',
        ]);

        $causaRaiz = "NO";
        $sesionoComite = "NO";

        // Consultamos el clues de la unidad
        $unidad = Unidad::find($request->unidad);
        $unidadClues = $unidad->clues;
        $unidadJurisdiccion = $unidad->jurisdiccion;
        $unidadCategoria = $unidad->categoria;
        $unidadNombre = $unidad->nombre;

        // Generamos el folio

        $numeroFolio = mt_rand(0000, 9999);

        $folio = "SSC-EA-".$unidadClues."-".$numeroFolio;

        // Generamos el status

        $status = "NUEVO";

        // Creamos una instancia con el modelo evento y asignamos los valores a cada campo
        $evento = new Evento();
        $evento -> clasificacion_del_evento = $request->clasificacion_del_evento;
        $evento -> unidad = $unidadClues;
        $evento -> unidad_nombre = $unidadNombre;
        $evento -> jurisdiccion = $unidadJurisdiccion;
        $evento -> edad = $request->edad;
        $evento -> sexo = $request->sexo;
        $evento -> servicio = $request->servicio;
        $evento -> turno = $request->turno;
        $evento -> fecha_hora = $request->fecha_hora;
        $evento -> persona_involucrada = $request->persona_involucrada;
        $evento -> persona_involucrada_otro = $request->persona_involucrada_otro;
        $evento -> persona_testigos = $request->persona_testigos;
        $evento -> persona_testigos_otro = $request->persona_testigos_otro;
        $evento -> descripcion = $request->descripcion;
        $evento -> incidente_categoria = $request->categoria;
        $evento -> incidente_descripcion = $request->opcion;
        $evento -> gravedad = $request->gravedad;
        $evento -> causa_raiz = $causaRaiz;
        $evento -> factores_incidente_uno = $request->factores_incidente_uno;
        $evento -> factores_incidente_dos = $request->factores_incidente_dos;
        $evento -> factores_incidente_tres = $request->factores_incidente_tres;
        $evento -> factores_incidente_cuatro = $request->factores_incidente_cuatro;
        $evento -> factores_incidente_cinco = $request->factores_incidente_cinco;
        $evento -> factores_incidente_seis = $request->factores_incidente_seis;
        $evento -> factores_incidente_siete = $request->factores_incidente_siete;
        $evento -> factores_incidente_ocho = $request->factores_incidente_ocho;
        $evento -> evitar_evento = $request->evitar_evento;
        $evento -> como_evitar_evento = $request->como_evitar_evento;
        $evento -> proporciono_informacion = $request->proporciono_informacion;
        $evento -> quien_proporciono = $request->quien_proporciono;
        $evento -> acciones_mejora = $request->acciones_mejora;
        $evento -> acciones_mejora_uno = $request->acciones_mejora_uno;
        $evento -> acciones_mejora_dos = $request->acciones_mejora_dos;
        $evento -> acciones_mejora_tres = $request->acciones_mejora_tres;
        $evento -> acciones_mejora_cuatro = $request->acciones_mejora_cuatro;
        $evento -> acciones_mejora_cinco = $request->acciones_mejora_cinco;
        $evento -> acciones_mejora_seis = $request->acciones_mejora_seis;
        $evento -> acciones_mejora_siete = $request->acciones_mejora_siete;
        $evento -> acciones_mejora_ocho = $request->acciones_mejora_ocho;
        $evento -> folio = $folio;
        $evento -> status = $status;
        $evento -> sesiono_comite = $sesionoComite;
        $evento -> categoria = $unidadCategoria;

        // Guardamos el registro
        $evento->save();

        // Verificar la clasificación del evento
        if ($request->clasificacion_del_evento === 'EVENTO CENTINELA') {

            // Obtenemos todos los correos de la tabla Correos
            $correos = Correo::all()->pluck('correo')->toArray();
            
            // Enviamos el correo de confirmacion
            Mail::to($correos)->send(new EventoCentinela($folio));
        }

        // Redireccionamos con el evento 
        return redirect()->route('create')->with('success', 'Folio : '.$folio);
    }
}
