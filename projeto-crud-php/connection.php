<?php
    $servername = "localhost";
    $database = "teste";
    $username = "root";
    $password = "root";

    //create connection: 
    $conn = mysqli_connect($servername, $username, $password, $database); 

    if (!$conn) {
        die('Connection failed: '.mysqli_connect_error());
    }

