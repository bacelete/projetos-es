<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <script src="../js/script.js"></script>
    <script src="../js/editarSolicitacao.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>

<body>
    <?php include('./navbar.php')?>
    <main>
        <div class="container w-75">
            <div id="liveAlertPlaceholder"></div>
            <div class="shadow mt-5">
                <div class="card-header h2 p-4 bg-dark text-white rounded-2">Editar solicitação</div>
                <div class="card-body mt-2 p-4">
                    <form method="POST" action="../backend/edit.php" class="needs-validation" novalidate>
                        <?php
                            require('../database/connection.php'); 

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $id = mysqli_real_escape_string($conn, $_POST["edit"]); 

                                $sql = "SELECT
                                    s.id,
                                    sv.nome AS nome_servidor,
                                    s.unidade,
                                    s.data_inicio,
                                    s.data_fim
                                    FROM solicitacao s INNER JOIN servidor sv ON s.id_servidor = sv.id WHERE s.id = $id
                                ";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach($result as $solicitacao) {
                        ?>
                        <div>
                            <label for="unidade" class="form-label">Unidade (UBS):</label>
                            <input type="text" name="unidade" value ="<?=$solicitacao["unidade"]?>" id="unidade" class="form-control" placeholder="Digite o nome da unidade" required>
                            <div class="invalid-feedback">
                                Por favor, digite o nome da unidade.
                            </div>
                        </div>

                        <div>
                            <label for="nome" class="form-label mt-3">Nome do servidor:</label>
                            <input type="text" value="<?=$solicitacao["nome_servidor"]?>" name="nome" id="nome" class="form-control" placeholder="Digite o nome do servidor" required>
                            <div class="invalid-feedback">
                                Por favor, digite o nome completo do servidor.
                            </div>
                        </div>

                        <div class="datas d-flex mt-3">
                            <div class="mt-3">
                                <label for="data_inicio">Data de início:</label>
                                <input
                                    type="date"
                                    value="<?=$solicitacao["data_inicio"]?>"
                                    id="data_inicio"
                                    name="data_inicio"
                                    required />
                                <div class="invalid-feedback">
                                    Por favor, selecione uma data.
                                </div>
                            </div>
                            <div class="mt-3 m-auto">
                                <label for="data_fim">Fim do afastamento:</label>
                                <input
                                    type="date"
                                    value="<?=$solicitacao["data_fim"]?>"
                                    id="data_fim"
                                    name="data_fim"
                                    required />
                                <div class="invalid-feedback">
                                    Por favor, selecione uma data.
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="form-label mt-4">Motivo da substituição:</label><br>

                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="motivo" id="demissao" value="Demissão" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="demissao">Demissão</label>
                                <input type="radio" class="btn-check" name="motivo" id="afastamento" value="Afastamento" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="afastamento">Afastamento</label>
                                <input type="radio" class="btn-check" name="motivo" id="ferias" value="Férias" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="ferias">Férias</label>
                                <input type="radio" class="btn-check" name="motivo" id="outros" value="Outros" autocomplete="off" required>
                                <label class="btn btn-outline-secondary" for="outros">Outros</label>
                                <div class="invalid-feedback">
                                    Por favor, selecione uma das opções.
                                </div>
                            </div>

                        </div>


                        <div id="outrosMotivoContainer" class="mt-3" style="display: none;">
                            <label for="motivo_outros" class="form-label">Descreva o motivo:</label>
                            <input type="text" class="form-control" name="motivo_outros" id="motivo_outros">
                        </div>

                        <div class="d-flex mt-4 justify-content-between">
                            <a href="./listar-solicitacao.php" name="voltar" id="voltar" class="btn w-20 justify-content-center text-white mt-4 bg-danger">Voltar</a>
                            <button type="submit" class="btn d-block w-20 justify-content-center text-white mt-4 bg-secondary" id="editar" name="editar">Enviar</button>
                            <input type="hidden" name="id_solicitacao" value="<?=$solicitacao['id']?>">
                        </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>

</html>