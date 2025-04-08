<?php
require('../database/connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //var_dump($_POST);
    $id_gestor = $_SESSION['id']; //pega o id do gestor que está logado

    $nome_servidor = mysqli_real_escape_string($conn, $_POST["nome"]);
    $sql_servidor = "INSERT INTO servidor(nome) VALUES('$nome_servidor')";

    if (!mysqli_query($conn, $sql_servidor)) {
        echo "Não foi possível enviar os dados do servidor.";
        return;
    }

    $id_servidor = mysqli_insert_id($conn); //pega o ultimo id gerado 

    $unidade = mysqli_real_escape_string($conn, $_POST["unidade"]);
    $motivo =  mysqli_real_escape_string($conn, $_POST["motivo"]);
    $data_inicio =  mysqli_real_escape_string($conn, $_POST["data_inicio"]);
    $data_fim =  mysqli_real_escape_string($conn, $_POST["data_fim"]);

    if(strtolower($motivo) === "outros" && isset($_POST["motivo_outros"])) {
        $motivo = mysqli_real_escape_string($conn, $_POST["motivo_outros"]); 
    }

    $sql = "INSERT INTO solicitacao(id_servidor, id_gestor, unidade, motivo, data_inicio, data_fim) VALUES
        ('$id_servidor', '$id_gestor', '$unidade', '$motivo', '$data_inicio', '$data_fim')";

    if (!mysqli_query($conn, $sql)) {
        echo "Não foi possível enviar os dados da solicitação.";
        return;
    }

    header("Location: ../components/listar-solicitacao.php");
    exit;
}

mysqli_close($conn);
?>