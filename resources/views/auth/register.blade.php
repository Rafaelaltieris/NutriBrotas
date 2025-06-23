<x-guest-layout>
    <div class="w-full max-w-md bg-white rounded-3xl p-8 space-y-6">
        <!-- Header -->
        <div class="text-center">
            <img src="{{ asset('images/nutriSesi.png') }}" alt="Logo" class="w-56 h-20 object-contain mx-auto">
            <h1 class="text-3xl font-semibold text-[#15803d]">Crie sua conta</h1>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div class="relative">
                <label for="name" class="block text-sm text-gray-600 mb-1">Nome</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <i class="fa-solid fa-user text-green-600"></i>

                    <input id="name" name="name" type="text" required autofocus
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="Seu nome" value="{{ old('name') }}">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Email -->
            <div class="relative">
                <label for="email" class="block text-sm text-gray-600 mb-1">Email</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <i class="fa-solid fa-envelope text-green-600"></i>
                    <input id="email" name="email" type="email" required
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="seu@email.com" value="{{ old('email') }}">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm text-gray-600 mb-1">Senha</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <!-- Icon -->
                    <i class="fa-solid fa-lock text-green-600"></i>

                    <input id="password" name="password" type="password" required
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <label for="password_confirmation" class="block text-sm text-gray-600 mb-1">Confirmar Senha</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <!-- Icon -->
                    <i class="fa-solid fa-check text-green-600"></i>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-2 rounded-full bg-[#16a34a] text-white font-semibold hover:bg-[#15803d] transition">
                Criar Conta
            </button>

            <!-- Already Registered -->
            <div class="text-center text-sm text-gray-500 mt-2">
                Já tem uma conta?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Entrar</a>
            </div>
        </form>
    </div>
</x-guest-layout>