<!DOCTYPE html>
<html lang="fr">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="{{ asset('css/style.css')}}">
       <title>@yield("title")</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    
    <body>
   
   <div class="wrapperL">
    <div class="sidebarL">
        <div class="headerL">
            <img src="{{asset('images\file-3PLoqqPsuK5zEnpkrgFHpz.webp')}}" alt="logo" class="logo">
            
        </div>
        <div>
        <ul class="menuL">
            <li>
               <a href="{{route('clients.index')}}">
               <img src="{{asset('images\5698676.png')}}" alt="clients" class="icon">
                Clients
               </a>
            </li>
            <li>
                <a href="{{route('produits.start')}}">
                    <img src="{{asset('images\1784037.png')}}" alt="produit" class="icon">
                    Produits
                </a>
            </li>
            <li>
                <a href="{{route('depenses.index')}}">
                    <img src="{{asset('images\3728793.png')}}" alt="fournisseurs" class="icon">
                    Depenses
                </a>
            </li>
            <li>
                <a href="{{route('prets.index')}}">
                    <img src="{{asset('images\images.png')}}" alt="fournisseurs" class="icon">
                    Emprunt
                </a>
            </li>
            <li>
                <a href="{{route('rapports.index')}}">
                    <img src="{{asset('images\4149706.png')}}" alt="rapport" class="icon">
                    Rapports
                </a>
            </li>
            <li>
                <a href="{{route('users.logout')}}">
                <img src="{{asset('images\3240728.png')}}" alt="deconnexion" class="icon">
                    Deconnexion
                </a>
            </li>
        </ul>
    </div>

   </div>
    
    <div class="main-content">
        <main class="'container mt-3">
        @yield('content')
    </main> 
    </div>
   
 
    
   