<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExternalParticipant;

class TournamentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'max_players' => 'required|integer|min:2',
        ]);

        Tournament::create($request->all());

        return redirect()->route('dashboards.dashboard')->with('success', 'Torneo creado correctamente.');
    }


    public function show($id)
    {
        $tournament = Tournament::with('users')->withCount('users')->findOrFail($id);
        $isRegistered = $tournament->users->contains(auth()->id());
        $isFull = $tournament->users_count >= $tournament->max_players;

        return view('tournaments.show', compact('tournament', 'isRegistered', 'isFull'));
    }

    public function join($id)
    {
        $tournament = Tournament::withCount('users')->findOrFail($id);
        
        if ($tournament->users->contains(auth()->id())) {
            return back()->with('info', 'Ya estás inscrito en este torneo.');
        }

        if ($tournament->users_count >= $tournament->max_players) {
            return back()->with('error', 'Este torneo ya está lleno.');
        }

        $tournament->users()->attach(auth()->id());
        return redirect()->route('tournaments.show', $id)->with('success', '¡Inscripción completada!');
    }


    public function leave($id)
    {
        $tournament = Tournament::findOrFail($id);

        $tournament->users()->detach(Auth::id());

        return redirect()->route('tournaments.show', $id)->with('success', 'Has cancelado tu inscripción.');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->back()->with('success', 'Torneo eliminado correctamente.');
    }


}
