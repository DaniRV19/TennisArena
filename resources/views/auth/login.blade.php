@extends('layouts.app')

@include('components.header')

@section('content')
<section class="min-h-screen bg-cover bg-center flex items-center justify-center px-4 login-bg" style="background-image: url('{{ asset('images/tennis-court.jpg') }}');">
    <div class="max-w-md w-full text-center text-white">
        <h2 class="text-4xl font-extrabold mb-4 drop-shadow-md">Inicia sesión en TennisArena</h2>
        <p class="text-lg mb-8 drop-shadow-md">Accede a tu cuenta y comienza a gestionar tus torneos de tenis.</p>

        <div class="bg-white bg-opacity-20 backdrop-blur-md p-8 rounded-lg shadow-2xl">
            <form method="POST" action="{{ route('login.custom') }}">
                @csrf
                <div class="space-y-6 text-left text-white">
                    <!-- Correo -->
                    <div>
                        <label for="email" class="block text-sm font-semibold mb-2">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-white bg-white bg-opacity-30 text-white placeholder-white rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8BC34A]" required>
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-semibold mb-2">Contraseña</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-white bg-white bg-opacity-30 text-white placeholder-white rounded-lg focus:outline-none focus:ring-2 focus:ring-[#8BC34A]" required>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full py-3 bg-[#8BC34A] text-white rounded-lg font-semibold hover:bg-[#30b877] transition">Iniciar Sesión</button>
                </div>
            </form>
        </div>

        <div class="mt-6">
            <p class="text-sm text-white drop-shadow">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-[#30b877] hover:underline">Regístrate aquí</a></p>
        </div>
    </div>
</section>
@endsection
