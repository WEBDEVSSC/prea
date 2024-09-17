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
        Schema::table('correos', function (Blueprint $table) {
            $table->string('area')->nullable()->after('correo'); // 'nombre' es una columna existente en la tabla
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('correos', function (Blueprint $table) {
            $table->dropColumn('area');
        });
    }
};
