@extends('layouts.navbar')

@section('title', 'Listar Solicitação')
@section('content')

<div class="container p-1">
    <div class="card shadow-lg mt-4" id="teste">
        <div id="liveAlertPlaceholder"></div>
        <div class="card-header p-4 d-flex justify-content-between align-items-center flex-wrap">
            <h2><i class="fa-solid fa-list-ul m-2 fs-3"></i>Lista de solicitações</h2>
            <input class="ms-auto w-25 p-1" style="border: 1px solid #ccc; border-radius: 6px; box-shadow: none; outline: none;"type="text" name="search" id="search" onkeyup="searchFilter()" placeholder="Digite o nome do servidor...">
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
                    @foreach($solicitacoes as $solicitacao)
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
                                <button type="button" class="btn btn-warning btn-sm text-white m-1">Editar</button>
                                <form action="/delete/{{$solicitacao->id}}" method="post">
                                    <button type="button" class="btn btn-danger btn-sm text-white m-1">Excluir</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <footer class="d-flex justify-content-end"></footer>
        </div>
    </div>
    <script>
        const table = document.querySelector("table");
        const tr = table.getElementsByTagName("tr");
        const input = document.getElementById("search");

        function searchFilter() {
            const filter = input.value.toUpperCase();
            console.log(tr);

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[1];

                if (td.textContent.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }

            }
        }

        const footer = document.getElementsByTagName("footer")[0];

        function exibirNumeroDeLinhas() {
            let numLinhas = tr.length - 1;

            let elemHTML = document.createElement("p");
            elemHTML.textContent = `Exibindo 1 a ${numLinhas} de ${numLinhas} linhas`;
            elemHTML.classList.add("text-secondary");

            footer.appendChild(elemHTML);
        }

        exibirNumeroDeLinhas();
    </script>
</div>
@endsection