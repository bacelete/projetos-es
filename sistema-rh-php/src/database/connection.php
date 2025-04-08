<?php
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $database = "sistema_rh";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if(!$conn) {
        die("Falha na conexão com o banco de dados!");
        return; 
    }

?>