@extends('layouts.app')

@section('page-title', 'Relatórios')

@section('content')
<div class="bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-semibold text-green-800 mb-4">Gerar Relatórios</h2>

    <!-- Filtros -->
    <form method="GET" action="{{ route('relatorios.export') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label class="block text-gray-600 mb-1">Período:</label>
            <select name="periodo" class="w-full p-2 border rounded">
                <option value="7">Últimos 7 dias</option>
                <option value="15">Últimos 15 dias</option>
                <option value="30">Últimos 30 dias</option>
                <option value="custom">Personalizado</option>
            </select>
        </div>

        <!-- Campo de datas (só aparece se custom for selecionado via JS depois) -->
        <div>
            <label class="block text-gray-600 mb-1">Data Inicial:</label>
            <input type="date" name="inicio" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block text-gray-600 mb-1">Data Final:</label>
            <input type="date" name="fim" class="w-full p-2 border rounded">
        </div>

        <div class="flex items-end">
            <button type="submit" name="tipo" value="pdf" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mr-2">
                Exportar PDF
            </button>
            <button type="submit" name="tipo" value="excel" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Exportar Excel
            </button>
        </div>
    </form>

    <p class="text-sm text-gray-500">Você pode exportar os dados filtrados com o logo do NutriSesi para PDF ou Excel.</p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const select = document.querySelector('select[name="periodo"]');
        const inicio = document.querySelector('input[name="inicio"]').parentElement;
        const fim = document.querySelector('input[name="fim"]').parentElement;

        function toggleCustomDates() {
            const isCustom = select.value === 'custom';
            inicio.style.display = isCustom ? 'block' : 'none';
            fim.style.display = isCustom ? 'block' : 'none';
        }

        select.addEventListener('change', toggleCustomDates);
        toggleCustomDates(); // Executa ao carregar
    });
</script>
@endsection