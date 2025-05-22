<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    @vite(['resources/js/scripts/validacao-form.js'])
</head>

<body>
    <!--Div de alerta -->
    <div class="alert alert-danger alert-dismissible fade show mx-auto mt-2 p-4 w-75" role="alert" style="display: none;">
        Endereço de e-mail e/ou senha inválidos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div id="card-login" class="card border-light mx-auto w-75 shadow-sm" style="margin-top: 80px; height: 575px;">
        <div class="card-header text-center">
            <span style="font-size: 60px;"><strong>SIRH</strong></span>
        </div>
        <form action="/login" class="mx-auto mb-5 needs-validation" method="post" novalidate>
            @csrf
            <div class="card-body mx-auto mt-4">
                <h4 class="card-title mb-4 text-center">Faça login na sua conta</h4>
                <hr>
                <div class="form-floating mb-3 mt-5" style="width: 300px;">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Endereço de email</label>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-floating mb-4" style="width: 300px;">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Senha</label>
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-dark mt-5" style="width: 300px;">Entrar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
</body>

</html>