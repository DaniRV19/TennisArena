@extends('layouts.app')

@section('content')
@include('components.header2')

<div class="max-w-3xl mx-auto mt-8 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $tournament->name }}</h1>

    <p><strong>Fecha:</strong> {{ $tournament->date }}</p>
    <p><strong>Ubicación:</strong> {{ $tournament->location }}</p>
    <p><strong>Máximo jugadores:</strong> {{ $tournament->max_players }}</p>
    <p><strong>Inscritos actualmente:</strong> {{ $tournament->users_count }}</p>

    <div class="mt-6">
        @if(session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 text-red-700 bg-red-100 p-2 rounded">{{ session('error') }}</div>
        @endif

        @if($isRegistered)
            <form action="{{ route('tournaments.leave', $tournament->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Cancelar inscripción</button>
            </form>
        @elseif($isFull)
            <p class="text-red-500 font-semibold">Este torneo ya está completo.</p>
        @else
            <form action="{{ route('tournaments.join', $tournament->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Inscribirme</button>
            </form>
        @endif


        @if($tournament->users->count())
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-2">Jugadores inscritos</h2>
                <ul class="list-disc pl-6 space-y-1 text-gray-700">
                    @foreach($tournament->users as $user)
                        <li>{{ $user->full_name }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="mt-6 text-gray-500 italic">Todavía no hay jugadores inscritos en este torneo.</p>
        @endif

        
        <div x-data="tournamentGames()" class="mt-10">
    <h2 class="text-xl font-semibold mb-4">Crear Partidos</h2>

    <template x-if="games.length === 0">
        <button @click="generateGames()" class="bg-blue-600 text-white px-4 py-2 rounded">Generar Partidos</button>
    </template>

    <template x-if="games.length > 0">
        <div class="space-y-4">
            <template x-for="(game, index) in games" :key="index">
                <div class="p-4 border rounded bg-gray-50">
                    <p class="mb-2 font-medium" x-text="`${game.player1} vs ${game.player2}`"></p>
                    
                    <div class="flex space-x-4 mb-2">
                        <input type="number" class="border px-2 py-1 rounded w-20" x-model.number="game.score1" placeholder="P1">
                        <input type="number" class="border px-2 py-1 rounded w-20" x-model.number="game.score2" placeholder="P2">
                    </div>

                    <button @click="saveLocal(index)" 
                        x-text="game.saved ? 'Resultado guardado' : 'Guardar resultado'" 
                        :class="game.saved ? 'bg-green-500' : 'bg-gray-700'"
                        class="text-white px-3 py-1 rounded">
                    </button>
                </div>
            </template>
        </div>
    </template>
</div>



    </div>
</div>


<script>
    function tournamentGames() {
        return {
            players: @json($tournament->users->pluck('full_name')->toArray()),
            games: [],

            generateGames() {
                const shuffled = [...this.players].sort(() => Math.random() - 0.5);
                this.games = [];

                for (let i = 0; i < shuffled.length - 1; i += 2) {
                    this.games.push({
                        player1: shuffled[i],
                        player2: shuffled[i + 1],
                        score1: null,
                        score2: null,
                        saved: false
                    });
                }

                if (shuffled.length % 2 !== 0) {
                    alert(`Jugador sin pareja: ${shuffled[shuffled.length - 1]}`);
                }
            },

            saveLocal(index) {
                const game = this.games[index];
                if (game.score1 === null || game.score2 === null) {
                    alert('Por favor, introduce ambos resultados.');
                    return;
                }
                game.saved = true;
            }
        }
    }
</script>

@endsection
