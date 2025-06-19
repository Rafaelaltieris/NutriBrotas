<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeExportController extends Controller
{
    public function export()
    {
        $turmas = Turma::all();

        // Para cada turma, gerar o QR Code como base64
        foreach ($turmas as $turma) {
            $url = route('desperdicios.create', $turma->id);
            $qrCode = QrCode::format('svg')->size(200)->generate($url);
            $turma->qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCode);
        }

        $pdf = Pdf::loadView('turmas.qrcodes-pdf', compact('turmas'));
        return $pdf->download('qrcodes_turmas.pdf');
    }
}