<?php
    require('../database/connection.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
        $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

        $result = mysqli_query($conn, "SELECT * FROM gestor WHERE usuario = '$usuario' AND senha = '$senha'"); //deve ser alterado dps

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["id"] = $row["id"]; 
            $_SESSION["usuario"] = $usuario; 
            $_SESSION["senha"] = $senha; 

            header("Location: ../components/listar-solicitacao.php");
            exit;
        }

    }
    mysqli_close($conn);
?>