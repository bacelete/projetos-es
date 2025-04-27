@extends('layouts.navbar')

@section('title', 'Listar Solicitação')

@section('content')
<div class="container p-1">
    <div class="card shadow-lg mt-4" id="teste">
        <div id="liveAlertPlaceholder"></div>
        <div class="card-header p-4 d-flex justify-content-between align-items-center flex-wrap">
            <h2>Lista de solicitações</h2>

            <form class="d-inline" action="/solicitacao" id="formAdd">
                <button class="btn btn-outline-secondary btn-sm ms-2"><i class="fa-solid fa-plus"></i></button>
            </form>

            <input class="ms-auto w-25 p-1" type="text" name="search" id="search" onkeyup="searchFilter()" placeholder="Digite o nome do servidor...">

            <form method="POST" id="formDelete" action="../backend/exclude_all.php">
                <button type="submit" name="excluir_tudo" id="excluir_tudo" class="btn bg-danger text-white m-2 btn-sm">Excluir tudo<i class="fa-solid fa-trash m-1"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover shadow-sm rounded mb-5 mt-3" style="cursor:pointer">
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
            </table>
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