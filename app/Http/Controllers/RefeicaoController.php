<?php

namespace App\Http\Controllers;

use App\Models\Refeicao;
use Illuminate\Http\Request;

class RefeicaoController extends Controller
{
    // Listar todas as refeições
    public function index()
    {
        $refeicoes = Refeicao::all();
        return view('refeicoes.index', compact('refeicoes'));
    }

    // Exibir formulário para criar nova refeição
    public function create()
    {
        return view('refeicoes.create');
    }

    // Salvar nova refeição
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Refeicao::create($request->all());

        return redirect()->route('refeicoes.index')
                         ->with('success', 'Refeição criada com sucesso!');
    }

    // Exibir uma refeição específica (opcional)
    public function show(Refeicao $refeicao)
    {
        return view('refeicoes.show', compact('refeicao'));
    }

    // Exibir formulário para editar refeição
    public function edit(Refeicao $refeicao)
    {
        return view('refeicoes.edit', compact('refeicao'));
    }

    // Atualizar a refeição
    public function update(Request $request, Refeicao $refeicao)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $refeicao->update($request->all());

        return redirect()->route('refeicoes.index')
                         ->with('success', 'Refeição atualizada com sucesso!');
    }

    // Deletar uma refeição
    public function destroy(Refeicao $refeicao)
    {
        $refeicao->delete();

        return redirect()->route('refeicoes.index')
                         ->with('success', 'Refeição deletada com sucesso!');
    }
}