<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/registro', [RegisterController::class, 'show'])->name('register');
Route::post('/registro', [RegisterController::class, 'register']);

Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login.custom');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards.dashboard');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/register/custom', [CustomRegisterController::class, 'store'])->name('register.custom');

Route::middleware(['auth'])->get('/profile', function () {
    return view('vue.profile');
})->name('profile');



Route::middleware(['auth'])->group(function () {
    Route::get('/tournaments/create', [TournamentController::class, 'create'])->name('tournaments.create');
    Route::post('/tournaments', [TournamentController::class, 'store'])->name('tournaments.store');
});

Route::post('/registrarse', [RegistrationController::class, 'store'])->name('tournament.register');

Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('tournaments.show');
Route::post('/tournaments/{id}/join', [TournamentController::class, 'join'])->name('tournaments.join');
Route::delete('/tournaments/{id}/leave', [TournamentController::class, 'leave'])->name('tournaments.leave');

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::delete('/tournaments/{tournament}', [TournamentController::class, 'destroy'])->name('tournaments.destroy');
