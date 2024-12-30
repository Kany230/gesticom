@extends('layout')
@section('title', 'Commande de ')

@section('content')
       <h2>Commande du client: {{$client->first_name}}
        {{$client->last_name}}
       </h2>
       <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande )
            @foreach($commande->produit as $produit)
            <tr>
                <td>{{$commandes->id}}</td>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->pivot->quantite}}</td>
                <td>{{$produit->prixRevente}}</td>
                <td>{{$produit->pivot->quantite * $produit->pivot->prixRevente}}</td>
            </tr>
            @endforeach
            
        </tbody>
       </table> 
    @endforeach
@endsection

public function store(){
        $service = new Commandes();

        $commandes = $service->gett();
     
       foreach ( $commandes as $services) {
            $newCommande = new Commande();
            $newCommande->clients_id = $services['clients_id'];
            $newCommande->produits_id = $services['produits_id'];
            $newCommande->user_id = $services['user_id'];
            $newCommande->create();
        }
        //Commande::create($commandes);
        return redirect()->route('commande.index');
    }