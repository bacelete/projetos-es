<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @viteReactRefresh <!--tag pra add o vite-->
    @vite(['resources/js/app.jsx', 'resources/css/pagination.css', 'resources/css/target.css',
    'resources/js/scripts/validacao-form.js']) <!--tag pra add o vite-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @if(Auth::user())
    <!-- Vertically centered modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Fazer logout</h3>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja fazer logout? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <nav class="d-flex navbar navbar-expand-lg bg-dark">
        <div class="container-fluid mt-2">
            <a style="font-size: 2.5rem" class="navbar-brand text-light align-self-center fw-bold" href="#">SIRH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fs-6">Solicitação</span>
                    </button>
                    <button type="button" class="btn btn-dark btn-sm">
                        <span class="fs-6">Configuração</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/solicitacao"><i class="fa-solid fa-arrow-right m-2"></i>Enviar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/solicitacoes"><i class="fa-solid fa-list-ol m-2"></i>Listar</a></li>
                    </ul>
                </div>
                <span class="navbar-text align-self-center ms-auto fs-5 text-light fw-bold">
                    Bem-vindo, {{ Auth::user()->name }}!
                </span>
                <button class="btn btn-danger btn-sm m-2 text-white rounded-circle" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
        </div>
        <button id="recolherMenu" style="display: none" name="recolherMenu" class="btn btn-sm btn-outline-light mt-auto m-4 align-self-center"><i class="fa-solid fa-arrow-left m-1"></i>Recolher menu</button>
        @endif
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/291cf6cb9c.js" crossorigin="anonymous"></script>
</body>

</html>