<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>QR Codes das Turmas</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .container {
            text-align: center;
        }

        .turma {
            display: inline-block;
            width: 30%;
            margin: 1%;
            vertical-align: top;
            text-align: center;
        }

        img {
            height: 180px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">QR Codes das Turmas</h1>

    <div class="container">
        @foreach($turmas as $turma)
            <div class="turma">
                <h3>{{ $turma->nome }} ({{ $turma->turno }})</h3>
                <img src="{{ $turma->qrCodeBase64 }}" alt="QR Code da Turma">
            </div>
        @endforeach
    </div>
</body>
</html>