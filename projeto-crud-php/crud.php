<?php
    require 'connection.php';

    if (isset($_POST['exclude_carro'])) {
        $carro_id = mysqli_real_escape_string($conn, $_POST['exclude_carro']);
        
        $sql = "DELETE FROM carros where id = $carro_id"; 
        $result = mysqli_query($conn, $sql); 

        if (!$result) {
            echo json_encode(["status"=>"500", "mensagem"=>"Erro ao excluir o carro"]);
            exit; 
        }
        header("Location: index.php");
        exit;
    }

    if (isset($_POST['create_carro'])) {

        $marca = mysqli_real_escape_string($conn, $_POST['marca']);
        $modelo = mysqli_real_escape_string($conn,$_POST['modelo']);
        $ano = mysqli_real_escape_string($conn, $_POST['ano']);
        $placa = mysqli_real_escape_string($conn, $_POST['placa']);

        $sql ="INSERT INTO carros (marca, modelo, ano, placa) VALUES ('$marca', '$modelo', '$ano', '$placa')";
        mysqli_query($conn, $sql);

        if (mysqli_error($conn)) {
            echo json_encode(["status"=>"500", "mensagem"=>"Não foi possível salvar no banco!"]);
            exit; 
        }
        
        header("Location: veiculo-create.php");
        exit;
    }   

    if (isset($_POST['edit_carro'])) {
        require 'veiculo-edit.php';
        exit;
    }

    if (isset($_POST['atualizar_carro'])) {
        $carro_id = $_POST['atualizar_carro']; 

        $marca = mysqli_real_escape_string($conn, $_POST['marca']);
        $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
        $ano = mysqli_real_escape_string($conn, $_POST['ano']);
        $placa = mysqli_real_escape_string($conn, $_POST['placa']);

        $sql = "UPDATE carros SET marca = '$marca', modelo = '$modelo', ano = '$ano', placa = '$placa' WHERE id = '$carro_id'"; 
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo json_encode(["status"=>"500", "mensagem"=>"Não foi possível atualizar os valores!"]); 
            exit; 
        }

        header("Location: index.php");
        exit;
    }

    echo json_encode(["status" => "400", "mensagem" => "Requisição inválida."]);
    mysqli_close($conn);
    exit;
?>