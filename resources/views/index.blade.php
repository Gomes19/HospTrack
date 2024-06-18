<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="">Nome</label>
        <input type="text" name="nome">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Senha</label>
        <input type="password" name="senha">
        <input type="submit">
    </form>

    <table border="1">
        <thead>
            <th>Nome</th>
            <th>Email</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ route('users.delete',$user->id) }}">Eliminar</a></td>
        </tr>
    @endforeach
    </tbody>
        
    </table>
</body>
</html>