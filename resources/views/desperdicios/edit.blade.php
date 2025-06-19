@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-green-800 mb-4">
        Editar Desperdício - {{ $desperdicio->turma->nome }} ({{ \Carbon\Carbon::parse($desperdicio->data)->format('d/m/Y') }})
    </h2>

    <form action="{{ route('desperdicios.update', $desperdicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="turma_id" value="{{ $desperdicio->turma_id }}">

        <div class="mb-4">
            <label class="block mb-1">Refeição</label>
            <select name="refeicao_id" required class="w-full border border-gray-300 rounded px-3 py-2">
                @foreach($refeicoes as $refeicao)
                    <option value="{{ $refeicao->id }}" {{ $desperdicio->refeicao_id == $refeicao->id ? 'selected' : '' }}>
                        {{ $refeicao->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Quantidade Bruta (kg)</label>
            <input type="number" step="0.01" name="quantidade_bruta" value="{{ $desperdicio->quantidade_bruta }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Quantidade de Proteína (kg)</label>
            <input type="number" step="0.01" name="quantidade_proteina" value="{{ $desperdicio->quantidade_proteina }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Data</label>
            <input type="date" name="data" value="{{ $desperdicio->data }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Atualizar</button>
    </form>
</div>
@endsection