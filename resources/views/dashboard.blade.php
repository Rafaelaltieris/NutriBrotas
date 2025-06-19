@extends('layouts.app')
@section('head')
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
@endsection
@section('content')
<div class="p-6 space-y-6">

    <!-- Indicadores -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <x-card title="Total Bruto (kg)" value="{{ $totalBruto }}" />
        <x-card title="Total Proteína (kg)" value="{{ $totalProteina }}" />
        <x-card title="Turma que mais desperdiça" value="{{ $turmaMaisDesperdicio ?? 'N/A' }}" />
        <x-card title="Refeição mais desperdiçada" value="{{ $refeicaoMaisDesperdicio ?? 'N/A' }}" />
    </div>

    <!-- Gráficos -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg mb-2">Percentual de Desperdício por Turma</h2>
            <canvas id="graficoPizzaTurmas"></canvas>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg mb-2">Desperdício por Refeição</h2>
            <canvas id="graficoBarrasRefeicoes"></canvas>
        </div>
    </div>


    <x-card title="Total de Desperdício" value="{{ $totalBruto }}" />
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
const ctxPizza = document.getElementById('graficoPizzaTurmas');
new Chart(ctxPizza, {
    type: 'pie',
    data: {
        labels: @json($dadosPizza->pluck('nome')),
        datasets: [{
            label: 'Desperdício (kg)',
            data: @json($dadosPizza->pluck('total')),
            backgroundColor: ['#f87171', '#34d399', '#60a5fa', '#fbbf24', '#a78bfa']
        }]
    }
});

const ctxBar = document.getElementById('graficoBarrasRefeicoes');
new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: @json($dadosRefeicoes->pluck('nome')),
        datasets: [{
            label: 'Desperdício (kg)',
            data: @json($dadosRefeicoes->pluck('total')),
            backgroundColor: 'rgba(96, 165, 250, 0.7)'
        }]
    }
});
</script>
@endsection