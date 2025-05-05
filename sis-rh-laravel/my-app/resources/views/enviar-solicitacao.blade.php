@extends('layouts.navbar')

@section('title', 'Gerar Solicitação')
@section('content')


<div id="react-alert"></div> <!--alert carregado pelo vite (react)-->

<div class="container w-70">
    <div id="liveAlertPlaceholder"></div>
    <div class="shadow mt-5">
        <div class="card-header target h2 p-4 text-white bg-dark rounded-2">Solicitação</div>
        <div class="card-body mt-2 p-4">
            <form method="POST" action="/solicitacao/store" class="needs-validation form-floating" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="unidade" class="form-label">Unidade (UBS):</label>
                    <div class="input-group">
                        <button class="btn btn-outline-dark" type="button" id="button-addon1"><i class="fa-solid fa-building"></i></button>
                        <input type="text" name="unidade" id="unidade" class="form-control" placeholder="Digite o nome da unidade" required>
                    </div>
                </div>
                <div>
                    <label for="name" class="form-label mt-3">Nome do servidor:</label>
                    <div class="input-group">
                        <button class="btn btn-outline-dark" type="button" id="button-addon1"><i class="fa-solid fa-user"></i></button>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome do servidor" required>
                    </div>
                </div>

                <div class="datas d-flex mt-4">
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
                    <label class="form-label mt-5">Motivo da substituição:</label><br>

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

                <div class="d-flex mt-4 justify-content-end" id="react-button">
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