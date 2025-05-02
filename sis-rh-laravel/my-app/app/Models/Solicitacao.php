<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(Gestor::class); 
    } 

    public function servidor(): BelongsTo
    {
        return $this->belongsTo(Servidor::class); 
    } 
}
