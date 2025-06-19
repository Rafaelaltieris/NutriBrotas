<?php

namespace App\Exports;

use App\Models\Desperdicio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DesperdicioExport implements FromCollection, WithHeadings
{
    protected $inicio;
    protected $fim;

    public function __construct($inicio, $fim)
    {
        $this->inicio = $inicio;
        $this->fim = $fim;
    }

    public function collection()
    {
        return Desperdicio::whereBetween('data', [$this->inicio, $this->fim])->get([
            'id',
            'turma_id',
            'refeicao_id',
            'user_id',
            'quantidade_bruta',
            'quantidade_proteina',
            'data'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Turma ID',
            'Refeição ID',
            'Usuário ID',
            'Quantidade Bruta',
            'Quantidade Proteína',
            'Data',
        ];
    }
}