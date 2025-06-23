@extends('layouts.app')
@section('head')
<link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
@endsection
@section('content')

<!-- Conteúdo principal -->
<div class="flex-1 flex flex-col overflow-hidden">
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
            <h1 class="text-3xl font-bold text-green-800">QR Codes das Turmas</h1>

            <div class="flex gap-3">
                <a href="{{ route('turmas.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                    + Criar Turma
                </a>

                <a href="{{ route('turmas.qrcodes.pdf') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                    Baixar PDF com QR Codes
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($turmas as $turma)
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition flex flex-col items-center text-center relative">
                <div class="absolute top-2 right-2 flex space-x-2">
                    <a href="{{ route('turmas.edit', $turma->id) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                        <!-- Ícone lápis -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15.232 5.232l3.536 3.536M4 20h4l10.293-10.293a1 1 0 000-1.414l-2.586-2.586a1 1 0 00-1.414 0L4 16v4z" />
                        </svg>
                    </a>

                    <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST"
                        onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" title="Excluir">
                            <!-- Ícone X -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>

                <h2 class="text-xl font-bold text-green-700">{{ $turma->nome }}</h2>
                <p class="text-sm text-gray-500 mb-3">Turno: {{ $turma->turno }}</p>
                <img src="{{ route('turmas.qrcode', ['turma' => $turma->id]) }}"
                    alt="QR Code da turma {{ $turma->nome }}" class="w-48 h-48 mb-3" />
                <a href="{{ route('desperdicios.create', $turma->id) }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Registrar Desperdício
                </a>
            </div>

            @endforeach
        </div>
    </main>
</div>
@endsection