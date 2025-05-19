<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="card border-light mx-auto w-50">
        <div class="card-header">
            <h2>Login</h2>
        </div>
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Endereço de email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>
        </div>
        <form action="/login" method="post"></form>
        <button class="btn btn-dark">Entrar</button>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
</body>

</html>