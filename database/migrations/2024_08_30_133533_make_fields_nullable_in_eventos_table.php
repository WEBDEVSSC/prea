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
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('edad')->nullable()->change();
            $table->string('sexo')->nullable()->change();
            $table->string('persona_involucrada_otro')->nullable()->change();
            $table->string('persona_testigos_otro')->nullable()->change();
            $table->string('factores_incidente_uno')->nullable()->change();
            $table->string('factores_incidente_dos')->nullable()->change();
            $table->string('factores_incidente_tres')->nullable()->change();
            $table->string('factores_incidente_cuatro')->nullable()->change();
            $table->string('factores_incidente_cinco')->nullable()->change();
            $table->string('factores_incidente_seis')->nullable()->change();
            $table->string('factores_incidente_siete')->nullable()->change();
            $table->string('factores_incidente_ocho')->nullable()->change();
            $table->string('como_evitar_evento')->nullable()->change();
            $table->string('acciones_mejora_uno')->nullable()->change();
            $table->string('acciones_mejora_dos')->nullable()->change();
            $table->string('acciones_mejora_tres')->nullable()->change();
            $table->string('acciones_mejora_cuatro')->nullable()->change();
            $table->string('acciones_mejora_cinco')->nullable()->change();
            $table->string('acciones_mejora_seis')->nullable()->change();
            $table->string('acciones_mejora_siete')->nullable()->change();
            $table->string('acciones_mejora_ocho')->nullable()->change();
            $table->string('acciones_mejora_nueve')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('edad')->nullable(false)->change();
            $table->string('sexo')->nullable(false)->change();
            $table->string('persona_involucrada_otro')->nullable(false)->change();
            $table->string('persona_testigos_otro')->nullable(false)->change();
            $table->string('factores_incidente_uno')->nullable(false)->change();
            $table->string('factores_incidente_dos')->nullable(false)->change();
            $table->string('factores_incidente_tres')->nullable(false)->change();
            $table->string('factores_incidente_cuatro')->nullable(false)->change();
            $table->string('factores_incidente_cinco')->nullable(false)->change();
            $table->string('factores_incidente_seis')->nullable(false)->change();
            $table->string('factores_incidente_siete')->nullable(false)->change();
            $table->string('factores_incidente_ocho')->nullable(false)->change();
            $table->string('como_evitar_evento')->nullable(false)->change();
            $table->string('acciones_mejora_uno')->nullable(false)->change();
            $table->string('acciones_mejora_dos')->nullable(false)->change();
            $table->string('acciones_mejora_tres')->nullable(false)->change();
            $table->string('acciones_mejora_cuatro')->nullable(false)->change();
            $table->string('acciones_mejora_cinco')->nullable(false)->change();
            $table->string('acciones_mejora_seis')->nullable(false)->change();
            $table->string('acciones_mejora_siete')->nullable(false)->change();
            $table->string('acciones_mejora_ocho')->nullable(false)->change();
            $table->string('acciones_mejora_nueve')->nullable(false)->change();
        });
    }
};
