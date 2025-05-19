<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div id="card-login" class="card border-light mx-auto w-75 shadow-sm" style="margin-top: 100px; height: 450px;">
        <div class="card-header text-center">
            <h2>Login</h2>
        </div>
        <div class="card-body mx-auto mt-4">
            <div class="form-floating mb-3" style="width: 300px;">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Endereço de email</label>
            </div>
            <div class="form-floating mb-4" style="width: 300px;">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>
        </div>
        <form action="/login" class="mx-auto mb-5" method="post">
            @csrf
            <button type="submit" class="btn btn-dark" style="width: 300px;">Entrar</button>
        </form>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
</body>

</html>