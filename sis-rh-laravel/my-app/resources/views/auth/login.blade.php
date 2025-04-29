<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"">
    <title>Login</title>
</head>

<body>
    <div class="login-box">
        <h1 id="titulo-login">Login</h1>
        <form action="/login" method="post">
            @csrf
            <div class="box-input">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" placeholder="Digite seu email">
            </div>
            <div class="box-input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Digite sua senha">
            </div>
            <button class="login-button" type="submit">Entrar</button>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
</body>

</html>