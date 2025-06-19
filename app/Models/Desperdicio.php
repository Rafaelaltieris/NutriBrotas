<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desperdicio extends Model
{
    use HasFactory;

    protected $table = 'desperdicios';

    protected $fillable = [
        'turma_id',
        'refeicao_id',
        'user_id',
        'quantidade_bruta',
        'quantidade_proteina',
        'data',
    ];


    // Relacionamento com Turma
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    // Relacionamento com Refeicao
    public function refeicao()
    {
        return $this->belongsTo(Refeicao::class);
    }

    // Relacionamento com User (Nutricionista)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
