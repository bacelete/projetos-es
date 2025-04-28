<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $table = "servidor";
    protected $fillable = ['nome'];
}
