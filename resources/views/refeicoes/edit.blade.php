@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Refeição</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('refeicoes.update', $refeicao) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $refeicao->nome) }}" required>
        <br>
        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('refeicoes.index') }}">Voltar</a>
</div>
@endsection