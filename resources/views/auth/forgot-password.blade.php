<x-guest-layout>
    <!-- <div class="min-h-screen flex items-center justify-center px-4 bg-green-50"> -->
    <div class="w-full max-w-md p-8 rounded-2xl bg-white">

        <!-- Logo + Título -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/nutriSesi.png') }}" alt="NutriSesi" class="w-48 h-auto object-contain mb-2">
            <h2 class="text-2xl font-semibold text-green-700">Redefinir Senha</h2>
        </div>

        <!-- Descrição -->
        <p class="text-sm text-gray-600 text-center mb-6">

            Digite seu e-mail e será enviado um link para recuperar a sua senha.
        </p>

        <!-- Status da Sessão -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulário -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Campo de E-mail -->
            <label for="email" class="block text-sm text-gray-600 mb-1">Email</label>
            <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                <!-- User icon -->
                <i class="fa-solid fa-envelope text-green-600 mr-2"></i>
                <input id="email" name="email" type="email" required autofocus
                    class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                    placeholder="seu@email.com">
            </div>

            <!-- Botão -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-full transition duration-200">
                    Enviar link de redefinição
                </button>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>