@component('mail::message')
# Olá!

Você está recebendo este e-mail porque foi solicitada a redefinição de senha da sua conta.

@component('mail::button', ['url' => $url])
Redefinir Senha
@endcomponent

Se você não solicitou a redefinição de senha, nenhuma ação é necessária.

Se estiver com problemas para clicar no botão acima, copie e cole o link abaixo no seu navegador:

{{ $url }}

Atenciosamente, equipe NutriBrotas.
@endcomponent