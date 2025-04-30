<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solicitacao extends Model
{
    protected $table = "solicitacao";
    protected $fillable = [
        'id_servidor',
        'id_gestor',
        'unidade',
        'motivo',
        'data_inicio',
        'data_fim',
        'data_solicitacao'
    ];

    public function gestores(): HasMany
    {
        return $this->hasMany(Gestor::class); 
    } 

}
