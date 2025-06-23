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
                    <i class="fa-solid fa-user text-green-600 mr-2"></i>
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
                    <i class="fa-solid fa-lock text-green-600 mr-2"></i>
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