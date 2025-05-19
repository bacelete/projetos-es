@extends('layouts.navbar')

@section('title', 'Listar Solicitação')
@section('content')


<div class="container p-1">
    <div class="card shadow-lg mt-4" id="teste">
        <div id="liveAlertPlaceholder"></div>
        <div class="card-header p-4 d-flex justify-content-between align-items-center flex-wrap">
            <h2><i class="fa-solid fa-list-ul m-2 fs-3"></i>Lista de solicitações</h2>
            @if(Auth::guard('gestor')->check())
            <a href="/solicitacao" class="btn btn-dark btn-sm ms-3 rounded-circle"><i class="fa-solid fa-plus"></i></a>
            @endif
            <input class="ms-auto w-25 p-1" style="border: 1px solid #ccc; border-radius: 6px; box-shadow: none; outline: none;" type="text" name="search" id="search" placeholder="Digite o nome do servidor...">
        </div>
        <div class="card-body">
            <table class="table table-hover shadow-sm rounded mb-5 mt-3 p-2" style="cursor:pointer">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Servidor</th>
                        <th>Unidade</th>
                        <th>Motivo</th>
                        <th>Início</th>
                        <th>Conclusão</th>
                        <th>Data/hora</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($solicitacoes) <= 0)
                    <h5>Nenhuma solicitação foi encontrada!</h5>
                    @endif

                    @foreach($solicitacoes as $solicitacao)
                    <!-- Modal -->
                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Deseja excluir a solicitação?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Ao excluir a solicitação, você não poderá ter acesso a ela. <br>Tem certeza que deseja fazer isso?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                    <form action="/solicitacao/delete/{{ $solicitacao->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td>{{ $solicitacao->id }}</td>
                        <td>{{ $solicitacao->servidor->name}}</td>
                        <td>{{ $solicitacao->unidade }}</td>
                        <td>{{ $solicitacao->motivo }}</td>
                        <td>{{ date("d/m/Y", strtotime($solicitacao->data_inicio)) }}</td>
                        <td>{{ date("d/m/Y", strtotime($solicitacao->data_fim))}}</td>
                        <td>{{ $solicitacao->data_solicitacao }}</td>
                        @if(Auth::guard('gestor')->check())
                        <td class="d-flex">
                            <form action="/solicitacao/edit/{{ $solicitacao->id }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm text-white m-1">Editar</button>
                            </form>
                            <button type="button" class="btn btn-sm btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Excluir
                            </button>
                        </td>
                        @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <footer class="d-flex justify-content-end"></footer>
        </div>
    </div>
</div>
@endsection