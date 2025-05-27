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

        
    </div>
</div>
@endsection
