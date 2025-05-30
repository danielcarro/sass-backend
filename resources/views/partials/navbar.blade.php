<nav class=" fixed top-0 left-0 right-0 z-50 shadow bg-gray-200 text-black dark:bg-gray-800 dark:text-white">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 py-3">

        <!-- Botão toggle sidebar mobile -->
        <button id="toggleSidebar" class="md:hidden text-dark  dark:text-white focus:outline-none" aria-label="Toggle sidebar">
            <!-- ícone hamburguer simples -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>

        <!-- Logo -->
        <a href="#" class="text-xl text-gray-700 dark:text-gray-300 font-bold">SASS - LARAVEL</a>
        <button id="themeToggle"
            class="ml-4 px-3 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-600 dark:bg-gray-200 dark:text-black dark:hover:bg-gray-300 transition"
            aria-label="Alternar tema">
            🌓 Tema
        </button>
        <!-- Dropdown Usuário -->
        @auth
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none" aria-haspopup="true"
                    aria-expanded="false">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-gray-300 dark:bg-gray-800 rounded-md shadow-lg py-1 z-20" style="display: none;">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-400 dark:hover:bg-gray-700">Minha Conta</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-400 dark:hover:bg-gray-700">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        @endauth

    </div>
</nav>
