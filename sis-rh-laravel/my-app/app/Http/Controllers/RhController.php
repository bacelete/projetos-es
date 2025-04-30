<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Solicitacao;

class RhController extends Controller
{
    public function index() 
    {
        $solicitacoes = Solicitacao::all();
        return view('listar-solicitacao', ['solicitacoes' => $solicitacoes]); 
    }
}
