@extends('layouts.app')

@section('content')
@include('components.header2')



<div class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-7xl mx-auto space-y-8">

        <!-- Alpine Modal + Estilos -->
        <div x-data="{ open: false }">
            <!-- Bienvenida -->
            <div class="bg-white p-6 rounded-lg shadow flex items-center space-x-6">
                <div class="relative group cursor-pointer" @click="open = true">
                    <img id="profile-img" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}"
                        class="w-20 h-20 rounded-full object-cover transition duration-300 group-hover:brightness-50">
                    <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <svg class="w-6 h-6 text-white mb-1" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z"/>
                        </svg>
                        <span class="text-white text-sm">Editar</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">¡Bienvenid@, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-600">Bienvenid@ a TennisArena. Aquí tienes un resumen de tu actividad.</p>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div @click.away="open = false" class="bg-white p-6 rounded-lg w-full max-w-md space-y-4 shadow-lg">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Editar Perfil</h2>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')


                        <!-- Nombre -->
                        <div>
                            <label class="block text-gray-700">Nombre</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Correo -->
                        <div>
                            <label class="block text-gray-700">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="open = false"
                                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancelar</button>
                            <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Guardar</button>
                        </div>
                    </form>
                </div>
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



        <!-- Panel visual de rendimiento separado en cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- Ratio de victorias - Tierra batida -->
            <div class="rounded-xl shadow-md p-6 text-center text-white bg-gradient-to-tr from-orange-400 to-yellow-600 transform transition-transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-lg font-bold mb-2">🎾 Ratio de victorias</h2>
                <canvas id="winRatioChart" class="mx-auto w-40 h-40 bg-white rounded-full"></canvas>
                <p class="mt-2">{{ $wins ?? 0 }} victorias / {{ $matchesPlayed ?? 0 }} partidos</p>
            </div>

            <!-- Progreso al siguiente ranking - Pista dura -->
            <div class="rounded-xl shadow-md p-6 text-center text-white bg-gradient-to-tr from-blue-500 to-indigo-700 transform transition-transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-lg font-bold mb-2">🔥 Progreso al siguiente ranking</h2>
                <div class="relative h-6 bg-gray-200 rounded-full overflow-hidden">
                    <div class="bg-lime-400 h-full transition-all duration-500" style="width: {{ $rankingProgress ?? 0 }}%;"></div>
                </div>
                <p class="mt-2">{{ $currentPoints ?? 0 }} / 1000 pts</p>
            </div>

            <!-- Torneos jugados este mes - Césped -->
            <div class="rounded-xl shadow-md p-6 text-center text-white bg-gradient-to-tr from-green-500 to-lime-600 transform transition-transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-lg font-bold mb-2">📅 Torneos registrados</h2>
                <p class="text-5xl font-bold">{{ $monthlyTournaments ?? 0 }}</p>
            </div>

            <!-- Eficiencia del jugador - Carpeta o sintética -->
            <div class="rounded-xl shadow-md p-6 text-center text-white bg-gradient-to-tr from-gray-700 to-gray-900 transform transition-transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-lg font-bold mb-2">⚡ Eficiencia</h2>
                <p class="text-3xl font-semibold">
                    {{ number_format(($wins ?? 0) / max($matchesPlayed ?? 1, 1) * 100, 1) }}%
                </p>
                <p class="mt-2">Victorias por partido</p>
            </div>

        </div>



        <h2 class="text-xl font-semibold mb-4">Torneos disponibles</h2>

    <ul class="space-y-6">
    @forelse($tournaments as $tournament)
        <li class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition-all duration-200" x-data="{ open: false }">
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $tournament->name }}</h3>
            <p class="text-gray-600"><strong>📅 Fecha:</strong> {{ $tournament->date }}</p>
            <p class="text-gray-600"><strong>📍 Ubicación:</strong> {{ $tournament->location }}</p>

            <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <a href="{{ route('tournaments.show', $tournament->id) }}" class="px-4 py-2 bg-[#8BC34A] text-white rounded hover:bg-[#7AB330] transition text-center">
                    Ver detalles
                </a>

                <button @click="open = true" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition text-center">
                    Eliminar torneo
                </button>
            </div>

            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md text-center">
                    <h2 class="text-xl font-semibold mb-4">¿Eliminar este torneo?</h2>
                    <p class="mb-6 text-gray-700">Esta acción no se puede deshacer.</p>

                    <div class="flex justify-center gap-4">
                        <button @click="open = false" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                            Cancelar
                        </button>

                        <form action="{{ route('tournaments.destroy', $tournament->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Confirmar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
    @empty
        <p class="text-gray-600">No hay torneos disponibles aún.</p>
    @endforelse
</ul>
 
    </div>
</div>

<script>
    function profileEditor() {
        return {
            open: false,
            form: {
                name: '{{ Auth::user()->name }}',
                email: '{{ Auth::user()->email }}',
            },
            async submitForm() {
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('email', this.form.email);
                formData.append('_method', 'PUT');
                formData.append('_token', '{{ csrf_token() }}');

            

                try {
                    const response = await fetch('{{ route('profile.update') }}', {
                        method: 'POST',
                        body: formData,
                    });

                    if (response.ok) {
                        const updatedUser = await response.json();

                        // Actualiza los datos visualmente sin recargar
                        document.querySelector('#profile-name').textContent = '¡Bienvenid@, ' + updatedUser.name + '!';
                        document.querySelector('#profile-email').textContent = updatedUser.email;

                        this.open = false;
                    } else {
                        const error = await response.json();
                        alert('Error al actualizar el perfil: ' + (error.message || ''));
                    }
                } catch (error) {
                    console.error(error);
                    alert('Error inesperado al enviar el formulario');
                }
            }
        };
    }
</script>


@endsection
