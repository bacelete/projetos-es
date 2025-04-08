<!-- login.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../style/styles_login.css">
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-box">
        <h1 id="titulo-login">Login</h1>
        <form action="../backend/validar-login.php" method="post">
            <div class="box-input">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="usuario" placeholder="Digite seu usuário">
            </div>
            <div class="box-input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="senha" placeholder="Digite sua senha">
            </div>
            <button class="login-button" type="submit">Entrar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>
</html>
