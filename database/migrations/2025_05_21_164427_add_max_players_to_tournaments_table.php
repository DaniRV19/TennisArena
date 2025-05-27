<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxPlayersToTournamentsTable extends Migration
{

    public function up(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->integer('max_players')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropColumn('max_players');
        });
    }
}