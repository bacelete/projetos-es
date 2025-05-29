<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servidor extends Model
{
    protected $table = "servidor";
    protected $fillable = [
        'name', 'cpf'
    ];

    public function solicitacao(): HasMany {
        return $this->hasMany(Solicitacao::class);
    }
}
