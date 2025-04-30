<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $table = "servidor";
    protected $fillable = ['name'];

    public function solicitacao(): HasMany {
        return $this->hasMany(Solicitacao::class)
    }
}
