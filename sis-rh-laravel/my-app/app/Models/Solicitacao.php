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
        'observacao', 
        'data_inicio',
        'data_fim',
        'data_solicitacao',
        'status'
    ];

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(Gestor::class, 'id_gestor'); 
    } 

    public function servidor(): BelongsTo
    {
        return $this->belongsTo(Servidor::class, 'id_servidor'); 
    } 
}
