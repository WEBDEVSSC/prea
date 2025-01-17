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
            $table->unsignedBigInteger('clues_id')->after('clues');
            $table->unsignedInteger('clues_jurisdiccion')->after('clues_id');
            $table->string('clues_nombre')->after('clues_jurisdiccion');
            $table->unsignedInteger('clues_categoria')->after('clues_nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['clues_id', 'clues_jurisdiccion', 'clues_nombre', 'clues_categoria']);
        });
    }
};
