<!DOCTYPE html>
<html lang="pt-BR" x-data="{ dark: localStorage.getItem('dark') === 'true' }" :class="{ 'dark': dark }" x-init="$watch('dark', val => localStorage.setItem('dark', val))">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title') - NutriSesi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/confirmDelete.js') }}"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">

</head>



<body class="bg-green-50 text-gray-800 font-sans">
    <div class="flex h-screen" x-data="{ open: false }">
        <!-- Menu lateral -->
        <aside :class="open ? 'block' : 'hidden md:block'"
            class="bg-white w-64 p-6 shadow-md fixed md:static inset-y-0 left-0 z-50">
            <div class="mb-10 flex items-center justify-between md:justify-start space-x-2">
                <img src="{{ asset('images/nutriSesi.png') }}" alt="Logo" class="w-16 h-12 object-contain" />
                <h2 class="text-xl font-bold text-green-700">NutriSesi</h2>
                <button class="md:hidden text-gray-600" @click="open = false">&times;</button>
            </div>

            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="flex items-center text-green-800 font-semibold hover:text-green-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12h18M3 6h18M3 18h18" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('turmas.index') }}" class="flex items-center text-gray-700 hover:text-green-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-3-3.87M4 21v-2a4 4 0 013-3.87m6-7a4 4 0 11-8 0 4 4 0 018 0zm6 4a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                    Turmas
                </a>

                <a href="{{ route('relatorios.index') }}" class="flex items-center text-gray-700 hover:text-green-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 3v18h18V3H3z" />
                        <path d="M9 17V7l8 5-8 5z" />
                    </svg>
                    Relatórios
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-red-600 hover:text-red-800 mt-6 bg-transparent border-none p-0 cursor-pointer">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m0-8V7a2 2 0 114 0v1" />
                        </svg>
                        Sair
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Conteúdo principal -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Barra superior para mobile -->
            <header class="md:hidden flex justify-between items-center bg-white p-4 shadow-md">
                <h1 class="text-xl font-bold text-green-700">NutriSesi</h1>
                <button @click="open = true" class="text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </header>

            <main class="flex-1 p-6 md:p-10 overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-3xl font-bold text-green-800">@yield('page-title')</h1>
                    @yield('page-actions')
                </div>

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>