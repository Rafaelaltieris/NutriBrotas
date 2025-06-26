<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Desperdicio;
use Illuminate\Http\Request;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        // 1. Totais gerais
        $totalBruto = Desperdicio::sum('quantidade_bruta');
        $totalProteina = Desperdicio::sum('quantidade_proteina');

        // 2. Turma com mais desperdício
        $turmaMaisDesperdicio = Desperdicio::select('turma_id', DB::raw('SUM(quantidade_bruta) as total'))
            ->groupBy('turma_id')
            ->orderByDesc('total')
            ->first();

        // 3. Refeição com mais desperdício
        $refeicaoMaisDesperdicio = Desperdicio::select('refeicao_id', DB::raw('SUM(quantidade_bruta) as total'))
            ->groupBy('refeicao_id')
            ->orderByDesc('total')
            ->first();

        // 4. Dados para gráfico de pizza (por turma)
        $dadosPizza = Desperdicio::select('turmas.nome', DB::raw('SUM(quantidade_bruta) as total'))
            ->join('turmas', 'desperdicios.turma_id', '=', 'turmas.id')
            ->groupBy('turmas.nome')
            ->get();

        // 5. Dados para gráfico de barras (por refeição)
        $dadosRefeicoes = Desperdicio::select('refeicaos.nome', DB::raw('SUM(quantidade_bruta) as total'))
            ->join('refeicaos', 'desperdicios.refeicao_id', '=', 'refeicaos.id')
            ->groupBy('refeicaos.nome')
            ->get();


        return view('dashboard', [
            'totalBruto' => $totalBruto,
            'totalProteina' => $totalProteina,
            'turmaMaisDesperdicio' => optional($turmaMaisDesperdicio->turma ?? null)->nome,
            'refeicaoMaisDesperdicio' => optional($refeicaoMaisDesperdicio->refeicao ?? null)->nome,
            'dadosPizza' => $dadosPizza,
            'dadosRefeicoes' => $dadosRefeicoes,
        ]);
    }
}
