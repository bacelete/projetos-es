<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Servidor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GestorController extends Controller
{
    public function index() {
        return view('gerar-solicitacao'); 
    }

    public function store(Request $request): void {
        $servidor = new Servidor;  

        $servidor->name = $request->name;
        $servidor->save(); 

        $solicitacao = new Solicitacao; 
        $solicitacao->id_servidor = $servidor->id; 
        $solicitacao->id_gestor = Auth::guard()->id();
        $solicitacao->unidade = $request->unidade;
        $solicitacao->motivo = $request->motivo;
        $solicitacao->data_inicio = $request->data_inicio;
        $solicitacao->data_fim = $request->data_fim;

        $solicitacao->save(); 
    }

    public function delete(Request $request): RedirectResponse 
    {
        $arrayOfFkIds[] = (string)$request['id'];

        Solicitacao::where('id', $arrayOfFkIds)->delete();
        return redirect()->back(); 
    }
}
