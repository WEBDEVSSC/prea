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
        Schema::dropIfExists('correos');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Si deseas revertir la migración, puedes volver a crear la tabla en este método (opcional)
        Schema::create('correos', function (Blueprint $table) {
            $table->id();
            $table->string('correo');
            $table->timestamps();
        });
    }
};
