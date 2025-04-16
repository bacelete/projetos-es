<?php
require('../database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/alert.js"></script>
</head>

<body>
    <?php include('./navbar.php') ?>
    <div class="container p-3 w-100">
        <div id="liveAlertPlaceholder"></div>
        <div class="card shadow-lg mt-3">
            <div class="card-header p-4 d-flex justify-content-between align-items-center flex-wrap">
                <h2>Lista de solicitações
                    <form class="d-inline" action="./inserir-solicitacao.php" method="POST">
                        <button class="btn btn-outline-secondary btn-sm ms-2"><i class="fa-solid fa-plus"></i></button>
                </h2>

                <input class="ms-auto w-25 p-1" type="text" name="search" id="search" onkeyup="searchFilter()" placeholder="Digite o nome do servidor...">

                <form method="POST" id="formDelete">
                    <button type="submit" name="excluir_tudo" id="excluir_tudo" class="btn bg-danger text-white m-2 btn-sm">Excluir tudo<i class="fa-solid fa-trash m-1"></i></button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-hover shadow-sm rounded mb-5 mt-3" style="cursor:pointer">
                    <thead class="table-light">
                        <tr>
                            <th>ID da Solicitação</th>
                            <th>Servidor</th>
                            <th>Unidade</th>
                            <th>Motivo</th>
                            <th>Início</th>
                            <th>Conclusão</th>
                            <th>Data/hora</th>
                        </tr>
                    </thead>
                    <?php
                    $queryIdServidor = "SELECT id_servidor FROM solicitacao";
                    $result = mysqli_query($conn, $queryIdServidor); //retorna o resultado da query

                    $querySolicitacao = "
                            SELECT 
                                s.id,
                                sv.nome AS nome_servidor    ,
                                s.unidade,
                                s.motivo,
                                s.data_inicio,
                                s.data_fim,
                                s.data_solicitacao
                            FROM solicitacao s INNER JOIN servidor sv ON s.id_servidor = sv.id
                        ";

                    $solicitacoes = mysqli_query($conn, $querySolicitacao);


                    function badgeClass($motivo)
                    {
                        switch (strtolower($motivo)) {
                            case 'férias':
                                return 'badge bg-warning text-dark';
                            case 'demissão':
                                return 'badge bg-danger text-white';
                            case 'afastamento':
                                return 'badge bg-info text-dark';
                            case 'licença':
                                return 'badge bg-primary text-white';
                            default:
                                return 'badge bg-secondary text-white';
                        }
                    }

                    if (mysqli_num_rows($solicitacoes) > 0) {
                        foreach ($solicitacoes as $solicitacao) {
                    ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?= $solicitacao["id"] ?></td>
                                    <td><?= $solicitacao["nome_servidor"] ?></td>
                                    <td><?= $solicitacao["unidade"] ?></td>
                                    <td>
                                        <span class="<?= badgeClass($solicitacao["motivo"]) ?>">
                                            <?= $solicitacao["motivo"] ?>
                                        </span>
                                    </td>
                                    <td><?= $solicitacao["data_inicio"] ?></td>
                                    <td><?= $solicitacao["data_fim"] ?></td>
                                    <td>
                                        <?= $solicitacao["data_solicitacao"] ?>
                                        <div class=" d-inline float-end">
                                            <form class="d-inline" method="POST" action="../components/editar-solicitacao.php">
                                                <button name="edit" id="edit" value="<?= $solicitacao["id"] ?>" class="btn btn-warning text-white btn-sm">Editar</button>
                                            </form>
                                            <form class="d-inline" method="POST" action="../backend/exclude.php">
                                                <button class="btn btn-danger text-white btn-sm" name="exclude" value="<?= $solicitacao["id"] ?>">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    } else {
                        echo "<p class='fw-bold'>Nenhuma solicitação encontrada</p>";
                    }
                    ?>
                </table>
                <form action="../dompdf/gerar-pdf.php" method="POST">
                    <button class="btn btn-outline-secondary btn-sm" name="gerarPdf"><i class="fa-solid fa-file-export m-1"></i>Exportar como PDF</button>
                </form>
            </div>
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
    </script>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>

</html>