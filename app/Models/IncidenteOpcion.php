<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenteOpcion extends Model
{
    use HasFactory;

    protected $table = 'incidente_opciones';
    protected $fillable = ['opcion', 'relacion'];
}
