<p>Olá {{ $mailData->name }},</p>

<p>Este é o e-mail de boas-vindas do voluntário.</p>

<p><a href="http://localhost:8000/confirmar-voluntario/{{ $mailData->token }}">Link para confirmação de cadastro</a></p>