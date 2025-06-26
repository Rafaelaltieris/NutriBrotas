@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Editar Turma</h1>

    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium">Nome da Turma</label>
            <input type="text" name="nome" value="{{ old('nome', $turma->nome) }}"
                   class="w-full border-gray-300 rounded p-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Período</label>
            <input type="text" name="turno" value="{{ old('turno', $turma->turno) }}"
                   class="w-full border-gray-300 rounded p-2 mt-1" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Salvar Alterações
        </button>
    </form>
</div>
@endsection