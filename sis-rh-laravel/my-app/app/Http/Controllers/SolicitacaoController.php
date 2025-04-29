<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Servidor;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function create(): View {
        return view('gerar-solicitacao'); 
    }

    public function store(Request $request): void {
        $servidor = new Servidor;  

        $servidor->nome = $request->nome;
        $servidor->save(); 

        $solicitacao = new Solicitacao; 
    }
}
