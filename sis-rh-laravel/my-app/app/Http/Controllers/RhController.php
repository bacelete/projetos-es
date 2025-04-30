<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Solicitacao;

class RhController extends Controller
{
    public function index() 
    {
        if (!Auth::guard('gestor')->check()) {
            return redirect()->route('login.form');
        }
        $solicitacoes = Solicitacao::all();
        return view('listar-solicitacao'); 
    }
}
