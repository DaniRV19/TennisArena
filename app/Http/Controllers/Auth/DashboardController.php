?<?php

public function index()
{
    $user = Auth::user();
    $tournamentCount = $user->tournaments()->count(); // Asume relación definida
    $wins = $user->wins ?? 0;
    $points = $user->points ?? 0;
    $upcomingTournaments = $user->tournaments()->where('date', '>=', now())->orderBy('date')->take(5)->get();
    $nextTournamentDate = optional($upcomingTournaments->first())->date;

    return view('dashboards.dashboard', compact('user', 'tournamentCount', 'wins', 'points', 'upcomingTournaments', 'nextTournamentDate'));
}
