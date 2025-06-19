<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Relatório de Desperdícios - {{ \Carbon\Carbon::parse($inicio)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($fim)->format('d/m/Y') }}</h2>
    <img src="{{ public_path('images/nutriSesi.png') }}" alt="Logo" style="height: 60px;">

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Turma</th>
                <th>Refeição</th>
                <th>Desperdício Bruto (kg)</th>
                <th>Proteína (kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $d)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($d->data)->format('d/m/Y') }}</td>
                    <td>{{ $d->turma->nome }}</td>
                    <td>{{ $d->refeicao->nome }}</td>
                    <td>{{ number_format($d->quantidade_bruta, 2, ',', '.') }}</td>
                    <td>{{ number_format($d->quantidade_proteina, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>