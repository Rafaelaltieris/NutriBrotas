<x-guest-layout>
    <div class="w-full max-w-md bg-white rounded-3xl p-8 space-y-6">

        <!-- Logo e título -->
        <div class="text-center">
            <img src="{{ asset('images/nutriSesi.png') }}" alt="Logo" class="w-56 h-20 object-contain mx-auto">
            <h1 class="text-3xl font-semibold text-[#15803d]">Redefinir Senha</h1>
        </div>

        <!-- Formulário -->
        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf

            <!-- Token escondido -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="relative">
                <label for="email" class="block text-sm text-gray-600 mb-1">Email</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <i class="fa-solid fa-envelope text-green-600 mr-2"></i>
                    <input id="email" name="email" type="email" required autofocus
                        value="{{ old('email', $request->email) }}"
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="seu@email.com">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Nova Senha -->
            <div class="relative">
                <label for="password" class="block text-sm text-gray-600 mb-1">Nova Senha</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <i class="fa-solid fa-lock text-green-600 mr-2"></i>
                    <input id="password" name="password" type="password" required
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Senha -->
            <div class="relative">
                <label for="password_confirmation" class="block text-sm text-gray-600 mb-1">Confirmar Senha</label>
                <div class="flex items-center px-4 py-2 border rounded-full bg-[#f9f9f9]">
                    <i class="fa-solid fa-lock text-green-600 mr-2"></i>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full bg-transparent border-none text-gray-700 placeholder:text-gray-400 focus:outline-none"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Botão -->
            <button type="submit"
                class="w-full py-2 rounded-full bg-[#16a34a] text-white font-semibold hover:bg-[#15803d] transition">
                Redefinir Senha
            </button>
        </form>
    </div>
</x-guest-layout>