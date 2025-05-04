<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;

class SolicitacaoController extends Controller
{
    public function index() 
    {
        if (Auth::guard('rh')) {
            $solicitacoes = Solicitacao::all(); 
        }
        if (Auth::guard('gestor')) {
            $solicitacoes = Solicitacao::where('id_gestor', auth()->guard()->id())->get(); 
        }
        return view('listar-solicitacao', compact('solicitacoes')); 
    }
}
