<?php

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

Auth::routes();

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

/**
 * 
 * 
 * 
 * 
 * 
 */

// Mostramos las graficas y el Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Llenamos el select de CATEGORIAS
Route::get('/incidentes/categorias', [IncidenteController::class, 'getCategorias'])->name('incidentes.categorias');

// Llenamos el select de OPTIONES de CATEGORIAS
Route::get('/incidentes/opciones/{categoria_id}', [IncidenteController::class, 'getOpciones'])->name('incidentes.opciones');

// Llenamos el select de UNIDADES
Route::get('/unidades', [IncidenteController::class, 'getUnidades'])->name('unidades');





/**
 * 
 * 
 * MODULO DE TIMBRADO
 * 
 * 
 */

 //Ruta para mostrar todos los registros
Route::get('admin/timbradoIndex',[CorreoController::class,'index'])->name('timbradoIndex');

//Ruta para mostrar el formulario de creacion de registro
Route::get('admin/timbradoCreate',[CorreoController::class,'create'])->name('timbradoCreate');

//Ruta para almacenar un registro en la DB
Route::post('admin/timbradoStore',[CorreoController::class,'store'])->name('timbradoStore');

//Ruta para mostrar el formulario de edicion de registro
Route::get('admin/timbradoEdit/{id}', [CorreoController::class, 'edit'])->name('timbradoEdit');

//Ruta para actualizar los campos en la DB
Route::put('admin/timbradoUpdate/{id}',[CorreoController::class,'update'])->name('timbradoUpdate');

//Ruta para eliminar un registro de la DB
Route::get('admin/timbradoDestroy/{id}',[CorreoController::class,'destroy'])->name('timbradoDestroy');

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