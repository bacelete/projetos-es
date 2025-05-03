<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitacaoRequest;
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

    public function store(StoreSolicitacaoRequest $request): RedirectResponse {
        $servidor = new Servidor;  

        $request->validated(); 

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
        return redirect()->route('gerar-solicitacao');
    }

    public function delete(Request $request): RedirectResponse 
    {
        $arrayOfFkIds[] = (string)$request['id'];

        Solicitacao::where('id', $arrayOfFkIds)->delete();
        return redirect()->back(); 
    }

    public function edit(Request $request): RedirectResponse  {
        return redirect()->route('editar-solicitacao'); 
    }

}
