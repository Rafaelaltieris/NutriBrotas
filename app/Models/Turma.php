<?php

// app/Models/Turma.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Turma extends Model
{
    protected $fillable = ['nome', 'turno', 'qrcode'];

    protected static function booted()
    {
        static::creating(function ($turma) {
            $turma->qrcode = Str::uuid(); // ou use outro gerador exclusivo
        });
    }

    public function desperdicios()
    {
        return $this->hasMany(Desperdicio::class);
    }
}
