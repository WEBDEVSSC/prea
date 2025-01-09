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
        Schema::table('users', function (Blueprint $table) {
            // Si el campo tiene valores, puedes manejarlos manualmente en otro script antes del cambio
            $table->string('role')->default('user'); // Agregar el nuevo campo con el nombre actualizado
            $table->dropColumn('rol');              // Eliminar el campo original
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol')->default('user'); // Restaurar el campo original
            $table->dropColumn('role');            // Eliminar el nuevo campo
        });
    }
};
