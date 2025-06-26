<?php

namespace App\Http\Controllers;

use App\Models\Desperdicio;
use App\Models\Refeicao;
use App\Models\Turma;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesperdicioController extends Controller
{
    public function index()
    {
        $desperdicios = Desperdicio::with('turma')->latest()->get();
        return view('desperdicios.index', compact('desperdicios'));
    }

    public function create(Turma $turma, Request $request)
    {
        $data = $request->query('data'); // Ex: ?data=2025-06-17
        $refeicoes = Refeicao::all();

        return view('desperdicios.create', compact('turma', 'refeicoes', 'data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'turma_id' => 'required|exists:turmas,id',
            'data' => 'required|date',
            'peso_bruto' => 'required|numeric|min:0',
        ]);

        $existe = Desperdicio::where('turma_id', $request->turma_id)
            ->where('data', $request->data)
            ->exists();

        if ($existe) {
            return back()->with('message', 'Já existe um registro para essa turma neste dia!')->with('type', 'error');
        }

        Desperdicio::create($request->all());

        return redirect()->route('desperdicios.semana')->with('message', 'Desperdício registrado com sucesso!');
    }

    public function indexPorTurma(Turma $turma)
    {
        $registros = $turma->desperdicios()
            ->orderBy('data')
            ->get();

        return view('turmas.desperdicios', compact('turma', 'registros'));
    }

    public function semana(Request $request)
    {
        Carbon::setLocale('pt_BR');

        $offset = (int) $request->query('semana', 0);   // 0 = semana atual

        // Segunda-feira da semana desejada
        $inicioSemana = now()
            ->startOfWeek(Carbon::MONDAY)
            ->addWeeks($offset);

        // Sexta-feira da mesma semana
        $fimSemana = $inicioSemana
            ->copy()          // mantém $inicioSemana intacto
            ->addDays(4)      // segunda + 4 = sexta
            ->endOfDay();     // opcional: 23:59:59

        $turmas = Turma::with([
            'desperdicios' => function ($query) use ($inicioSemana, $fimSemana) {
                $query->whereBetween('data', [$inicioSemana, $fimSemana]);
            }
        ])->get();

        return view('desperdicios.semana', compact(
            'turmas',
            'inicioSemana',
            'fimSemana',
            'offset'
        ));
    }

    public function edit(Desperdicio $desperdicio)
    {
        $refeicoes = Refeicao::all();
        return view('desperdicios.edit', compact('desperdicio', 'refeicoes'));
    }

    public function update(Request $request, Desperdicio $desperdicio)
    {
        $request->validate([
            'refeicao_id' => 'required|exists:refeicaos,id',
            'quantidade_bruta' => 'required|numeric|min:0',
            'quantidade_proteina' => 'required|numeric|min:0',
            'data' => 'required|date',
        ]);

        $desperdicio->update($request->all());

        return redirect()->route('desperdicios.semana')->with('message', 'Desperdício atualizado com sucesso!');
    }
}
