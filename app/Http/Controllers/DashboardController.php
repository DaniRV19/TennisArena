<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tournaments = Tournament::orderBy('date', 'asc')->get();

        return view('dashboards.dashboard', compact('tournaments'));

        // Asegúrate de tener estos campos/relaciones disponibles
        $tournaments = \App\Models\Tournament::all();
        $tournamentCount = $user->tournaments()->count(); // Relación user-tournaments
        $wins = $user->wins ?? 0;
        $points = $user->points ?? 0;
        $upcomingTournaments = $user->tournaments()->where('date', '>=', now())->orderBy('date')->take(5)->get();
        $nextTournamentDate = optional($upcomingTournaments->first())->date;

        
        

        return view('dashboards.dashboard', compact('user', 'tournamentCount', 'wins', 'points', 'upcomingTournaments', 'nextTournamentDate'));
    }

    public function dashboard()
{
    $tournaments = Tournament::with('users')->get();
    $users = User::all();

    return view('dashboards.dashboard', compact('tournaments', 'users'));
}

}
