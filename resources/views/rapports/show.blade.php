<!DOCTYPE html>
<html lang="en">
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
<body class="rapport">
    <div class="containerRapport">
        <header class="headerRapport">
        <a href="{{route('rapports.index')}}">
               <img src="{{asset('images\precedent (1).png')}}" alt="rapports" class="icon">
               </a>
            <h1>Rapport Financier</h1>
            <p>Période: {{$rapport->start_date}} à {{$rapport->end_date}}</p>
        </header>
        <section class="summaryRapport">
            <h2 class="h2Rapport">Résumé Exécutif</h2>
            <table class="tableRapport">
                <thead>
                    <tr>
                        <th>Revenus totaux</th>
                        <th>Depenses Totales</th>
                        <th>Profit Net </th>
                    </tr>
                </thead>
                <tbody>
                    <td>{{$rapport->sommeTotal}}</td>
                    <td>{{$rapport->depense}}</td>
                    <td>{{$rapport->profitNet}}</td>

                </tbody>
            </table>
        </section>
        <section class="summaryRapport">
            <h2 class="h2Rapport">Détails des Revenus</h2>
            <table class="tableRapport">
                <thead>
                    <tr>
                        <th>Ventes</th>
                        <th>Montant (fr CFA)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Produits</td>
                        <td>{{$rapport->sommeProduit}}</td>
                    </tr>
                    <tr>
                        <td>Depenses</td>
                        <td>{{$rapport->depense}}</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="summaryRapport">
            <h2 class="h2Rapport">Bilan Financier</h2>
            <table class="tableRapport">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Montant (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Somme Dette</td>
                        <td>{{$rapport->totalDette}}</td>
                    </tr>
                    <tr>
                        <td>Pret de l'entreprise</td>
                        <td>{{$rapport->sommePret}}</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="summaryRapport">
            <h2 class="h2Rapport">Rentabilité de l'entreprise</h2>
            <table class="tableRapport">
                <thead>
                    <tr>
                        <th>Ratio de rentabilité (%)</th>
                        <th>Retour sur investissement (%) (ROI)</th>
                    </tr>
                </thead>
                <tbody>
                    <td>{{$rapport->RR}}</td>
                    <td>{{$rapport->ROI}}</td>
                </tbody>
            </table>
        </section>
        <footer class="footerRapport">
            <p class="pRapport">&copy; 2024 Rapport Financier</p>
        </footer>
    </div>
</body>
</html>
