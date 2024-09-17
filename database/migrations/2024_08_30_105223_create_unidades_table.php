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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id(); // Campo ID autoincrementable
            $table->text('clues'); // Campo CLUES (texto)
            $table->integer('jurisdiccion'); // Campo Jurisdicción (numérico)
            $table->string('nombre'); // Campo Nombre (texto)
            $table->integer('categoria'); // Campo Categoría (numérico)
            $table->timestamps(); // Campos de timestamp (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
