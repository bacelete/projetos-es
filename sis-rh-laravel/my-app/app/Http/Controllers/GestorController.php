<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class GestorController extends Controller
{
    public function create(): View {
        return view('gerar-solicitacao'); 
    }
}
