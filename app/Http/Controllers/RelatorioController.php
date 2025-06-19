<?php

namespace App\Http\Controllers;

use App\Models\Desperdicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DesperdicioExport;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $dias = $request->input('periodo', 30);
        $dataInicio = Carbon::now()->subDays($dias);

        $desperdicios = Desperdicio::with(['turma', 'refeicao'])
            ->where('data', '>=', $dataInicio)
            ->orderByDesc('quantidade_bruta')
            ->get();

        return view('relatorios.index', compact('desperdicios'));
    }

    public function export(Request $request)
    {
        $query = Desperdicio::with(['turma', 'refeicao']);

        // Filtro de período
        $hoje = Carbon::today();

        switch ($request->periodo) {
            case '7':
            case '15':
            case '30':
                $inicio = $hoje->copy()->subDays($request->periodo);
                $fim = $hoje;
                break;
            case 'custom':
                $inicio = $request->inicio;
                $fim = $request->fim;
                break;
            default:
                $inicio = $hoje->copy()->subDays(7);
                $fim = $hoje;
        }

        $query->whereBetween('data', [$inicio, $fim]);
        $dados = $query->orderByDesc('quantidade_bruta')->get();

        // PDF
        if ($request->tipo === 'pdf') {
            $pdf = Pdf::loadView('relatorios.pdf', compact('dados', 'inicio', 'fim'));
            return $pdf->download('relatorio_despedicio.pdf');
        }

        // Excel
        if ($request->tipo === 'excel') {
            return Excel::download(new DesperdicioExport($inicio, $fim), 'relatorio_desperdicio.xlsx');
        }

        return redirect()->back()->with('error', 'Tipo de exportação inválido');
    }
}
