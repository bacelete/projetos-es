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
    public function index()
    {
        return view('enviar-solicitacao');
    }

    public function store(StoreSolicitacaoRequest $request): RedirectResponse
    {
        $servidor = new Servidor;

        $request->validated(); //valida a requisicao;

        $servidor->name = $request->name;
        $servidor->cpf = $request->cpf;
        $servidor->save();

        $solicitacao = new Solicitacao;
        $solicitacao->id_servidor = $servidor->id;
        $solicitacao->id_gestor = Auth::guard('gestor')->id();
        $solicitacao->unidade = $request->unidade;
        $solicitacao->motivo = $request->motivo;

        if ($request->motivo == "Outros") {
            $solicitacao->motivo = $request->motivo_outros;
        }

        $solicitacao->observacao = $request->observacao;
        $solicitacao->data_inicio = $request->data_inicio;
        $solicitacao->data_fim = $request->data_fim;

        $solicitacao->save();
        return redirect()->route('solicitacao-view');
    }

    public function edit(Request $request, $id)
    {
        $solicitacao = Solicitacao::with('servidor')->findOrFail($id);
        return view('editar-solicitacao', compact('solicitacao'));
    }

    public function update(StoreSolicitacaoRequest $request): RedirectResponse
    {
        $id = $request->id; //pega do input hidden do blade
        $request->validated(); //valida a requisicao

        $solicitacao = Solicitacao::findOrFail($id);
        $servidor = Servidor::findOrFail($solicitacao->servidor->id);

        // atualiza os dados do servidor: 
        $servidor->name = $request->name;
        $servidor->cpf = $request->cpf;
        $servidor->save();

        // atualiza os dados da solicitação: 
        $solicitacao->unidade = $request->unidade;
        $solicitacao->motivo = $request->motivo;

        if ($request->motivo == "Outros") {
            $solicitacao->motivo = $request->motivo_outros;
        }

        $solicitacao->observacao = $request->observacao;
        $solicitacao->data_inicio = $request->data_inicio;
        $solicitacao->data_fim = $request->data_fim;

        $solicitacao->save();
        return redirect()->route('solicitacoes');
    }

    public function update_status(Request $request, $id) : RedirectResponse {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->status = $request->status; //atualiza no model
        $solicitacao->save(); 
        return redirect()->route('solicitacoes'); 
    }

    public function view (Request $request, $id)
    {
        $solicitacao = Solicitacao::with('servidor')->findOrFail($id);
        return view('visualizar-solicitacao', compact('solicitacao'));
    }
}
