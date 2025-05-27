@extends('layouts.app')

@include('components.header')

@section('content')
<section class="bg-[#30b877] min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-3xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-[#35424a]">Crea tu Cuenta en TennisArena</h2>
            <p class="text-sm text-gray-600 mt-2">Únete a la mejor plataforma para organizar torneos de tenis</p>
        </div>

        <form method="POST" action="{{ route('register.custom') }}" id="registroForm" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-sm font-medium text-[#35424a]">Nombre</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#30b877] focus:border-[#30b877]">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#35424a]">Correo Electrónico</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#30b877] focus:border-[#30b877]">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#35424a]">Contraseña</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#30b877] focus:border-[#30b877]">
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#35424a]">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#30b877] focus:border-[#30b877]">
                </div>
            </div>

            <!-- Botón de Registro -->
            <div>
                <button type="submit"
                    class="w-full bg-[#8BC34A] hover:bg-[#30b877] text-white font-bold py-3 px-4 rounded-md transition">
                    Registrarse
                </button>
            </div>

            <!-- Enlace a login -->
            <div class="text-center">
                <p class="text-sm text-gray-600">¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-[#30b877] hover:underline font-semibold">Inicia sesión</a>
                </p>
            </div>
        </form>
    </div>
</section>

<!-- Scripts para validación de formulario -->
<script>
    document.getElementById('registroForm').addEventListener('submit', function (e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (!email.includes('@')) {
            e.preventDefault();
            alert('Correo electrónico inválido.');
            return;
        }

        if (password.length < 8) {
            e.preventDefault();
            alert('La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        if (password !== passwordConfirmation) {
            e.preventDefault();
            alert('Las contraseñas no coinciden.');
        }
    });
</script>

@endsection
