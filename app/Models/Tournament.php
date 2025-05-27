<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'location', 'max_players'];


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }


    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'tournament_user')->withTimestamps();
    }


}
