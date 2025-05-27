<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        $alreadyRegistered = Registration::where('user_id', Auth::id())
            ->where('tournament_id', $request->tournament_id)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este torneo.');
        }

        Registration::create([
            'user_id' => Auth::id(),
            'tournament_id' => $request->tournament_id,
        ]);

        return redirect()->back()->with('success', 'Inscripción completada.');
    }
}
