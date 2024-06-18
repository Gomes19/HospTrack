<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Médicos</title>
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
    <h2>Relatório De Médicos</h2>
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Genero</th>
                <th>Especialidade</th>
                <th>Area</th>
                <th>Hospital</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
            <tr>
                <td>{{$medico->id}}</td>
                <td>{{$medico->first_name}}</td>
                <td>
                    {{$medico->last_name}}
                </td>
                <td>@if($medico->genero == 'm') Masculino @elseif($medico->genero == 'f') Feminino @endif </td>
                <td>
                    {{$medico->especialidade()->first()->vc_nome}}
                </td>
                <td>{{$medico->area()->first()->vc_nome}}</td>
                <td>
                    {{$medico->hospital()->first()->nome}}
                </td>
            </tr>
            </div>
        </div>
        </div>
            @endforeach
        </tbody>
            <tfoot>
                <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Genero</th>
                <th>Especialidade</th>
                <th>Area</th>
                <th>Hospital</th>
                </tr>
            </tfoot>
    </table>
</body>
</html>



