<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;   

class Gestor extends Authenticatable
{
    protected $table = "gestor";
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function solicitacao(): BelongsTo
    {
        return $this->belongsTo(Solicitacao::class);
    }

}
