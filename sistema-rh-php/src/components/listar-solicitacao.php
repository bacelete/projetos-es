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
</head>

<body>
    <?php include('./navbar.php') ?>
    <div class="container p-2 w-100">
        <div class="card mt-3">
            <div class="card-header d-flex">
                <h2>Lista de solicitações
                    <form method="POST" class="d-inline">
                        <button type="submit" name="excluir_tudo" class="btn bg-danger text-white m-2">Excluir tudo<i class="fa-solid fa-trash m-1"></i></button>
                    </form>
                </h2>
                <?php
                require('../database/connection.php');
                if (isset($_POST["excluir_tudo"])) {
                    $sql = "DELETE FROM solicitacao";
                    $exclude = mysqli_escape_string($conn, $sql);
                    $result = mysqli_query($conn, $exclude);
                }
                ?>
            </div>
            <div class="card-body">
                <table class="table table-hover" style="cursor:pointer">
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

                    if (mysqli_num_rows($solicitacoes) > 0) {
                        foreach ($solicitacoes as $solicitacao) {
                    ?>
                            <tbody>
                                <tr>
                                    <td><?= $solicitacao["id"] ?></td>
                                    <td><?= $solicitacao["nome_servidor"] ?></td>
                                    <td><?= $solicitacao["unidade"] ?></td>
                                    <td><?= $solicitacao["motivo"] ?></td>
                                    <td><?= $solicitacao["data_inicio"] ?></td>
                                    <td><?= $solicitacao["data_fim"] ?></td>
                                    <td>
                                        <?= $solicitacao["data_solicitacao"] ?>
                                        <div class="m-2 d-inline">
                                            <form class="d-inline" method="POST" action="../backend/edit.php">
                                                <button class="btn btn-warning text-white">Editar</button>
                                            </form>
                                            <form class="d-inline" method="POST" action="../backend/exclude.php">
                                                <button class="btn btn-danger text-white" name="exclude" value="<?=$solicitacao["id"]?>">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>

</html>