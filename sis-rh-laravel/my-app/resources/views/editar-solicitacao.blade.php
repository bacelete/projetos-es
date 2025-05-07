@extends('layouts.navbar')

@section('title', 'Editar Solicitação')
@section('content')

<div class="container w-75">
            <div id="liveAlertPlaceholder"></div>
            <div class="shadow mt-5">
                <div class="card-header h2 p-4 bg-dark text-white rounded-2">Editar solicitação</div>
                <div class="card-body mt-2 p-4">
                    <form method="POST" action="/solicitacao/store" class="needs-validation" novalidate>
                        @csrf
                        <div>
                            <label for="unidade" class="form-label">Unidade (UBS):</label>
                            <input type="text" name="unidade" value ="{{ $solicitacao->unidade }}" id="unidade" class="form-control" required>
                        </div>

                        <div>
                            <label for="nome" class="form-label mt-3">Nome do servidor:</label>
                            <input type="text" value="{{ $solicitacao->servidor->name }}" name="nome" id="nome" class="form-control" placeholder="Digite o nome do servidor" required>
                        </div>

                        <div class="datas d-flex mt-3">
                            <div class="mt-3">
                                <label for="data_inicio">Data de início:</label>
                                <input
                                    type="date"
                                    value="{{ $solicitacao->data_inicio }}"
                                    id="data_inicio"
                                    name="data_inicio"
                                    required />
                            </div>
                            <div class="mt-3 m-auto">
                                <label for="data_fim">Fim do afastamento:</label>
                                <input
                                    type="date"
                                    value="{{ $solicitacao->data_fim }}"
                                    id="data_fim"
                                    name="data_fim"
                                    required />
                            </div>
                        </div>

                        <div>
                            <label class="form-label mt-4">Motivo da substituição:</label><br>

                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="motivo" id="demissao" value="Demissão" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="demissao">Demissão</label>
                                <input type="radio" class="btn-check" name="motivo" id="afastamento" value="Afastamento" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="afastamento">Afastamento</label>
                                <input type="radio" class="btn-check" name="motivo" id="ferias" value="Férias" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="ferias">Férias</label>
                                <input type="radio" class="btn-check" name="motivo" id="outros" value="Outros" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="outros">Outros</label>
                            </div>

                        </div>


                        <div id="outrosMotivoContainer" class="mt-3" style="display: none;">
                            <label for="motivo_outros" class="form-label">Descreva o motivo:</label>
                            <input type="text" class="form-control" name="motivo_outros" id="motivo_outros">
                        </div>

                        <div class="d-flex mt-4 justify-content-between">
                            <a href="/solicitacoes" name="voltar" id="voltar" class="btn w-20 justify-content-center text-white mt-4 bg-danger">Voltar</a>
                            <button type="submit" class="btn d-block w-20 justify-content-center text-white mt-4 bg-secondary" id="editar" name="editar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection