@extends('layouts.navbar')

@section('title', 'Listar Solicitação')
@section('content')

<div class="container p-1">
    <div class="card shadow-lg mt-4" id="teste">
        <div id="liveAlertPlaceholder"></div>
        <div class="card-header p-4 d-flex justify-content-between align-items-center flex-wrap">
            <h2><i class="fa-solid fa-list-ul m-2 fs-3"></i>Lista de solicitações</h2>
            @if(Auth::guard('gestor')->check())
            <a href="/solicitacao" class="button btn btn-lg fs-2 ms-1"><i class="fa-solid fa-circle-plus"></i></a>
            @endif
            <input class="ms-auto w-25 p-1" style="border: 1px solid #ccc; border-radius: 6px; box-shadow: none; outline: none;" type="text" name="search" id="search" placeholder="Digite o nome do servidor...">
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
                        <tr>
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
                                <td>{{$solicitacao->status}}</td>
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
@endsection