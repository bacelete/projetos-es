@extends('layouts.navbar')

@section('title', 'Editar Solicitação')
@section('content')

<div id="react-alert-edit"></div>

<div class="alert alert-light shadow-sm mt-3" role="alert">
    Os campos marcados com <span class="target">*</span> são campos obrigatórios.
</div>

@error('cpf')
<div class="invalid-feedback d-block">
    <div class="alert alert-danger shadow-sm mt-3 flex" role="alert">
        <span class="fs-5"><strong>CPF Inválido!</strong></span>
        {{-- A classe 'ms-auto' (margin-start: auto) empurra o botão para o final --}}
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@enderror


<div class="container" style="width: 85%;">
    <div id="liveAlertPlaceholder"></div>
    <div class="shadow mt-5">
        <div class="card-header h2 p-4 bg-dark text-white rounded-2"><i class="fa-solid fa-pen-to-square m-2"></i>Editar solicitação</div>
        <div class="card-body mt-2 p-4">
            <form method="POST" action="/solicitacao/edit/{{ $solicitacao->id }}/save" class="needs-validation" novalidate>
                @csrf
                <div>
                    <label for="nome" class="form-label mt-3">Nome Completo:<span class="target"> *</span></label>
                    <input type="text" value="{{ $solicitacao->servidor->name }}" name="name" id="name" class="form-control" placeholder="Digite o nome do servidor" required>
                </div>


                <div>
                    <label for="cpf" class="form-label mt-3">CPF: <span class="target"> *</span></label>
                    <input type="text" value="{{ $solicitacao->servidor->cpf }}" name="cpf" id="cpf" class="form-control" placeholder="Digite o nome do servidor" required>
                </div>

                <div>
                    <label for="unidade" class="form-label mt-3">Unidade (UBS): <span class="target"> *</span></label>
                    <input type="text" name="unidade" value="{{ $solicitacao->unidade }}" id="unidade" class="form-control" placeholder="Digite o nome da unidade" required>
                </div>

                <div>
                    <label class="form-label mt-4">Motivo da substituição:<span class="target"> *</span></label><br>

                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="motivo" id="demissao" value="Demissão" autocomplete="off" required>
                        <label class="btn btn-outline-secondary" for="demissao">Demissão</label>
                        <input type="radio" class="btn-check" name="motivo" id="afastamento" value="Afastamento" autocomplete="off" required>
                        <label class="btn btn-outline-secondary" for="afastamento">Afastamento</label>
                        <input type="radio" class="btn-check" name="motivo" id="ferias" value="Férias" autocomplete="off" required>
                        <label class="btn btn-outline-secondary" for="ferias">Férias</label>
                        <input type="radio" class="btn-check" name="motivo" id="outros" value="Outros" autocomplete="off" required>
                        <label class="btn btn-outline-secondary" for="outros">Outros</label>
                        <div class="invalid-feedback">
                            <span class="m-3 align-center text-center">Escolha um motivo.</span>
                        </div>
                    </div>
                </div>

                <div class="datas d-flex mt-3">
                    <div class="mt-3">
                        <label for="data_inicio">Data de início:</label>
                        <input
                            type="date"
                            value="{{ $solicitacao->data_inicio }}"
                            id="data_inicio"
                            name="data_inicio"
                            />
                    </div>
                    <div class="mt-3 m-auto">
                        <label for="data_fim">Fim do afastamento:</label>
                        <input
                            type="date"
                            value="{{ $solicitacao->data_fim }}"
                            id="data_fim"
                            name="data_fim"
                            />
                    </div>
                </div>

                <div class="form-floating mt-5">
                    <textarea class="form-control" name="observacao" id="floatingTextarea2" style="height: 100px" required>{{ $solicitacao->observacao }}</textarea>
                    <label for="floatingTextarea2">Observações: <span class="target"> *</span></label>
                    <div class="invalid-feedback">
                        Digite alguma observação.
                    </div>
                </div>


                <div id="outrosMotivoContainer" class="mt-3" style="display: none;">
                    <label for="motivo_outros" class="form-label">Descreva o motivo:</label>
                    <input type="text" class="form-control" name="motivo_outros" id="motivo_outros">
                </div>

                <div class="d-flex mt-4 justify-content-between">
                    <a href="/solicitacoes" name="voltar" id="voltar" class="btn w-20 justify-content-center text-white mt-4 bg-danger">Voltar</a>
                    <input type="hidden" name="id" value="{{ $solicitacao->id }}">
                    <button type="submit" class="btn d-block w-20 justify-content-center text-white mt-4 bg-secondary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection