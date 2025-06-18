@extends('layouts.navbar')

@section('title', 'Listar Solicitação')
@section('content')

<div class="container p-1">
    <div class="alert alert-light shadow-sm mt-3" role="alert">
        Para atribuir ou alterar o status de uma solicitação, clique no botão <button type="submit" class="button btn btn-primary btn-sm mx-1">Visualizar</button>
    </div>
    <div class="card shadow-lg mt-4" id="teste">
        <div id="liveAlertPlaceholder"></div>
        <div class="card-header p-4 d-flex align-items-center flex-wrap">
            <h2><i class="fa-solid fa-list-ul m-2 fs-3"></i>Lista de solicitações</h2>
            @if(Auth::guard('gestor')->check())
            <a href="/solicitacao" class="button btn btn-lg fs-2 ms-1"><i class="fa-solid fa-circle-plus"></i></a>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped shadow-sm rounded mb-5 mt-3 p-2" style="cursor:pointer">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Unidade</th>
                        <th>Motivo</th>
                        <th>Início</th>
                        <th>Conclusão</th>
                        <th>Data/hora</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($solicitacoes) <= 0)
                        <h5 class="p-2">Nenhuma solicitação foi encontrada!</h5>
                        @endif

                        @foreach($solicitacoes as $solicitacao)
                        <tr class="clickable-row" data-url="/solicitacao/{{ $solicitacao->id }}">
                            <td>{{ $solicitacao->id }}</td>
                            <td>{{ $solicitacao->servidor->name}}</td>
                            <td>{{ $solicitacao->unidade }}</td>
                            <td>{{ $solicitacao->motivo }}</td>
                            @if($solicitacao->data_inicio)
                            <td>{{ date("d/m/Y", strtotime($solicitacao->data_inicio)) }}</td>
                            @else
                            <td>-</td>
                            @endif
                            @if($solicitacao->data_fim)
                            <td>{{ date("d/m/Y", strtotime($solicitacao->data_fim))}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{ $solicitacao->data_solicitacao }}</td>
                            @if($solicitacao->status)
                            <td class="status">{{$solicitacao->status}}</td>
                            @else
                            <td>-</td>
                            @endif

                            <td class="d-flex justify-content-end">
                                @if(Auth::guard('gestor')->check())
                                <form action="/solicitacao/{{ $solicitacao->id }}" method="GET">
                                    @csrf
                                    <button type="submit" class="button btn btn-primary btn-sm m-1">Visualizar</button>
                                </form>
                                <form action="/solicitacao/edit/{{ $solicitacao->id }}" method="GET">
                                    @csrf
                                    <button type="submit" class="button btn btn-warning btn-sm text-white m-1">Editar</button>
                                </form>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                </tbody>
            </table>
            @if(count($solicitacoes) > 0)
            <form action="/gerar-pdf">
                @csrf
                <button type="submit" class="button btn btn-outline-dark">Gerar PDF</button>
            </form>
            @endif
            <footer class="d-flex justify-content-end"></footer>
        </div>
    </div>
</div>

<script>
    // Garante que o script só vai rodar depois que a página carregar completamente
    document.addEventListener('DOMContentLoaded', function() {
        // Pega todas as linhas que têm a classe 'clickable-row'
        const rows = document.querySelectorAll('.clickable-row');

        // Para cada linha encontrada...
        rows.forEach(row => {
            // Adiciona um "ouvinte" de evento de clique
            row.addEventListener('click', () => {
                // Pega a URL que guardamos no atributo 'data-url'
                const url = row.dataset.url;
                // Redireciona a página para a URL
                window.location.href = url;
            });
        });
    });
</script>



@endsection