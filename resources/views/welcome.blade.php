<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>NutriSesi - Controle de Desperdício</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/nutriSesi.png') }}" alt="Logo NutriSesi" class="w-22 h-16 object-contain">
                <!-- <span class="text-2xl font-bold text-green-700">NutriSesi</span> -->
            </div>

            <nav class="space-x-4">
                <a href="{{ route('login') }}" class="text-green-700 hover:text-green-900 font-medium">Entrar</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 font-medium">Cadastrar</a>
            </nav>
        </div>
    </header>

    <!-- Conteúdo -->
    <main class="pt-32 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-4xl font-extrabold text-green-800 mb-4">Controle de Desperdício Alimentar</h1>
        <p class="text-lg max-w-2xl mb-8">
            Plataforma para nutricionistas do Sesi Brotas acompanharem o desperdício alimentar das turmas.
            Escaneie o QR Code da turma e registre os dados em tempo real. Geração de relatórios e gráficos por turma, data ou refeição.
        </p>
        <a href="{{ route('register') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg text-lg shadow-md transition">
            Começar Agora
        </a>
    </main>

    <footer class="mt-16 text-sm text-gray-500 text-center pb-6">
        &copy; {{ date('Y') }} NutriSesi - Sistema desenvolvido para o Sesi Brotas
    </footer>

</body>
</html>