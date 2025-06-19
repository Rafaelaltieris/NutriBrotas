@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Desperdícios Registrados</h1>

        <a href="{{ route('desperdicios.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" />
            </svg>
            Registrar Novo Desperdício
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($desperdicios->isEmpty())
        <p class="text-gray-500">Nenhum desperdício registrado ainda.</p>
    @else
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">Data</th>
                    <th class="border px-4 py-2">Turma</th>
                    <th class="border px-4 py-2">Quantidade</th>
                    <th class="border px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($desperdicios as $desperdicio)
                    <tr>
                        <td class="border px-4 py-2">{{ $desperdicio->created_at->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $desperdicio->turma->nome ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $desperdicio->quantidade ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('desperdicios.show', $desperdicio->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection