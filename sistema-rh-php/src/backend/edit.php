<?php
require('../database/connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_gestor = $_SESSION['id']; //pega o id do gestor que está logado

    $id_solicitacao = mysqli_real_escape_string($conn, $_POST["id_solicitacao"]);
    $nome_servidor = mysqli_real_escape_string($conn, $_POST["nome"]);
    $unidade = mysqli_real_escape_string($conn, $_POST["unidade"]);
    $motivo =  mysqli_real_escape_string($conn, $_POST["motivo"]);
    $data_inicio =  mysqli_real_escape_string($conn, $_POST["data_inicio"]);
    $data_fim =  mysqli_real_escape_string($conn, $_POST["data_fim"]);

    $query_servidor = "SELECT id_servidor FROM solicitacao WHERE id = '$id_solicitacao'";
    $result = mysqli_query($conn, $query_servidor); //realiza a query
    $row = mysqli_fetch_assoc($result); //retorna uma linha do resultado como array associativo
    $id_servidor = $row["id_servidor"];

    $sql_update_servidor = "UPDATE servidor SET nome = '$nome_servidor' WHERE id = '$id_servidor'";

    if (strtolower($motivo) === "outros" && isset($_POST["motivo_outros"])) {
        $motivo = mysqli_real_escape_string($conn, $_POST["motivo_outros"]);
    }
    
    mysqli_query($conn, $sql_update_servidor);

    $sql_update_solicitacao = "UPDATE solicitacao SET
            id_servidor = '$id_servidor', 
            id_gestor = '$id_gestor', 
            unidade = '$unidade', 
            motivo = '$motivo',
            data_inicio = '$data_inicio', 
            data_fim = '$data_fim, 
            data_solicitacao = current_timestamp() WHERE id = '$id_solicitacao'";

    mysqli_query($conn, $sql_update_servidor);

    header("Location: ../components/listar-solicitacao.php");
    exit;
}
