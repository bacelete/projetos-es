<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;

class SolicitacaoController extends Controller
{
    public function index() 
{
    if (Auth::guard('rh')->check()) {
        $solicitacoes = Solicitacao::all(); 
    } elseif (Auth::guard('gestor')->check()) {
        $user = Auth::guard('gestor')->user();
        $solicitacoes = Solicitacao::where('id_gestor', $user->id)->get(); 
    } else {
        abort(403, 'Acesso não autorizado.');
    }

    return view('listar-solicitacao', compact('solicitacoes')); 
}
}
