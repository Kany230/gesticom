<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Classes\Commandes;
use App\Models\Commande;
use Carbon\Carbon;

class CommandeController extends Controller
{
    public function index(){
        $service = new Commandes();

        $commandes = $service->getCommandes();

        
        return view('commande.index', compact('commandes'));
    }

    

    public function show($phone){
        $client = Clients::where('phone', $phone)->first();

        if(!$client){
            return response()->json(['message'=>'Client introuvable'], 404);
        }

        $commandes = $client->commande()->with('produits')->get();
        dd($commandes);
        return view('commande.show',['client'=>$client, 'commandes'=>$commandes]);
    }
    //
}
