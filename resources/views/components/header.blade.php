<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        <!-- Logo -->
        <a href="{{ url('/') }}" 
           class="text-2xl font-extrabold tracking-wide text-[#35424a] hover:text-[#8BC34A] transition">
            🎾 TennisArena
        </a>

        <!-- Navegación -->
        <ul class="flex items-center gap-6 text-sm font-semibold text-[#35424a]">
            <li>
                <a href="{{ route('login') }}" class="hover:text-[#8BC34A] transition">Iniciar Sesión</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="hover:text-[#8BC34A] transition">Registrarse</a>
            </li>
        </ul>
    </nav>
</header>
