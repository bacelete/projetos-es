@extends('layouts.navbar')

@section('title', 'Gerar Solicitação')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger d-flex justify-content-between">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" aria-label="close"></button>
    </div>
@endif

<div class="container w-70">
    <div id="liveAlertPlaceholder"></div>
    <div class="shadow mt-5">
        <div class="card-header target h2 p-4 text-white bg-dark rounded-2">Solicitação</div>
        <div class="card-body mt-2 p-4">
            <form method="POST" action="/solicitacao/store" class="needs-validation form-floating" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="unidade" class="form-label">Unidade (UBS):</label>
                    <input type="text" name="unidade" id="unidade" class="form-control" placeholder="Digite o nome da unidade" required>
                    <div class="invalid-feedback">
                        Por favor, digite o nome da unidade.
                    </div>
                </div>

                <div>
                    <label for="name" class="form-label mt-3">Nome do servidor:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome do servidor" required>
                </div>

                <div class="datas d-flex mt-3">
                    <div class="mt-3">
                        <label for="data_inicio">Data de início:</label>
                        <input
                            type="date"
                            id="data_inicio"
                            name="data_inicio"
                            required />
                    </div>
                    <div class="mt-3 m-auto">
                        <label for="data_fim">Fim do afastamento:</label>
                        <input
                            type="date"
                            id="data_fim"
                            name="data_fim"
                            required />
                    </div>
                </div>

                <div>
                    <label class="form-label mt-4">Motivo da substituição:</label><br>

                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="motivo" id="demissao" value="Demissão" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="demissao">Demissão</label>
                        <input type="radio" class="btn-check" name="motivo" id="afastamento" value="Afastamento" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="afastamento">Afastamento</label>
                        <input type="radio" class="btn-check" name="motivo" id="ferias" value="Férias" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="ferias">Férias</label>
                        <input type="radio" class="btn-check" name="motivo" id="outros" value="Outros" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="outros">Outros</label>
                    </div>

                </div>


                <div id="outrosMotivoContainer" class="mt-3" style="display: none;">
                    <label for="motivo_outros" class="form-label">Descreva o motivo:</label>
                    <input type="text" class="form-control" name="motivo_outros" id="motivo_outros">
                </div>

                <div class="d-flex mt-4 justify-content-between">
                    <button type="submit" class="btn d-block w-20 justify-content-center text-white mt-4 bg-success" id="enviarSolicitacao" name="enviarSolicitacao">Enviar</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection