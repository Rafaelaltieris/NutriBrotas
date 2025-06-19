<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function desperdicios()
    {
        return $this->hasMany(Desperdicio::class);
    }
}