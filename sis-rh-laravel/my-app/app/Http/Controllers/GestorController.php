<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Solicitacao;
use App\Models\Servidor;

class GestorController extends Controller
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
