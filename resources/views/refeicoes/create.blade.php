@extends('layouts.app')

@section('title', 'Criar nova Refeição')

@section('header', 'Criar nova Refeição')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    {{-- Erros --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('refeicoes.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="nome" class="block font-semibold mb-2">Nome da Refeição</label>
            <input
                type="text"
                name="nome"
                id="nome"
                value="{{ old('nome') }}"
                required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                placeholder="Digite o nome da refeição"
            >
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('refeicoes.index') }}" class="text-green-700 hover:underline">
                &larr; Voltar
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow">
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection