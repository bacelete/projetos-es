<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function index(): View 
    {
        $solicitacoes = DB::table('solicitacao')->get();
        return view('listar-solicitacao', ['solicitacoes' => $solicitacoes]); 
    }

    public function create(): View {
        return view('gerar-solicitacao'); 
    }
}
