@extends('layouts.app')

@section('content')
@include('components.header2')



<div class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-7xl mx-auto space-y-8">

        <!-- Bienvenida -->
        <div class="bg-white p-6 rounded-lg shadow flex items-center space-x-6">
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" class="w-20 h-20 rounded-full object-cover">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">¡Bienvenido, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600">Bienvenid@ a TennisArena. Aquí tienes un resumen de tu actividad.</p>
            </div>
        </div>

    <div x-data="{ open: false }">
        <!-- Botón para abrir el modal -->
        <button 
            @click="open = true" 
            class="bg-[#8BC34A] text-white px-4 py-2 rounded hover:bg-[#7CB342] transition">
            ➕ Crear Torneo
        </button>

        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-cloak>
            <div @click.away="open = false" class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
                <h2 class="text-xl font-bold mb-4">Crear Torneo</h2>

                <form action="{{ route('tournaments.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" name="name" required class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Fecha</label>
                        <input type="date" name="date" required class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Lugar</label>
                        <input type="text" name="location" required class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Máx. Jugadores</label>
                        <input type="number" name="max_players" required class="w-full border rounded p-2">
                    </div>

                    <div class="flex justify-between mt-6">
                        <button type="button" @click="open = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-[#8BC34A] text-white rounded hover:bg-[#7CB342]">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



        <!-- Tarjetas rápidas mejoradas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Torneos Registrados -->
            <div class="bg-gradient-to-r from-lime-300 to-green-400 p-6 rounded-2xl shadow-lg text-white transform hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold">{{ $tournamentCount ?? 0 }}</h2>
                        <p class="text-sm mt-1">Torneos Registrados</p>
                    </div>
                    <div class="text-4xl">📋</div>
                </div>
            </div>

            <!-- Torneos Ganados -->
            <div class="bg-gradient-to-r from-yellow-300 to-orange-400 p-6 rounded-2xl shadow-lg text-white transform hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold">{{ $wins ?? 0 }}</h2>
                        <p class="text-sm mt-1">Torneos Ganados</p>
                    </div>
                    <div class="text-4xl">🎯</div>
                </div>
            </div>

            <!-- Próximo Torneo -->
            <div class="bg-gradient-to-r from-sky-400 to-blue-600 p-6 rounded-2xl shadow-lg text-white transform hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $nextTournamentDate ?? 'Sin próximos eventos' }}</h2>
                        <p class="text-sm mt-1">Próximo Torneo</p>
                    </div>
                    <div class="text-4xl">📅</div>
                </div>
            </div>

            <!-- (Opcional) Puntos Totales -->
            <div class="bg-gradient-to-r from-purple-400 to-indigo-600 p-6 rounded-2xl shadow-lg text-white transform hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold">{{ $totalPoints ?? 0 }}</h2>
                        <p class="text-sm mt-1">Puntos Totales</p>
                    </div>
                    <div class="text-4xl">🏆</div>
                </div>
            </div>
        </div>


        <h2 class="text-xl font-semibold mb-4">Torneos disponibles</h2>

<ul class="space-y-2">
    @forelse($tournaments as $tournament)
        <li class="border p-4 rounded shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-bold">{{ $tournament->name }}</h3>
            <p><strong>Fecha:</strong> {{ $tournament->date }}</p>
            <p><strong>Ubicación:</strong> {{ $tournament->location }}</p>
            <a href="{{ route('tournaments.show', $tournament->id) }}" class="mt-2 inline-block text-green-600 hover:underline">
                Ver detalles
            </a>
        </li>
    @empty
        <p>No hay torneos disponibles aún.</p>
    @endforelse
</ul>


        
    </div>
</div>
@endsection
