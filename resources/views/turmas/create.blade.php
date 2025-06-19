<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Criar Turma - NutriSesi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                    Dashboard
                </a>

                <a href="{{ route('turmas.index') }}" class="flex items-center text-gray-700 hover:text-green-700">
                    Turmas
                </a>

                <a href="{{ route('relatorios.index') }}" class="flex items-center text-gray-700 hover:text-green-700">
                    Relatórios
                </a>

                <a href="{{ route('logout') }}" class="flex items-center text-red-600 hover:text-red-800 mt-6">
                    Sair
                </a>
            </nav>
        </aside>

        <!-- Conteúdo principal -->
        <div main class="flex-1 flex items-center justify-center bg-green-50">
            <div class="w-full max-w-lg bg-white p-8 rounded shadow">
                <h1 class="text-3xl font-bold text-green-800 mb-6 text-center">Criar Nova Turma</h1>

                @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('turmas.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label for="nome" class="block font-semibold mb-2 text-gray-700">Nome da Turma</label>
                        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>

                    <div class="mb-4">
                        <label for="turno" class="block font-semibold mb-2 text-gray-700">Turno</label>
                        <input type="text" id="turno" name="turno" value="{{ old('turno') }}" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded transition">
                        Salvar Turma
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
