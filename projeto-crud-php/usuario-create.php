<?php
require 'connection.php'
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
        <div class="container w-70">
            <form method="post" action="crud.php" class="card shadow mt-5">
                <div class="card-header h3 p-3 bg-primary text-white">Adicionar veículo</div>
                <div class="card-body mt-2 p-4">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" name="marca" id="marca" class="form-control mb-2">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" class="form-control mb-2">
                    <label for="ano" class="form-label">Ano:</label>
                    <input type="text" name="ano" id="ano" class="form-control mb-4">
                    <label for="ano" class="form-label">Placa:</label>
                    <input type="text" name="placa" id="placa" class="form-control mb-4">
                    <a href="index.php" class="btn w-20 justify-content-center text-white btn bg-danger">Voltar</a>
                    <button type="submit" class="btn w-20 justify-content-center text-white btn bg-primary">Enviar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>