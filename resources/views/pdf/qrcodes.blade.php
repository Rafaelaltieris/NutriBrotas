<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>QR Codes das Turmas</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .turma { margin-bottom: 30px; text-align: center; }
        img { height: 120px; margin-top: 10px; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">QR Codes das Turmas</h1>
    <img src="{{ public_path('images/nutriSesi.png') }}" alt="Logo">
    @foreach($turmas as $turma)
        <div class="turma">
            <h3>{{ $turma->nome }} ({{ $turma->turno }})</h3>
            <img src="{{ $turma->qrCodeBase64 }}" alt="QR Code da Turma">
        </div>
    @endforeach
</body>
</html>