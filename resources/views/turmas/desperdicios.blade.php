    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8" />
        <title>Criar Turma - NutriSesi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body>
        <h1 class="text-xl font-bold mb-4">Desperdícios da {{ $turma->nome }}</h1>

    <canvas id="graficoDesperdicio"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('graficoDesperdicio');
    const grafico = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($registros->pluck('data')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d/m'))),
            datasets: [{
                label: 'Desperdício (kg)',
                data: @json($registros->pluck('quantidade')),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    </body>
    </html>