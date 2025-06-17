@extends('layouts.navbar')

@section('title', 'Visualizar Solicitação')
@section('content')

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body p-4">
            <h3 class="card-title">Solicitação</h3>
            <h6 class="card-subtitle mb-2 text-body-secondary">Visualize as informações da solicitação.</h6>
            <div class="row p-2">
                <div class="col mt-3">
                    <h5>Dados do Servidor</h5>
                    <hr class="mt-0">
                    <div class="align-items-center m-2">
                        <span class="h6">Nome: </span>
                        <div class="card mt-1">
                            <span class="mx-4 p-1">{{$solicitacao->servidor->name}}</span>
                        </div>
                    </div>
                    <div class="m-2">
                        <span class="h6">CPF: </span>
                        <div class="card mt-1">
                            <span class="mx-4 p-1">{{$solicitacao->servidor->cpf}}</span>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <h5>Dados da solicitação </h5>
                    <hr class="mt-0">
                    <div class="m-2">
                        <span class="h6">Unidade: </span>
                        <div class="card mt-1">
                            <span class="mx-4 p-1">{{$solicitacao->unidade}}</span>
                        </div>
                    </div>
                    <div class="m-2">
                        <span class="h6">Motivo: </span>
                        <div class="card mt-1">
                            <span class="mx-4 p-1">{{$solicitacao->motivo}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <h5>Ações</h5>
                <hr class="mt-0">
                <form method="POST" action="/solicitacao/edit/{{ $solicitacao->id }}/update-status">
                    @csrf
                    <div class="row align-items-end p-2">
                        <div class="col-md-4">
                            <label for="status" class="form-label fw-bold">Alterar Status:</label>
                            <select class="form-select" id="status" name="status" aria-label="Selecione um novo status">
                                <option value="1" @if($solicitacao->status == 'aprovada') selected @endif>Aprovada</option>
                                <option value="2" @if($solicitacao->status == 'pendente') selected @endif>Pendente</option>
                                <option value="3" @if($solicitacao->status == 'em_analise') selected @endif>Em análise</option>
                                <option value="4" @if($solicitacao->status == 'finalizada') selected @endif>Finalizada</option>
                                <option value="5" @if($solicitacao->status == 'recusada') selected @endif>Recusada</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection