<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <table class="table table-hover table-striped shadow-sm rounded mb-5 mt-3 p-2" style="cursor:pointer">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Unidade</th>
                        <th>Motivo</th>
                        <th>Início</th>
                        <th>Conclusão</th>
                        <th>Data/hora</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($solicitacoes as $solicitacao)
                        <tr>
                            <td>{{ $solicitacao->id }}</td>
                            <td>{{ $solicitacao->servidor->name}}</td>
                            <td>{{ $solicitacao->unidade }}</td>
                            <td>{{ $solicitacao->motivo }}</td>
                            @if($solicitacao->data_inicio)
                            <td>{{ date("d/m/Y", strtotime($solicitacao->data_inicio)) }}</td>
                            @else
                            <td>-</td>
                            @endif
                            @if($solicitacao->data_fim)
                            <td>{{ date("d/m/Y", strtotime($solicitacao->data_fim))}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{ $solicitacao->data_solicitacao }}</td>
                            @endforeach
                        </tr>

                </tbody>
            </table>
</body>
</html>