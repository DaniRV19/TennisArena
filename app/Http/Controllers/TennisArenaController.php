<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TennisArenaController extends Controller
{
    // Método para la landing page
    public function index()
    {
        return view('landing'); // Vista que se encuentra en resources/views/landing.blade.php
    }

    // Método para la página de registro
    public function showRegisterForm()
    {
        return view('auth.register'); // O la vista que tienes definida para el registro
    }

    // Método para la gestión de torneos (ejemplo)
    public function torneos()
    {
        return view('torneos'); // Vista donde puedes gestionar los torneos
    }
}

