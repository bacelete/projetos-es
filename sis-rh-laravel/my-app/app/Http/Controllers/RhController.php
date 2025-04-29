<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitacao;

class RhController extends Controller
{
    public function index(): View 
    {
        $solicitacoes = Solicitacao::all();
        return view('listar-solicitacao', ['solicitacoes' => $solicitacoes]); 
    }
}
