<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tournament;

class TournamentSeeder extends Seeder
{

public function run()
{
    Tournament::create([
        'name' => 'Open Sevilla',
        'date' => now()->addDays(10),
        'location' => 'Sevilla',
        'max_players' => 16
    ]);

    Tournament::create([
        'name' => 'Granada Championship',
        'date' => now()->addDays(20),
        'location' => 'Granada',
        'max_players' => 32
    ]);
}

}
