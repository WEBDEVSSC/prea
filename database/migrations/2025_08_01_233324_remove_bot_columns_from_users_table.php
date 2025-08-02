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
            //
            $table->dropColumn(['bot_cuasifalla', 'bot_adverso', 'bot_centinela']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('bot_cuasifalla')->default(false);
            $table->boolean('bot_adverso')->default(false);
            $table->boolean('bot_centinela')->default(false);
        });
    }
};
