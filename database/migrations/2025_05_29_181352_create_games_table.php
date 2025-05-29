<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tournament_id');
        $table->string('player1');
        $table->string('player2');
        $table->timestamps();

        $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
