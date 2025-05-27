<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomRegisterController extends Controller
{
    public function store(Request $request)
    {
        // Verificar si el usuario ya está registrado
        $userExists = User::where('email', $request->email)->first();
        if ($userExists) {
            return redirect()->route('login')->with('message', 'El usuario ya está registrado, inicia sesión.');
        }

        // Validaciones
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        Auth::login($user);

    }
}
