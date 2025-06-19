<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        $url = url(config('app.url') . route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Redefinição de Senha - NutriBrotas')
            ->greeting('Olá!')
            ->line('Você está recebendo este e-mail porque foi solicitada a redefinição de senha da sua conta.')
            ->action('Redefinir Senha', $url)
            ->line('Se você não solicitou a redefinição de senha, nenhuma ação é necessária.')
            ->line('Se estiver com problemas para clicar no botão acima, copie e cole o link abaixo no seu navegador:')
            ->line($url)
            ->salutation('Atenciosamente, equipe NutriBrotas');
    }
}
