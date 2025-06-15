@extends('layouts.navbar')

@section('title', 'Visualizar Solicitação')
@section('content')

<div class="card" style="width: 80rem;">
    <div class="card-body">
        <h5 class="card-title">Solicitação</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Visualize as informações da solicitação.</h6>
        <div class="d-inline-flex p-2">
            <div class="d-flex align-items-center m-2">
                <span class="h6 mx-2">Nome: </span>
                <div class="card">
                    <span class="mx-4">{{$solicitacao->servidor->name}}</span>
                </div>
            </div>
            <div class="d-flex m-2">
                <span class="h6 mx-2">CPF: </span>
                <div class="card">
                    <span class="mx-4">{{$solicitacao->servidor->cpf}}</span>
                </div>
            </div>
            <div class="d-flex m-2">
                <span class="h6 mx-2">Unidade: </span>
                <div class="card">
                    <span class="mx-4">{{$solicitacao->unidade}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection