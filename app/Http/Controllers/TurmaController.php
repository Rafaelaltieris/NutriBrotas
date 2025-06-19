<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turmas.index', compact('turmas'));
    }

    public function qrcode(Turma $turma)
    {
        // Gerar QR Code com url para registrar desperdício dessa turma
        $url = route('desperdicios.create', $turma->id);

        $qr = QrCode::size(300)->generate($url);

        return response($qr)->header('Content-Type', 'image/svg+xml');
    }

    public function create()
    {
        $turmas = Turma::all();
        return view('turmas.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'turno' => 'required|string|max:100',
        ]);

        // Cria e armazena a nova turma
        $turma = Turma::create([
            'nome' => $request->nome,
            'turno' => $request->turno,
        ]);

        // Gera QR Code da nova turma
        $qrCode = QrCode::format('png')->size(300)->generate(route('turma.registrar', $turma->id));
        Storage::put("public/qrcodes/{$turma->id}.png", $qrCode);

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        return view('turmas.edit', compact('turma'));
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'turno' => 'required|string|max:50',
        ]);

        $qrCode = QrCode::format('png')->size(300)->generate(route('turma.registrar', $turma->id));
        Storage::put("public/qrcodes/{$turma->id}.png", $qrCode);

        $turma->update($request->all());

        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
    }

    public function showDesperdicios($id)
    {
        // Busca a turma pelo ID
        $turma = Turma::findOrFail($id);

        // Busca os registros de desperdício dessa turma, ordenados por data
        $registros = $turma->desperdicios()->orderBy('data')->get();

        // Passa os dados para a view
        return view('turmas.desperdicios', compact('turma', 'registros'));
    }
}
