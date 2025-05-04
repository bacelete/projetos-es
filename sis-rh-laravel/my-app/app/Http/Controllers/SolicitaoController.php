<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;

class SolicitaoController extends Controller
{
    public function index() 
    {
        $solicitacoes = Solicitacao::with('servidor')->get();
        return view('listar-solicitacao', compact('solicitacoes')); 
    }
}
