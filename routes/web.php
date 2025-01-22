<?php

use App\Http\Controllers\AnioController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UserController;

/**
 * 
 * 
 * SITIO CONTROLLER - CONTROLADOR PARA LOS RECURSOS PUBLICOS
 * 
 * 
 */

// Mostramos el formulario al entrar a la aplicacion
Route::get('/', [SitioController::class,'create'])->name('create');

// Registramos los datos del formulario
Route::post('/store',[SitioController::class,'store'])->name('store');

// Llenamos el select de UNIDADES
Route::get('/unidades', [SitioController::class, 'getUnidades'])->name('unidades');

// Llenamos el select de CATEGORIAS
Route::get('/incidentes/categorias', [SitioController::class, 'getCategorias'])->name('incidentes.categorias');

// Llenamos el select de OPTIONES de CATEGORIAS
Route::get('/incidentes/opciones/{categoria_id}', [SitioController::class, 'getOpciones'])->name('incidentes.opciones');


/**
 * 
 * 
 * 
 * 
 * 
 */

// Deshabilitar la ruta de registro
Auth::routes([
    'register' => false,
    'reset' => false,
    'email' => false
]);

// Redirigir manualmente a la página de login si alguien accede a /register
Route::get('/register', function () {
    return redirect()->route('login'); 
});

Route::get('/password/reset', function () {
    return redirect()->route('login'); 
});

Route::get('/password/email', function () {
    return redirect()->route('login'); 
});


// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    /**
     * 
     * 
     * DASHBOARD
     * 
     * 
     */

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /**
     * 
     * 
     * MODULO DE UNIDADES
     * 
     * 
     */

    //Ruta para mostra la lista de las unidades
    Route::get('admin/unidadIndex',[UnidadController::class,'index'])->name('unidadIndex');

    //Ruta para mostrar el formulario de creacion de registros
    Route::get('admin/unidadCreate',[UnidadController::class,'create'])->name('unidadCreate');

    //Ruta para almacenar el registro en la DB
    Route::post('admin/unidadStore',[UnidadController::class,'store'])->name('unidadStore');

    //Ruta para mostrar el formulario de edicion de unidad
    Route::get('admin/unidadEdit/{id}',[UnidadController::class,'edit'])->name('unidadEdit');

    //Ruta para actualizar los campos en la DB
    Route::put('admin/unidadUpdate/{id}',[UnidadController::class,'update'])->name('unidadUpdate');

    //Ruta oara eliminar un registro de la DB
    Route::get('admin/unidadDestroy/{id}',[UnidadController::class,'destroy'])->name('unidadDestroy');

    // Ruta para mostrar los detalles
    Route::get('admin/unidadShow/{id}',[UnidadController::class,'show'])->name('unidadShow');

    /**
     * 
     * 
     * MODULO DE MIS UNIDADES ( SE MUESTRA UNA LISTA DE LAS UNIDADES QUE PUEDE VER EL USUARIO )
     * 
     * 
     */

     Route::get('admin/misUnidadesIndex',[UnidadController::class,'misUnidades'])->name('misUnidades');

    /**
     * 
     * 
     * MODULO DE USUARIOS
     * 
     * 
     */

    // Ruta para mostrar la lista de usuarios
    Route::get('admin/usuarioIndex',[UserController::class,'index'])->name('usuarioIndex');

    // Ruta para mostrar el formulario de creacion de registros
    Route::get('admin/usuarioCreate',[UserController::class,'create'])->name('usuarioCreate');

    // Ruta para guardar el registro en la db
    Route::post('admin/usuarioStore',[UserController::class,'store'])->name('usuarioStore');

    // Ruta para editar un registro de usuario
    Route::get('admin/usuarioEdit/{id}',[UserController::class,'edit'])->name('usuarioEdit');

    // Ruta para actualiza registros
    Route::put('admin/usuariosUpdate/{id}',[UserController::class,'update'])->name('usuariosUpdate');

    // Ruta para mostrar los detalles de un registro
    Route::get('admin/usuarioShow/{id}',[UserController::class,'show'])->name('usuarioShow');

    /**
    * 
    *
    * MODULO DE EVENTOS
    *
    *
    */

    // Ruta para mostra todos los eventos en la base de datos ADMINISTRADOR
    Route::get('admin/eventoIndex',[EventoController::class,'index'])->name('eventoIndex');

    // Ruta para mostrar los detalles del evento
    Route::get('admin/eventoShow/{id}',[EventoController::class,'show'])->name('eventoShow');

    // Ruta para mostrar todos los eventos en la base de datos JURISDICCION
    Route::get('admin/eventoJurisdiccion',[EventoController::class,'jurisdiccion'])->name('eventoJurisdiccion');

    // Ruta para generar el PDF
    Route::get('admin/eventoPDF/{id}',[EventoController::class,'pdf'])->name('eventoPDF');

     /**
     * 
     *
     * MODULO DE REPORTES
     *
     *
     */

    // Ruta para mostrar el formulario de fechas de reporte
    Route::get('admin/reporteIndex',[ReporteController::class,'index'])->name('reporteIndex');

    // Ruta para buscar los datos en la tabla
    Route::post('admin/reporteSearch',[ReporteController::class,'search'])->name('reporteSearch');

    // Ruta para mostrar los resultados
    Route::get('admin/reporteShow',[ReporteController::class,'show'])->name('reporteShow');

    // Ruta para generar un excel
    Route::get('admin/reporteExcel',[ReporteController::class,'reporteExcel'])->name('reporteExcel');

    /**
     * 
     *
     * MODULO DE AÑOS
     *
     *
     */

    Route::get('admin/anio2024',[AnioController::class,'anio2024'])->name('anio2024');  

});

















 


