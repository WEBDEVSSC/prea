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
            $table->boolean('cuasifalla')->default(false)->after('clues'); // Agrega el campo cuasifalla
            $table->boolean('adverso')->default(false)->after('cuasifalla'); // Agrega el campo adverso
            $table->boolean('centinela')->default(false)->after('adverso'); // Agrega el campo centinela
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cuasifalla', 'adverso', 'centinela']); // Elimina los campos si se revierte la migración
        });
    }
};
