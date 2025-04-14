<?php
    require('../database/connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "DELETE FROM solicitacao";
        $exclude = mysqli_escape_string($conn, $sql);
        $result = mysqli_query($conn, $exclude);
    }

    header("Location: ../components/listar-solicitacao.php");
    exit;
?>
