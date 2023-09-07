<!DOCTYPE html>
<html>
<head>
    <title>Lembrete Diário das Suas Tarefas</title>
</head>
<body>
    <h1>Olá, {{ $user->name }}</h1>
    
    <p>Aqui estão suas tarefas em andamento para hoje:</p>
    
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->tituloTarefa }}</li>
        @endforeach
    </ul>
    
    <p>Esperamos que você tenha um dia produtivo!</p>
</body>
</html>
