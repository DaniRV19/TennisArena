<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="flex justify-between items-center px-6 py-4">
        <a href="{{ route('dashboards.dashboard') }}" class="text-2xl font-bold text-gray-800 hover:text-[#8BC34A]">
            🎾 TennisArena
        </a>

        <ul class="flex gap-6 text-sm text-gray-800">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-[#8BC34A] bg-transparent border-none p-0 m-0 cursor-pointer">
                        Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</header>
