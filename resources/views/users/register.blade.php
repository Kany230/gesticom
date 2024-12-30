<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="all">
<a href="{{route('users.index')}}" class="precedent">ACCUEIL</a>
<a href="{{route('users.login')}}" class="precedent">SE CONNECTEZ</a>
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>        
                    @endforeach
                </ul>
            </div>        
        @endif

<form method='post' action="{{route('users.store')}}" >

    @csrf
    @method('POST')

    <div class='box'>
        <h1>Inscription</h1>

        <div class='droite'>
        <label for='name'>NOM</label>
    <input value='{{ old('name') }}' type='text' class='form-control' id='name' name='name' placeholder='Ex: Mouhamed' required>
    
</div>

<div class='droite'>
    <label for='email'>EMAIL</label>
    <input value='{{ old('email') }}' type='text' class='form-control' id='email' name='email' placeholder='Ex: mouhamed13@gmail.com' required>
    
</div>


<div class='droite'>
<label for="password">MOT DE PASSE (au moins 8 caracteres)</label>
    <input type='password' id='password' class='form-control' name='password' required>
    
</div>

<div class='droite'>
<label for="password_confirmation">CONFIRMEZ LE MOT DE PASSE</label>
    <input type='password' id='password_confirmation' class='form-control' name='password_confirmation' required>
</div>



<div class='droite'>
    
    <select name="secteur" id="secteur" class='secteur'>
        <option value="" disabled selected>Selectionnez un secteur</option>
        <option value="Boutique de quartier" {{old('secteur')=='Boutique de quartier' ? 'selected' : ''}}>Boutique de quartier</option>
        <option value="Marchands ambulaunts" {{old('secteur')=='Marchands ambulaunts' ? 'selected' : ''}}>Marchands ambulauntst</option>
        <option value="Tabliers" {{old('secteur')=='Tabliers' ? 'selected' : ''}}>Tabliers</option>
        <option value="Cantines informelles" {{old('secteur')=='Cantines informelles' ? 'selected' : ''}}>Cantines informelles</option>
        <option value="Boulangeries artisanales" {{old('secteur')=='Boulangeries artisanales' ? 'selected' : ''}}>Boulangeries artisanales<</option>
        <option value="Vendeurs de boissons locales" {{old('secteur')=='Vendeurs de boissons locales' ? 'selected' : ''}}>Vendeurs de boissons locales</option>
        <option value="Menuisiers traditionnels" {{old('secteur')=='Menuisiers traditionnels' ? 'selected' : ''}}>Menuisiers traditionnels</option>
        <option value="Tailleurs" {{old('secteur')=='Tailleurs' ? 'selected' : ''}}>Tailleurs</option>
        <option value="Bijoutiers" {{old('secteur')=='Bijoutiers' ? 'selected' : ''}}>Bijoutiers</option>
        <option value="Conducteurs clando" {{old('secteur')=='Conducteurs clando' ? 'selected' : ''}}>Conducteurs clando</option>
        <option value="Moto ou taxis" {{old('secteur')=='Moto ou taxis' ? 'selected' : ''}}>Moto ou taxis</option>
        <option value="Chauffeurs de charrettes" {{old('secteur')=='Chauffeurs de charrettes' ? 'selected' : ''}}>Chauffeurs de charrettes</option>
        <option value="Coiffure et esthétique" {{old('secteur')=='Coiffure et esthétique' ? 'selected' : ''}}>Coiffure et esthétique</option>
        <option value="Réparation d\'appareils" {{old('secteur')=='Réparation d\'appareils' ? 'selected' : ''}}>Réparation d'appareils</option>
        <option value="Photographe de rue" {{old('secteur')=='Photographe de rue' ? 'selected' : ''}}>Photographe de rue</option>
        <option value="Maçons et ouvriers independants" {{old('secteur')=='Maçons et ouvriers independants' ? 'selected' : ''}}>Maçons et ouvriers independants</option>
        <option value="Fabricants de briques" {{old('secteur')=='Fabricants de briques' ? 'selected' : ''}}>Fabricants de briques</option>
        <option value="Peintres en batiment" {{old('secteur')=='Peintres en batiment' ? 'selected' : ''}}>Peintres en batiment</option>
        <option value="Transformation artisanales" {{old('secteur')=='Transformation artisanales' ? 'selected' : ''}}>Transformation artisanales<</option>
        <option value="jardins maraichers" {{old('secteur')==' jardins maraichers' ? 'selected' : ''}}> jardins maraichers</option>
        <option value="Revente de vetements de seconde main(Friperies)" {{old('secteur')=='Revente de vetements de seconde main(Friperies)' ? 'selected' : ''}}>Revente de vetements de seconde main(Friperies)</option>
        <option value="Fabrications artisanales" {{old('secteur')=='Fabrications artisanales' ? 'selected' : ''}}>Fabrications artisanales</option>
    </select>
</div>



        <div class="droite">
            <button type="submit">S'INSCRIRE</button>
        </div>

    </div>

</form>



</body>
    