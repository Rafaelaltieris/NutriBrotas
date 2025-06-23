@extends('layouts.app')

@section('head')
<link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
<style>
    /* Sticky header para o thead */
    thead th {
        position: sticky;
        top: 0;
        background-color: #D1FAE5;
        /* verde claro */
        z-index: 10;
    }
</style>
@endsection

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <h1 class="text-3xl font-extrabold mb-6 text-green-800">Desperdícios por Semana</h1>

    {{-- Navegação entre semanas --}}
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('desperdicios.semana', ['semana' => $offset - 1]) }}"
            class="inline-flex items-center gap-1 px-3 py-1.5 rounded border border-gray-300 text-gray-700 hover:bg-green-100 hover:border-green-400 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Semana Anterior
        </a>

        <span class="font-semibold text-gray-700 text-lg">
            Semana de {{ $inicioSemana->translatedFormat('d/m') }} a {{ $fimSemana->translatedFormat('d/m') }}
        </span>

        <a href="{{ route('desperdicios.semana', ['semana' => $offset + 1]) }}"
            class="inline-flex items-center gap-1 px-3 py-1.5 rounded border border-gray-300 text-gray-700 hover:bg-green-100 hover:border-green-400 transition">
            Próxima Semana
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <div class="overflow-x-auto rounded shadow-lg border border-gray-300">
        <table class="min-w-full bg-white text-sm text-center">
            <thead class="bg-green-100 text-green-900">
                <tr>
                    <th class="border px-4 py-3 font-semibold text-left sticky left-0 bg-green-100 z-20">Turma</th>
                    @foreach(\Carbon\CarbonPeriod::create($inicioSemana, $fimSemana) as $dia)
                    <th class="border px-4 py-3 whitespace-nowrap">
                        {{ $dia->translatedFormat('D - d/m') }}
                    </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach($turmas as $turma)
                <tr class="hover:bg-green-50 transition">
                    <td class="border px-4 py-3 font-semibold text-left sticky left-0 bg-white z-10">{{ $turma->nome }}</td>

                    @foreach(\Carbon\CarbonPeriod::create($inicioSemana, $fimSemana) as $dia)
                    @php
                    $desperdicio = $turma->desperdicios->first(function ($item) use ($dia) {
                    return \Carbon\Carbon::parse($item->data)->isSameDay($dia);
                    });
                    @endphp
                    <td class="border px-4 py-2">
                        @if($desperdicio)
                        <div class="text-gray-800 leading-relaxed space-y-1">
                            <div><strong>Bruto:</strong> {{ number_format($desperdicio->quantidade_bruta ?? 0, 2, ',', '.') }} kg</div>
                            <div><strong>Proteína:</strong> {{ number_format($desperdicio->quantidade_proteina ?? 0, 2, ',', '.') }} kg</div>
                            <a href="{{ route('desperdicios.edit', $desperdicio) }}"
                                class="inline-flex items-center gap-1 text-white bg-green-600 hover:bg-green-700 rounded px-2 py-1 mt-2 transition">
                                Editar
                            </a>
                        </div>
                        @else
                        <a href="{{ route('desperdicios.create', ['turma' => $turma->id, 'data' => $dia->toDateString()]) }}"
                            class="inline-flex items-center gap-1 text-green-600 hover:text-green-800 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Adicionar
                        </a>
                        @endif
                    </td>
                    @endforeach

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection