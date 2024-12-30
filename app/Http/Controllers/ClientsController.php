<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Produits;
use App\Models\Commande;
use Symfony\Contracts\Service\Attribute\Required;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $user = Auth::user();
        $client = $user->clients;
        $clientPaye = Clients::where('status','payée')->get();
        $clientDette = Clients::where('status','dette')->get();
        //Affichage des clients et la somme des clients, produits, commandes et dettes
        $totalAchat = DB::table('clients')->select('first_name','last_name','phone','address',
        DB::raw('COUNT(DISTINCT DATE(created_at)) AS total_achats'),
        DB::raw('GROUP_CONCAT(DISTINCT DATE(created_at) ORDER BY DATE(created_at) ASC SEPARATOR ",") AS dates_achats'))->groupBy('first_name','last_name','phone','address')->having('total_achats','>',15)->orderBy('total_achats','DESC')->get();
        $totalClients = $client->count();
        $totalPaye = $client->where('status','payée')->count();
        $totalDette = $client->where('status','dette')->count();
        $clients = Clients::orderBy("created_at","DESC")->get();
        return view('clients.index', compact('client', 'clientPaye', 'clientDette', 'totalClients','totalPaye', 'totalDette', 'totalAchat'));
    }

    
    public function show($id){
        $client = Clients::find($id);

        if(!$client || $client->user_id !==Auth::id()){
            abort(404,'Acces non autorisé');
        }
        $user = Auth::user();
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Formulaire d'enregistrement d'un client
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //dd($validated['user_id']);
        //Enregistrement apres validation 
        $validated = $request->validate(([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'produit'=>'required',
            'quantite'=>'required',
            'prixRevente'=>'required',
            'status'=>'',
            
        ]));
       
        
        if($request->dette){
            $validated['status']='payée';
        }
        
        if(!$request->user_id){
            $validated['user_id']=$user->id;
        }

        $secteur = $user->secteur;
        //dd($secteur);
        if($secteur == 'Boutique de quartier' || $secteur == 'Tabliers: vendeurs installés au bord des routes' || $secteur == 'Marchands ambulaunts' || $secteur == 'jardins maraichers: Cultures de legumes et fruits destinés à la vente locale' || $secteur == 'Transformation artisanales'){
            $nomProduit = $validated['produit'];
            $quantiteProduit = $validated['quantite'];
            $calculProduit = Produits::where('user_id', $user->id)->where('nom_articles', $nomProduit)->first();
            if(!$calculProduit){
                session()->flash('error','Ce produit n\'existe pas !!!');
                return redirect()->route('clients.index');
            }

            if($calculProduit->stock < $quantiteProduit){
                session()->flash('error','Le stock de ce produit est insuffisant !!!');
                return redirect()->route('clients.index');
            }

            $calculProduit->stock -= $quantiteProduit;
            $calculProduit->count += 1;
            $calculProduit->save();
        }
       
         //dd( $validated['produits_id']);
        Clients::create($validated);
        session()->flash('success','Client enregistré avec success !!!');
        return redirect()->route('clients.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clients = Clients::findOrFail($id);
        $produit = Produits::all();
        //Afficher la formulaire d'un clients
        return view('clients.edit', compact('clients', 'produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        //Modifier un client apres validation
        $validated = $request->validate([
           'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'produit'=>'required',
            'quantite'=>'required',
            'prixRevente'=>'required',
            'status'=>'',
        ]);

        if($request->dette){
            $validated['status']='payée';
        }

        $clients = Clients::findOrFail($id);
        $secteur = $user->secteur;
        if($secteur == 'Boutique de quartier' || $secteur == 'Tabliers: vendeurs installés au bord des routes' || $secteur == 'Marchands ambulaunts' || $secteur == 'jardins maraichers: Cultures de legumes et fruits destinés à la vente locale' || $secteur == 'Transformation artisanales'){
            $nomProduit = $validated['produit'];
            $quantiteProduit = $validated['quantite'];
            $ancienProduit = $clients->produit;
            $ancienQuantite = $clients->quantite;
            if($nomProduit === $ancienProduit){
                $calculProduit = Produits::where('user_id', $user->id)->where('nom_articles', $nomProduit)->first();
                if($calculProduit){
                    $diff = $quantiteProduit - $ancienQuantite;
                    if($diff > 0){
                        if($calculProduit->stock < $diff){
                            session()->flash('error','Le stock de ce produit est insuffisant !!!');
                            return redirect()->route('clients.index');            
                        }
                        $calculProduit->stock -= $diff;
                    }
                    elseif($diff < 0){
                        $calculProduit->stock += abs($diff);
                    }

                    //dd($calculProduit);
                    $calculProduit->save();
                }
            }else{
                $ancienProduitss = Produits::where('user_id', $user->id)->where('nom_articles', $ancienProduit)->first();
                if($ancienProduitss){
                    $ancienProduitss->stock += $ancienQuantite;
                    $ancienProduitss->save();
                }
                $nomProduitss = Produits::where('user_id', $user->id)->where('nom_articles', $nomProduit)->first();
                if(!$nomProduitss || $nomProduitss->stock < $quantiteProduit){
                    session()->flash('error','Le stock de ce produit est insuffisant !!!');
                    return redirect()->route('clients.index');    
                }
                $nomProduitss->stock -= $quantiteProduit;
                $nomProduitss->save();
            }
            
        }

       
        $clients->update($validated);
        session()->flash('success','Client enregistré avec success !!!');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        //Supprimer un client
        $clients=Clients::findOrFail($id);
        $secteur = $user->secteur;
        if($secteur == 'Boutique de quartier' || $secteur == 'Tabliers: vendeurs installés au bord des routes' || $secteur == 'Marchands ambulaunts' || $secteur == 'jardins maraichers: Cultures de legumes et fruits destinés à la vente locale' || $secteur == 'Transformation artisanales'){
            $nomProduit = $clients->produit;
            $quantiteProduit = $clients->quantite;
            $calculProduit = Produits::where('user_id', $user->id)->where('nom_articles', $nomProduit)->first();
            if($calculProduit){
                $calculProduit->stock += $quantiteProduit;
                $calculProduit->save();    
            }
        }
        $clients->delete();
        session()->flash('success','Client supprimé avec success !!!');
        return redirect()->route('clients.index');
    }

    public function search(Request $request){
        //recuperer la recherche
        $query = $request->input('query');
        $client = [];
        $user = Auth::user();
        if($query){
            $keywords = explode(' ', $query);
            $client = Clients::where('user_id', $user->id)
            ->where(function($q) use ($keywords){
                foreach($keywords as $keyword){
                    $q->where(function($subQuery) use ($keyword){
                        $subQuery->where('first_name', 'like', "%{$keyword}%")
                        ->orwhere('last_name', 'like', "%{$keyword}%");
                    });
                }
            })->get();;
        }
            
        
        //dd($client);
        return view('clients.search', compact('client', 'query'));
    }
}
