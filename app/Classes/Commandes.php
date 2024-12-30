<?php
namespace App\Classes;

use App\Models\Clients;
use App\Models\Produits;
use App\Models\Commande as CommandeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Commandes{
    public $commande = [];
    public $commandes = [];

    public function __construct(){
        $this->loadCommand();
    }

    private function loadCommand(){

        $user = Auth::user();
        $client = $user->clients;

        foreach($client as $clients){
            $produit = Produits::where('nom_articles', $clients->produit)->first();
            if($produit){
                $this->commande[] = [
                    'first_name' => $clients->first_name,
                    'last_name' => $clients->last_name,
                    'phone' => $clients->phone,
                    'produit' => $clients->produit,
                    'quantite' => $clients->quantite,
                    'prixRevente' => $produit->prixRevente,
                    'total' => $clients->quantite * $produit->prixRevente
                ];
            }
        }
    }

    public function getCommandes(){
        return $this->commande;
    }

    public function gett(){
        
        $user = Auth::user();
        $client = $user->clients;

        foreach($client as $clients){
            $produit = Produits::where('nom_articles', $clients->produit)->first();
            if($produit){
                $this->commandes[] = [
                    'clients_id' =>$client,
                    'user_id'=>$user,
                    'produits_id' =>$produit,
                ];
            }

            return $this->commandes;
    }
}
}