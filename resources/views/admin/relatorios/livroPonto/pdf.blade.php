<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Livro de Ponto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
        tfoot th {
            position: sticky;
            bottom: 0;
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="text-center" style="text-align: center;">
        <center>
            <img src="imagens/insignia.png" alt="" style="width: 10%">
            <p>
                <br>
                República de Angola<br>
                Ministério da Educação<br>
                SMARTBITS<br>
                Sistema Hospitalar<br>
            </p>
        </center>
    </div>
    <h2>Relatório de Livro de Ponto</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Médico</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livroPontos as $livroPonto)
                <tr>
                    <td>{{ $livroPonto->medicos()->first()->id }}</td>
                    <td>{{ $livroPonto->medicos->first_name }} {{ $livroPonto->medicos->last_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($livroPonto->entrada)->format('H:i') }}</td>
                    <td>
                        @if($livroPonto->saida)
                            {{ \Carbon\Carbon::parse($livroPonto->saida)->format('H:i') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($livroPonto->created_at)->format('Y/m/d') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th title="ID">ID</th>
                <th title="Médico">Médico</th>
                <th title="Entrada">Entrada</th>
                <th title="Saída">Saída</th>
                <th title="Data">Data</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
