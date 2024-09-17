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
            $table->dropColumn('acciones_mejora_ocho');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Si deseas restaurar el campo en caso de revertir la migración, lo puedes agregar nuevamente aquí.
            $table->string('acciones_mejora_ocho')->nullable();
        });
    }
};
