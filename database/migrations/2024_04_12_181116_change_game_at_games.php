<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dateTime('game_at')->nullable(false)->change();
            $table->string('score')->nullable(false)->change();
            $table->string('opponent')->nullable(false)->change();
            $table->string('place')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->timestamp('game_at')->nullable()->change();
            $table->string('score')->nullable()->change();
            $table->string('opponent')->nullable()->change();
            $table->string('place')->nullable()->change();
        });
    }
};
