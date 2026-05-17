<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riuso.it</title>
</head>
<body>
    <div>
        <h1>Un utente ha richiesto di diventare revisore</h1>
        <h2>Ecco i suoi dati:</h2>
        <ul>
            <li>Nome: {{$user->name}} </li>
            <li>Email: {{$user->email}} </li>
        </ul>
        <p>Se vuoi renderl* revisor, clicca qui: 
            <a href="{{route('make.revisor', compact('user'))}}">Accetta richiesta</a>
        </p>
    </div>    
</body>
</html>