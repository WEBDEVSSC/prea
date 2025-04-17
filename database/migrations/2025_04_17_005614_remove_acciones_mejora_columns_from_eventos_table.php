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
            //
            $table->dropColumn([
                'acciones_mejora',
                'acciones_mejora_uno',
                'acciones_mejora_dos',
                'acciones_mejora_tres',
                'acciones_mejora_cuatro',
                'acciones_mejora_cinco',
                'acciones_mejora_seis',
                'acciones_mejora_siete',
                'acciones_mejora_ocho',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            //
            $table->text('acciones_mejora')->nullable();
            $table->text('acciones_mejora_uno')->nullable();
            $table->text('acciones_mejora_dos')->nullable();
            $table->text('acciones_mejora_tres')->nullable();
            $table->text('acciones_mejora_cuatro')->nullable();
            $table->text('acciones_mejora_cinco')->nullable();
            $table->text('acciones_mejora_seis')->nullable();
            $table->text('acciones_mejora_siete')->nullable();
            $table->text('acciones_mejora_ocho')->nullable();
        });
    }
};
