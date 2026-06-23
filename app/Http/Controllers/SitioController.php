<?php

namespace App\Http\Controllers;

use App\Mail\adversoMail;
use App\Mail\cuasiFallaMail;
use App\Mail\eventoCentinelaMail;
use App\Models\Correo;
use App\Models\Evento;
use App\Models\IncidenteCategoria;
use App\Models\IncidenteOpcion;
use App\Models\Unidad;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
        $unidades = Unidad::orderBy('nombre', 'asc')->get();
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
            'g-recaptcha-response' => 'required',
            'clasificacion_del_evento'=>'required',
            'unidad'=>'required',
            'edad'=>'required|integer|max_digits:2',
            'sexo'=>'required',
            'servicio'=>'required',
            'turno'=>'required',
            'fecha_hora' => 'required|date_format:Y-m-d\TH:i',
            'persona_involucrada'=>'required',
            'persona_involucrada_otro'=>'string|nullable|max:100',
            'persona_testigos'=>'required',
            'persona_testigos_otro'=>'string|nullable|max:100',
            'descripcion' => 'required|string|max:1500',

            'categoria' => 'required|string',
            'opcion'=>'required|string',
            'incidente_otro' => 'required_if:categoria,OTRO INCIDENTE|string|max:250',

            'gravedad'=>'required',

            'factores_incidente_uno' => 'required_without_all:factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_dos' => 'required_without_all:factores_incidente_uno,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_tres' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_cuatro' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_cinco' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_seis,factores_incidente_siete',
            'factores_incidente_seis' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_siete',
            'factores_incidente_siete' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis',
            'factores_incidente_ocho' => 'required_without_all:factores_incidente_uno,factores_incidente_dos,factores_incidente_tres,factores_incidente_cuatro,factores_incidente_cinco,factores_incidente_seis,factores_incidente_siete',

            'evitar_evento'=>'required',
            'como_evitar_evento' => 'required|string|max:250',
            'proporciono_informacion'=>'required',
            'quien_proporciono'=>'required',
        ], [
            'clasificacion_del_evento.required' => 'La clasificación del evento es obligatoria.',

            'unidad.required' => 'La unidad es obligatoria.',

            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.max_digits' => 'La edad no puede tener más de 2 dígitos.',

            'sexo.required' => 'El sexo es obligatorio.',

            'servicio.required' => 'El servicio es obligatorio.',

            'turno.required' => 'El turno es obligatorio.',

            'fecha_hora.required' => 'La fecha y hora son obligatorias.',
            'fecha_hora.date_format' => 'La fecha y hora deben tener el formato correcto.',

            'persona_involucrada.required' => 'Debe seleccionar quién estuvo involucrado.',

            'persona_involucrada_otro.string' => 'El campo "Otro (persona involucrada)" debe ser texto.',
            'persona_involucrada_otro.max' => 'El campo "Otro (persona involucrada)" no debe exceder 255 caracteres.',

            'persona_testigos.required' => 'Debe indicar si hubo testigos.',

            'persona_testigos_otro.string' => 'El campo "Otro (testigos)" debe ser texto.',
            'persona_testigos_otro.max' => 'El campo "Otro (testigos)" no debe exceder 255 caracteres.',

            'descripcion.required' => 'La descripción del incidente es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',
            'descripcion.max' => 'La descripción no debe exceder 1000 caracteres.',

            'categoria.required' => 'La categoría es obligatoria.',
            'categoria.string' => 'La categoría debe ser texto.',

            'opcion.required' => 'Debe seleccionar una opción.',
            'opcion.string' => 'La opción debe ser texto.',

            'incidente_otro.required_if' => 'Debe especificar el incidente cuando selecciona "OTRO INCIDENTE".',
            'incidente_otro.string' => 'El campo "Otro incidente" debe ser texto.',
            'incidente_otro.max' => 'El campo "Otro incidente" no debe exceder 255 caracteres.',

            'gravedad.required' => 'La gravedad del incidente es obligatoria.',

            'factores_incidente_uno.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_dos.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_tres.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_cuatro.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_cinco.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_seis.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_siete.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',
            'factores_incidente_ocho.required_without_all' => 'Debe seleccionar al menos un factor del incidente.',

            'evitar_evento.required' => 'Debe indicar si es posible evitar el evento.',

            'como_evitar_evento.required' => 'Debe describir cómo evitar el evento.',
            'como_evitar_evento.string' => 'El campo debe ser texto.',
            'como_evitar_evento.max' => 'El campo no debe exceder 100 caracteres.',

            'proporciono_informacion.required' => 'Debe indicar si se proporcionó información.',

            'quien_proporciono.required' => 'Debe indicar quién proporcionó la información.',

            'g-recaptcha-response.required' => 'Por favor verifica que no eres un robot.',
            'g-recaptcha-response.captcha' => 'La verificación del reCAPTCHA falló. Inténtalo de nuevo.'
        ]);

        // Validacion manual para recaptcha
        $recaptcha = Http::withoutVerifying()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => env('RECAPTCHA_SECRET'),
                'response' => $request->input('g-recaptcha-response'),
            ]
        );

        $result = $recaptcha->json();

        if (($result['success'] ?? false) !== true) {
            return back()->withErrors([
                'captcha' => 'Error en validación reCAPTCHA'
            ]);
        }

        // Consultamos el clues de la unidad
        $unidad = Unidad::findOrFail($request->unidad);
        $unidadClues = $unidad->clues;
        $unidadJurisdiccion = $unidad->jurisdiccion;
        $unidadCategoria = $unidad->categoria;
        $unidadNombre = $unidad->nombre;
        $unidadNivel = $unidad->nivel;

        // SSC-PREA-CLUES-CONSECUTIVO

        $maxConsecutivo = Evento::whereYear('created_at', Carbon::now()->year)
                                    ->max('consecutivo');

        // Agregamos la viarbiable en caso de que cambie de año el folio sea 1
        $consecutivo = ($maxConsecutivo ?? 0) + 1;

        $numeroFormateado = str_pad($consecutivo, 4, '0', STR_PAD_LEFT);

        // Generamos el folio
        $folio = "SSC-PREA-".$unidadClues."-".$numeroFormateado;

        // Generamos el status
        $status = "NUEVO";

        // Ajustamos el campo

        // Consultamos los datos de categorias
        $categoriaLabel = IncidenteCategoria::findOrFail($request->categoria);
        $categoriaNombre = $categoriaLabel->categoria;

        // Consultamos los datos de la descripcion
        $opcionLabel = IncidenteOpcion::findOrFail($request->opcion);

        // Creamos una instancia con el modelo evento y asignamos los valores a cada campo
        $evento = new Evento();

        $evento -> clasificacion_del_evento = $request->clasificacion_del_evento;

        $evento -> unidad = $unidadClues;
        $evento -> unidad_nombre = $unidadNombre;
        $evento -> jurisdiccion = $unidadJurisdiccion;
        $evento -> nivel = $unidadNivel;

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
        $evento -> incidente_categoria_label = $categoriaLabel->categoria;
        $evento -> incidente_descripcion = $request->opcion;
        $evento -> incidente_descripcion_label = $opcionLabel->opcion;
        $evento -> incidente_otro = $request->incidente_otro;

        $evento -> gravedad = $request->gravedad;

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

        $evento -> folio = $folio;
        $evento -> consecutivo = $consecutivo;
        $evento -> status = $status;

        $evento -> categoria = $unidadCategoria;

        // Guardamos el registro
        $evento->save();

        // Verificar la clasificación del evento para "CUASIFALLA"
        if ($request->clasificacion_del_evento === 'CUASI-FALLA') {

            // Obtenemos todos los usuarios que acepten el correo de ADVERSOS
            $correos = User::where('cuasifalla', 1)->pluck('email')->toArray();
            
            // Enviamos el correo de confirmación para Evento Adverso
            Mail::to($correos)->send(new cuasiFallaMail($folio, $unidadNombre,$categoriaNombre));

        }

            // Verificar la clasificación del evento para "EVENTO ADVERSO"
        if ($request->clasificacion_del_evento === 'EVENTO ADVERSO') {

            // Obtenemos todos los usuarios que acepten el correo de ADVERSOS
            $correos = User::where('adverso', 1)->pluck('email')->toArray();
            //$correos = ['soportewebssc@gmail.com'];

            // Enviamos el correo de confirmación para Evento Adverso
            Mail::to($correos)->send(new adversoMail($folio, $unidadNombre,$categoriaNombre));

        }

        // Verificar la clasificación del evento
        if ($request->clasificacion_del_evento === 'EVENTO CENTINELA') {

            // Obtenemos todos los usuarios que acepten el correo de ADVERSOS
            $correos = User::where('centinela', 1)->pluck('email')->toArray();

            // Enviamos el correo de confirmacion
            Mail::to($correos)->send(new eventoCentinelaMail($folio, $unidadNombre,$categoriaNombre));

        }

        // Reidreccionamos a la vista
        return redirect()
            ->route('create')
            ->withSuccess("Folio generado: {$folio}");
    }
}
