<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['tournament_id', 'player1', 'player2', 'score1', 'score2'];

}
