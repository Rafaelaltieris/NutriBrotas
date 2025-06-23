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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
                <a href="{{ route('dashboard') }}"
                    class="group flex items-center font-semibold {{ request()->routeIs('dashboard') ? 'text-green-800' : 'text-gray-700 hover:text-green-700' }}">
                    <i class="fa-solid fa-chart-simple mr-3 {{ request()->routeIs('dashboard') ? 'text-green-800' : 'text-gray-700 group-hover:text-green-700' }}"></i>
                    Dashboard
                </a>

                <a href="{{ route('turmas.index') }}"
                    class="group flex items-center font-semibold {{ request()->routeIs('turmas.*') ? 'text-green-800' : 'text-gray-700 hover:text-green-700' }}">
                    <i class="fa-solid fa-users mr-2 {{ request()->routeIs('turmas.*') ? 'text-green-800' : 'text-gray-700 group-hover:text-green-700' }}"></i>
                    Turmas
                </a>

                <a href="{{ route('relatorios.index') }}"
                    class="group flex items-center font-semibold {{ request()->routeIs('relatorios.*') ? 'text-green-800' : 'text-gray-700 hover:text-green-700' }}">
                    <i class="fa-solid fa-file-lines mr-3 {{ request()->routeIs('relatorios.*') ? 'text-green-800' : 'text-gray-700 group-hover:text-green-700' }}"></i>
                    Relatórios
                </a>

                <a href="{{ route('desperdicios.semana') }}"
                    class="group flex items-center font-semibold {{ request()->routeIs('desperdicios.*') ? 'text-green-800' : 'text-gray-700 hover:text-green-700' }}">
                    <i class="fa-solid fa-trash mr-2 {{ request()->routeIs('desperdicios.*') ? 'text-green-800' : 'text-gray-700 group-hover:text-green-700' }}"></i>
                    Desperdícios
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-red-600 hover:text-red-800 mt-6 bg-transparent border-none p-0 cursor-pointer">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Sair
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