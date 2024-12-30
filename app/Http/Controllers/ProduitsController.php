<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     */
    public function start()
    {
        $user = Auth::user();
        $produit = $user->produits;
        $totalProduit = $produit->count();
        $totalPA = $produit->sum('prixAchat');
        $secteur = $user->secteur;
        //dd($secteur);
        if($secteur == 'Boutique de quartier' || $secteur == 'Tabliers: vendeurs installés au bord des routes' || $secteur == 'Marchands ambulaunts' || $secteur == 'jardins maraichers: Cultures de legumes et fruits destinés à la vente locale' || $secteur == 'Transformation artisanales'){
            //Affichage des produits
            return view('produits.index', compact('produit','totalPA',  'totalProduit'));
   
        }else{
            //Affichage des produits
            return view('produits.index2', compact('produit','totalPA',  'totalProduit'));
        }
        
    }

    public function index()
    {
         $user = Auth::user();
         $produit = $user->produits;
         $totalProduit = $produit->count();
         $totalPA = $produit->sum('prixAchat');
        
         foreach($produit as $produits){
            if($produits->stock <= 10){
                $alerteSms [] = "Le produit {$produit->nom_articles} a atteint une quantité inferieur à 10";
            }
         }
        //Affichage des produits
        return view('produits.index', compact('produit','totalPA',  'totalProduit'));
}

    public function index2()
        {
             $user = Auth::user();
             $produit = $user->produits;
             $totalProduit = $produit->count();
             $totalPA = $produit->sum('prixAchat');
            //Affichage des produits
            return view('produits.index2', compact('produit','totalPA',  'totalProduit'));
    }
    
    public function show($id){
        $produits = Produits::find($id);

        if(!$produits || $produits->user_id !==Auth::id()){
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
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //Enregistrement apres validation 
        $validated = $request->validate([
            'nom_articles'=>'required',
            'stock'=>'required',
            'prixAchat'=>'required',
            'count'=>'0'
             
        ]);
        
        if(!$request->user_id){
            $validated['user_id']=$user->id;
        }

        if(!$request->count){
            $validated['count']=0;
        }
        
        Produits::create($validated);
        session()->flash('success','Produit enregistré avec success !!!');
        return redirect()->route('produits.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produits =Produits::findOrFail($id);
        //Afficher la formulaire d'un clients
        return view('produits.edit', compact('produits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Modifier un client apres validation
        $validated = $request->validate([
            'nom_articles'=>'required',
            'stock'=>'required',
            'prixAchat'=>'required',
            
        ]);

        $produits = Produits::findOrFail($id);

        $produits->update($validated);
        session()->flash('success','Produit enregistré avec success !!!');
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Supprimer un client

        $produits=Produits::findOrFail($id);
        $produits->delete();
        session()->flash('success','Produit supprimé avec success !!!');
        return redirect()->route('produits.index');
    }

    public function search(Request $request){
        //recuperer la recherche
        $query = $request->input('query');
        $produit = [];
        $user = Auth::user();
        if($query){

            $produit = Produits::where('user_id', $user->id)
            ->where(function($q) use ($query){
                    $q->where(function($subQuery) use ($query){
                        $subQuery->where('nom_articles', 'like', "%{$query}%");
                    });
                
            })->get();
        }
            
        
        //dd($client);
        return view('produits.search', compact('produit', 'query'));
    }

  
}
