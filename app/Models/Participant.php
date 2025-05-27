<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['tournament_id', 'name', 'email'];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}