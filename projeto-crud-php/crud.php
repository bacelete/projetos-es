<?php
    require 'connection.php';

    function findElementByPlaca($conn, $placa) {
        $sql = "SELECT '*' from carros WHERE placa = '$placa'";

        $result = mysqli_query($conn, $sql); 
        if ($result && mysqli_affected_rows($conn) > 0) {
            return true; 
        }
        return false;
    }

    if (isset($_POST)) {
        $modelo = trim($_POST["modelo"]);
        $marca = trim($_POST["marca"]);
        $ano = trim($_POST["ano"]);
        $placa = trim($_POST["placa"]);

        if (findElementByPlaca($conn, $placa)) {
            echo "Placa de veículo já cadastrada.";
            return; 
        }

        $sql ="INSERT INTO carros (marca, modelo, ano, placa) VALUES ('$marca', '$modelo', '$ano', '$placa')";

        mysqli_query($conn, $sql);

        if (mysqli_error($conn)) {
            echo "Não foi possível inserir os valores!";
        }

    }
    mysqli_close($conn);
?>