<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="all">
<a href="{{route('users.index')}}" class="precedent">ACCUEIL</a>
<a href="{{route('users.register')}}" class="precedent">S'INSCRIRE</a>
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>        
                    @endforeach
                </ul>
            </div>        
        @endif
<form method='post' action="{{route('users.store_login')}}">

@csrf
@method('POST')

<div class='boxL'>
    <h1 class="droite">CONNECTION</h1>


<div class="droite">
<label for='email'>EMAIL</label>
<input value='{{ old('email') }}' type='text' class='form-control' id='email' name='email' placeholder='Ex: mouhamed13@gmail.com' required>

</div>


<div class="droite">
<label for="password">MOT DE PASSE (au moins 8 caracteres)</label>
<input type='password' id='password' class='form-control' name='password' required>
</div>

<div class="droite">
            <button type="submit">SE CONNECTEZ</button>
        </div>

</div>
</body>