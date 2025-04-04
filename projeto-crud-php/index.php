<?php
    require 'connection.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid mt-2">
            <a class="navbar-brand text-light fs-3" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Usuários</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between h4">Lista de veículos<a href="veiculo-create.php" class="btn btn-primary">Adicionar</a></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Ano</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Ações</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * from carros"; 
                                $carros = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($carros) > 0) {
                                    foreach($carros as $carro) {
                            ?>
                            <tr>
                                <td><?=$carro['id']?></td>
                                <td><?=$carro['marca']?></td>
                                <td><?=$carro['modelo']?></td>
                                <td><?=$carro['ano']?></td>
                                <td><?=$carro['placa']?></td>
                                <td class="d-flex p-1">
                                    <form action="crud.php" method="POST">
                                        <button class="btn bg-warning text-white m-1" name="edit_carro" value="<?=$carro['id']?>">Editar</button>
                                        <button class="btn bg-danger text-white m-1" name="exclude_carro" value="<?=$carro['id']?>">Excluir</button>
                                    </form>
                                </td>
                                <!----> 
                            </tr>
                            <?php
                                }
                            }
                            else {
                                echo "<h5>Nenhum carro encontrado</h5>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>