<!DOCTYPE html>
<html lang="fr">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="{{ asset('css/style.css')}}">
       <title>Acceuil</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <section class="trois" id="trois">
            <div class="quatre">
                <h2>Simplifiez la gestion de votre commerce avec GestiCom</h2><br>
                <p>Un outil moderne pour maitriser vos finances et booster vos bénéfices !</p>
                <a href="{{route('users.register')}}" class="six">S'INSCRIRE</a>
                <a href="{{route('users.login')}}" class="six">SE CONNECTEZ</a>
            </div>
        </section>
        <section class="sept" id="sept">
            <div class="text">
                <div class="huit">
                    <h2 class="titre">A propos</h2>
                    <p class="ligne">"GestiCom" est un site internet innovant conçue pour 
                        faciliter la gestion comptable et financière des entreprises informelles. Dans un 
                        contexte où la majorité des petites entreprises au Sénégal évoluent sans
                        outils de gestion adaptés, "GestiCom" répond au besoin de simplicité, 
                        d'efficacité et d'organisation pour maximiser les bénéfices et structurer 
                        les activités.Il a comme objectif de simplifier la comptabilité pour 
                        permettre aux entrepreneurs de suivre leurs revenus et dépenses facilement,
                        d'automatiser les calculs (calcul des bénéfices, marges et soldes sans 
                        effort manuel), d'améliorer la prise de décision(offrir des rapports 
                        clairs sur la santé financière de l'entreprise) et encourager la 
                        formalisation (initier les entreprises informelles à des pratiques 
                        professionnelles).
                    </p>
                </div>
                <div class="huit">
                    <div class="image"><img src="{{ asset('images\file-3PLoqqPsuK5zEnpkrgFHpz.webp')}}"class="d-block w-100" alt="Photo 1" width="300">
                    </div>
                </div>
            </div>
        </section>
        <section class="neuf" id="neuf">
            <h2 class="titre">Fonctionnalités principales</h2>
            <ul class="neufUn">
                <li>
                    <h3>Gestion des revenus et dépenses</h3>
                    <p>Enregistrement des ventes journalières <br>
                      Suivi des coûts directs et indirects.
                    </p>
                </li>
                <li>
                    <h3>Suivi des bénéfices</h3>
                    <p>Calcul automatique des marges bénéficiaires.<br>
                       Historique mensuel ou annuel des performances.
                    </p>
                </li>
                <li>
                    <h3>Personnalisation des catégories</h3>
                    <p>Création de catégories adaptées 
                        aux différents secteurs (commerce, artisanat, 
                        transport, etc.).
                    </p>
                </li>
                <li>
                    <h3>Notifications intelligentes</h3>
                    <p>Alertes pour les échéances de 
                        paiement ou les stocks faibles.
                    </p>
                </li>
                <li>
                    <h3>Rapports financiers</h3>
                    <p>Rapport pour identifier les produits les plus rentables
                    </p>
                </li>
                
            </ul>
        </section>
        <section class="dix" id="dix">        
            <h2 class="titre">Public cible</h2>
            <div class="dixUn">
                <div class="boxImg">
                <img src="{{ asset('images\CARNET-DE-DETTE-1.png')}}"alt="Photo 1">
                <h3>Commerce de detail</h3>
                <p>Boutique de quartier<br>
                   Marchands ambulaunts<br>
                   Tabliers: vendeurs installés au bord des routes
                </p>
                </div>
                <div class="boxImg">
                <img src="{{ asset('images\gargo.jpg')}}"alt="Photo 1">
                <h3>Restauration et alimentation</h3>
                <p>Cantines informelles<br>
                   Boulangeries artisanales<br>
                   Vendeurs de boissons locales
                </p>
                </div>
                <div class="boxImg">
                <img src="{{ asset('images\photo_triees_jour_1.jpg')}}"alt="Photo 1">
                <h3>Artisanat</h3>
                <p>Menuisiers traditionnels<br>
                   Tailleurs<br>
                   Bijoutiers
                </p>
                </div>
                <div class="boxImg">
                <img src="{{ asset('images\Taxis-brousse2.jpg')}}"alt="Photo 1">
                <h3>Transport informel</h3>
                <p>Conducteurs clando<br>
                   Moto ou taxis<br>
                   Chauffeurs de charrettes
                </p>
                </div>
                <div class="boxImg">
                <img src="{{ asset('images\salon-coiffure-cheveux-naturels-dakar.jpg')}}"alt="Photo 1">
                <h3>Prestations de services</h3>
                <p>Coiffure et esthétique<br>
                   Réparation d'appareils<br>
                   Photographe de rue
                </p>
                </div>
                <div class="boxImg">
                <img src="{{ asset('images\71806806-50019993.jpg')}}"alt="Photo 1">
                <h3>Secteur de la contruction</h3>
                <p>Maçons et ouvriers independants<br>
                   Fabricants de briques<br>
                   Peintres en batiment
                </p>
                </div>

                <div class="boxImg">
                <img src="{{ asset('images\wp-image-1049990640jpeg.jpg')}}"alt="Photo 1">
                <h3>Activités agricoles et agroalimentaires</h3>
                <p>Transformation artisanales<br>
                    jardins maraichers: Cultures de legumes et fruits destinés à la vente locale
                </p>
                </div>
                <div class="boxImg">
                <img src="{{ asset('images\hq720_1.jpg')}}"alt="Photo 1">
                <h3>Couture et revente de vetements</h3>
                <p>Revente de vetements de seconde main(Friperies)<br>
                   Fabrications artisanales: couture et vente de vetements traditionnels
                </p>
                </div>
                
            </div>
        </section>
        
        <footer class="bg-dark text-white text-center py-0" >Copyright 2024 Tous droits réservé
        </footer>
    </body>
</html>
   
                        