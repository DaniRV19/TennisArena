<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{

use App\Models\Game;
use Illuminate\Http\Request;

public function store(Request $request)
{
    $validated = $request->validate([
        'tournament_id' => 'required|exists:tournaments,id',
        'player1' => 'required|string',
        'player2' => 'required|string',
        'score1' => 'required|integer',
        'score2' => 'required|integer',
    ]);

    $game = Game::create($validated);

    return response()->json(['message' => 'Guardado OK', 'game' => $game]);
}


}
