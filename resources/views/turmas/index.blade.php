<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>QR Codes das Turmas - NutriSesi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- SweetAlert2 (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
    <!-- Seu script de confirmação -->
    <script src="{{ asset('js/confirmDelete.js') }}"></script>
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
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                    <h1 class="text-3xl font-bold text-green-800">QR Codes das Turmas</h1>

                    <div class="flex gap-3">
                        <a href="{{ route('turmas.create') }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                            + Criar Turma
                        </a>

                        <a href="{{ route('turmas.qrcodes.pdf') }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                            Baixar PDF com QR Codes
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($turmas as $turma)
                    <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex flex-col items-center text-center relative">
                        <div class="absolute top-2 right-2 flex space-x-2">
                            <a href="{{ route('turmas.edit', $turma->id) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                                <!-- Ícone lápis -->
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M15.232 5.232l3.536 3.536M4 20h4l10.293-10.293a1 1 0 000-1.414l-2.586-2.586a1 1 0 00-1.414 0L4 16v4z" />
                                </svg>
                            </a>

                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST"
                                onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Excluir">
                                    <!-- Ícone X -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <h2 class="text-xl font-bold text-green-700">{{ $turma->nome }}</h2>
                        <p class="text-sm text-gray-500 mb-3">Turno: {{ $turma->turno }}</p>
                        <img src="{{ route('turmas.qrcode', ['turma' => $turma->id]) }}"
                            alt="QR Code da turma {{ $turma->nome }}" class="w-48 h-48 mb-3" />
                        <a href="{{ route('desperdicios.create', $turma->id) }}"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Registrar Desperdício
                        </a>
                    </div>

                    @endforeach
                </div>
            </main>
        </div>
    </div>
</body>

</html>