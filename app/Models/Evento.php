<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'eventos';

    protected $fillable = [
        'clasificacion_del_evento',
        'unidad',
        'unidad_nombre',
        'jurisdiccion',
        'nivel',
        'edad',
        'sexo',
        'servicio',
        'turno',
        'fecha_hora',
        'persona_involucrada',
        'persona_involucrada_otro',
        'persona_testigos',
        'persona_testigos_otro',
        'descripcion',        
        'incidente_categoria',
        'incidente_categoria_label',
        'incidente_descripcion',
        'incidente_descripcion_label',
        'incidente_otro',
        'gravedad',
        'factores_incidente_uno',
        'factores_incidente_dos',
        'factores_incidente_tres',
        'factores_incidente_cuatro',
        'factores_incidente_cinco',
        'factores_incidente_seis',
        'factores_incidente_siete',
        'factores_incidente_ocho',
        'evitar_evento',
        'como_evitar_evento',
        'proporciono_informacion',
        'quien_proporciono',
        'folio',
        'consecutivo',
        'status',
        'categoria'
    ];
}
