@extends('layouts.app')

@section('title', 'Refeições')

@section('page-title', 'Refeições')

@section('page-actions')
<a href="{{ route('refeicoes.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
    + Criar Refeição
</a>
@endsection

@section('content')
<ul>
    @foreach($refeicoes as $refeicao)
        <li class="mb-2 flex justify-between items-center">
            <span>{{ $refeicao->nome }}</span>
            <div>
                <a href="{{ route('refeicoes.edit', $refeicao) }}" class="text-green-600 hover:text-green-800 mr-3">Editar</a>
                <form action="{{ route('refeicoes.destroy', $refeicao) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Quer mesmo deletar?')" class="text-red-600 hover:text-red-800">
                        Deletar
                    </button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection