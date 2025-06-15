@extends('layouts.navbar')

@section('title', 'Visualizar Solicitação')
@section('content')

<div class="card" style="width: 80rem;">
    <div class="card-body p-4">
        <h3 class="card-title">Solicitação</h3>
        <h6 class="card-subtitle mb-2 text-body-secondary">Visualize as informações da solicitação.</h6>
        <div class="row p-2">
            <div class="col">
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
            <div class="col">
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
    </div>
</div>
@endsection