<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            
            $table->string('clasificacion_del_evento');
            $table->string('unidad');
            $table->integer('jurisdiccion');
            $table->string('edad');
            $table->string('sexo');
            $table->string('servicio');
            $table->string('turno');
            $table->datetime('fecha_hora');
            $table->string('persona_involucrada');
            $table->string('persona_involucrada_otro');
            $table->string('persona_testigos');
            $table->string('persona_testigos_otro');
            $table->text('descripcion');
            $table->string('nombre');
            $table->string('area');
            $table->string('incidente_categoria');
            $table->string('gravedad');
            $table->string('causa_raiz');
            $table->string('factores_incidente_uno');
            $table->string('factores_incidente_dos');
            $table->string('factores_incidente_tres');
            $table->string('factores_incidente_cuatro');
            $table->string('factores_incidente_cinco');
            $table->string('factores_incidente_seis');
            $table->string('factores_incidente_siete');
            $table->string('factores_incidente_ocho');
            $table->string('factores_paciente');
            $table->string('factores_indicadores');
            $table->string('factores_falta');
            $table->string('evitar_evento');
            $table->string('como_evitar_evento');
            $table->string('proporciono_informacion');
            $table->string('quien_proporciono');
            $table->string('acciones_mejora');
            $table->string('acciones_mejora_uno');
            $table->string('acciones_mejora_dos');
            $table->string('acciones_mejora_tres');
            $table->string('acciones_mejora_cuatro');
            $table->string('acciones_mejora_cinco');
            $table->string('acciones_mejora_seis');
            $table->string('acciones_mejora_siete');
            $table->string('acciones_mejora_ocho');
            $table->string('acciones_mejora_nueve');
            $table->string('folio');
            $table->string('fecha_registro');
            $table->string('status');
            $table->string('sesiono_comite');
            $table->string('categoria');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
