<x-guest-layout>
    <!-- <div class="min-h-screen bg-white flex items-center justify-center px-4"> -->
    <div class="w-full max-w-md bg-white rounded-3xl p-8 space-y-6">
        <!-- Header -->

        <div class="text-center">
            <img src="{{ asset('images/nutriSesi.png') }}" alt="Logo" class="w-56 h-20 object-contain mx-auto">
            <h1 class="text-3xl font-semibold text-[#15803d]">Bem vindo</h1>
        </div>


        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div class="relative">
                <label for="email" class="block text-sm text-gray-600 mb-1">Email</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <!-- User icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-7 text-[#22c55e] mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A4 4 0 016 16h12a4 4 0 01.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <input id="email" name="email" type="email" required autofocus
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="seu@email.com">
                </div>
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm text-gray-600 mb-1">Senha</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <!-- Lock icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-5 text-[#22c55e] mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c.867 0 1.5-.895 1.5-2s-.633-2-1.5-2-1.5.895-1.5 2 .633 2 1.5 2zM17 13a5 5 0 00-10 0v4a2 2 0 002 2h6a2 2 0 002-2v-4z" />
                    </svg>
                    <input id="password" name="password" type="password" required
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="••••••••">
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm text-gray-500">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="text-green-500 focus:ring-green-500 rounded">
                    <span>Lembrar-me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-green-600 hover:underline">Esqueceu a senha?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-2 rounded-full bg-[#16a34a] text-white font-semibold hover:bg-[#15803d] transition">
                Entrar
            </button>

            <div class="text-center text-sm text-gray-500 mt-2">
                Não possui conta?
                <a href="{{ route('register') }}" class="text-green-600 hover:underline">Cadastre-se</a>
            </div>

            <div class="text-center text-sm text-gray-500 mt-2">
                Ou
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('google.login') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                    <img src="{{ asset('images/googleLogo.png') }}" class="w-5 h-5 mr-2" alt="Google logo">
                    Entrar com Google
                </a>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>