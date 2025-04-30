<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   

class Rh extends Authenticatable
{
    protected $table = "rh";
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
