<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Hospitais</title>
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
    <table id="input-datatable" class="table" data-toggle="data-table-column-filter">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Documento</th>
            <th>Estado</th>
            <th>Admin</th>
            <th>Médicos</th>
            <th>Funcionários</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hospitais as $hospital)
        <tr>
            <td>{{$hospital->id}}</td>
            <td>
                {{$hospital->nome}}
            </td>
            <td>{{$hospital->tipo()->first()->vc_nome}}</td>
            
            <td>
                @if($hospital->documentos()->first()->documento)
                <a target= "_blank" href="{{$hospital->documentos()->first()->documento}}">Enviado</a>
                @else
                Não enviado
                @endif
            </td>
            
            <td>
            
            @if($hospital->estado == 0)

            <li>
            Em Análise
            </li>

            @endif
            @if($hospital->estado == 1)
            
            Aprovado

            @endif

            @if($hospital->estado == 2)

            Não Aprovada
            

            @endif                            
            </td>
            
            <td>
            {{$hospital->user()->where('cargo', 0)->first()->name}}
            </td>
            <td>
            {{$hospital->medicos()->count()}}
            </td>
            <td>
            {{$hospital->user()->where('cargo', '!=', 0)->count()}}
            </td>
        </tr>   
        @endforeach
    </tbody>
        <tfoot>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Documento</th>
            <th>Estado</th>
            <th>Admin</th>
            <th>Médicos</th>
            <th>Funcionários</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>