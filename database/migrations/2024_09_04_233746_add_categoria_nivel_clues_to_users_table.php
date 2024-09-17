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
            $table->integer('categoria')->nullable(); // Agrega campo categoria como string, opcional
            $table->integer('nivel')->nullable();     // Agrega campo nivel como string, opcional
            $table->string('clues')->nullable();     // Agrega campo clues como string, opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['categoria', 'nivel', 'clues']); // Elimina los campos si se revierte la migración
        });
    }
};
