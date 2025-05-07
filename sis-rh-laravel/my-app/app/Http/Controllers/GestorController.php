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
        return view('enviar-solicitacao'); 
    }

    public function store(StoreSolicitacaoRequest $request): RedirectResponse {
        $servidor = new Servidor;  

        $request->validated(); //valida a requisicao

        $servidor->name = $request->name;
        $servidor->save(); 

        $solicitacao = new Solicitacao; 
        $solicitacao->id_servidor = $servidor->id; 
        $solicitacao->id_gestor = Auth::guard()->id();
        $solicitacao->unidade = $request->unidade;
        $solicitacao->motivo = $request->motivo;

        if ($request->motivo == "Outros") {
            $solicitacao->motivo = $request->motivo_outros; 
        }
        
        $solicitacao->data_inicio = $request->data_inicio;
        $solicitacao->data_fim = $request->data_fim;

        $solicitacao->save(); 
        return back(); 
    }

    public function delete(Request $request): RedirectResponse 
    {
        $arrayOfFkIds[] = (string)$request['id'];

        Solicitacao::where('id', $arrayOfFkIds)->delete();
        return redirect()->back(); 
    }

    public function edit(Request $request) {
        $id = $request['id']; 
        $solicitacao = Solicitacao::where('id', $id)->first();
        return view('editar-solicitacao', compact('solicitacao'));
    }

    public function salvar() {
        
    }


}
