@extends('layouts.navbar')

@section('title', 'Gerar Solicitação')
@section('content')


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

<div class="alert alert-success" role="alert" style="display: none;">
  <i class="fa-solid fa-circle-check m-2"></i>Sucesso! A solicitação foi enviada com sucesso!
</div>

<div class="container" style="width: 85%;">
    <div id="liveAlertPlaceholder"></div>
    <div class="shadow mt-5">
        <div class="card-header target h2 p-4 text-white bg-dark rounded-2">Solicitação</div>
        <div class="card-body mt-2 p-4">
            <form method="POST" action="/solicitacao/store" class="needs-validation form-floating" novalidate>
                @csrf
                <div>
                    <label for="name" class="form-label mt-1">Nome Completo:</label><span class="target"> *</span>
                    <div class="input-group">
                        <input type="text" name="name" id="name" class="form-control" required>
                        <div class="invalid-feedback">
                            Digite o nome do servidor.
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="cpf" class="form-label mt-1">CPF: </label><span class="target"> *</span>
                    <div class="input-group">
                        <input type="text" name="cpf" id="cpf" class="form-control" required>
                        <div class="invalid-feedback">
                            Digite o CPF do servidor.
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="unidade" class="form-label">Unidade (UBS):</label><span class="target"> *</span>
                    <div class="input-group">
                        <input type="text" name="unidade" id="unidade" class="form-control" required>
                        <div class="invalid-feedback">
                            Digite o nome da unidade.
                        </div>
                    </div>
                </div>

                <div>
                    <label class="form-label mt-4">Motivo da substituição:</label><span class="target"> *</span><br>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="motivo" id="demissao" value="Demissão" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="demissao">Demissão</label>
                        <input type="radio" class="btn-check" name="motivo" id="afastamento" value="Afastamento" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="afastamento">Afastamento</label>
                        <input type="radio" class="btn-check" name="motivo" id="ferias" value="Férias" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="ferias">Férias</label>
                        <input type="radio" class="btn-check" name="motivo" id="outros" value="Outros" autocomplete="off" required>
                        <label class="btn btn-outline-dark" for="outros">Outros</label>
                        <div class="invalid-feedback">
                            <span class="m-3 align-center text-center">Escolha um motivo.</span>
                        </div>
                    </div>
                </div>

                <div class="datas d-flex mt-4">
                    <div class="mt-3">
                        <label for="data_inicio">Data de início:</label>
                        <input
                            type="date"
                            id="data_inicio"
                            name="data_inicio" />
                    </div>
                    <div class="mt-3 m-auto">
                        <label for="data_fim">Fim do afastamento:</label>
                        <input
                            type="date"
                            id="data_fim"
                            name="data_fim" />
                    </div>
                </div>

                <div class="form-floating mt-5">
                    <div class="invalid-feedback">
                        Digite uma observação.
                    </div>
                    <textarea class="form-control" name="observacao" placeholder="Digite uma observação aqui" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Observações<span class="target"> *</span>: </label>
                </div>


                <div id="outrosMotivoContainer" class="mt-3" style="display: none;">
                    <label for="motivo_outros" class="form-label">Descreva o motivo:</label>
                    <input type="text" class="form-control" name="motivo_outros" id="motivo_outros">
                </div>

                <div class="d-flex mt-4 justify-content-between" id="react-button">
                    <a href="/solicitacoes" name="voltar" id="voltar" class="btn w-20 justify-content-center text-white mt-4 bg-danger">Voltar</a>
                    <button type="submit" id="btnEnviarSolicitacao" class="btn d-block w-20 justify-content-center text-white mt-4 bg-success">Enviar</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('input[name="motivo"]').forEach(function(el) {
            el.addEventListener('change', function() {
                const outrosContainer = document.getElementById('outrosMotivoContainer');
                if (this.id === 'outros') {
                    outrosContainer.style.display = 'block';
                    document.getElementById('motivo_outros').required = true;
                } else {
                    outrosContainer.style.display = 'none';
                    document.getElementById('motivo_outros').required = false;
                }
            });
        });
    </script>

</div>
@endsection