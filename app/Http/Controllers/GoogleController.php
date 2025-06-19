<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // 1. Pega dados do Google
        $googleUser = Socialite::driver('google')->stateless()->user();

        // 2. Verifica se já existe usuário com o mesmo google_id ou email
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        // 3. Se não existir, cria
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                // Se sua tabela tiver 'password' como obrigatório, pode usar:
                'password' => bcrypt(str()->random(24)), // ou algo seguro e aleatório
            ]);
        } else {
            // Se o usuário já existe mas não tem google_id, podemos atualizar
            if (!$user->google_id) {
                $user->google_id = $googleUser->getId();
                $user->save();
            }
        }

        // 4. Faz login no sistema
        Auth::login($user);

        // 5. Redireciona para a home ou dashboard
        return redirect('/dashboard');
    }
}
