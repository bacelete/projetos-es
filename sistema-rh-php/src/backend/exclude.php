<?php
    require('../database/connection.php');

    if(isset($_POST["exclude"])) {
        $id = $_POST["exclude"]; 
        $sql = "DELETE FROM solicitacao WHERE id = '$id'"; 
    
        $result = mysqli_query($conn, $sql); 

        header("Location: ../components/listar-solicitacao.php");
        exit;
    }
?>