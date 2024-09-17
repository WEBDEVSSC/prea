<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn(['factores_paciente', 'factores_indicadores', 'factores_falta']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->text('factores_paciente')->nullable();
            $table->text('factores_indicadores')->nullable();
            $table->text('factores_falta')->nullable();
        });
    }
};
