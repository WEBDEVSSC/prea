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
            $table->integer('bot_cuasifalla')->default(0)->after('chat_id');
            $table->integer('bot_adverso')->default(0)->after('bot_cuasifalla');
            $table->integer('bot_centinela')->default(0)->after('bot_adverso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['bot_cuasifalla', 'bot_adverso', 'bot_centinela']);
        });
    }
};
