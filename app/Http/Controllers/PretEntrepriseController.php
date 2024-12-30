<?php

namespace App\Http\Controllers;

use App\Models\PretEntreprise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PretEntrepriseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pret = $user->prets;
        $total = $pret->sum('sommePret');
        return view('prets.index', compact('pret', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Formulaire d'enregistrement d'un client
        return view('prets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //Enregistrement apres validation 
        $validated = $request->validate(([
            'nomPret'=>'required',
            'description'=>'required',
            'sommePret'=>'required',        
        ]));

        if(!$request->user_id){
            $validated['user_id']=$user->id;
        }
       
        PretEntreprise::create($validated);
        session()->flash('success','Pret enregistré avec success !!!');
        return redirect()->route('prets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $pret = PretEntreprise::find($id);

        if(!$pret || $pret->user_id !==Auth::id()){
            abort(404,'Acces non autorisé');
        }
        $user = Auth::user();
        return view('users.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pret =PretEntreprise::findOrFail($id);
        //Afficher la formulaire d'un clients
        return view('prets.edit', compact('pret'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PretEntreprise $prets)
    {
        //modifier un client apres validation du formulaire d'edition
        $validated = $request->validate([
            'nomPret'=>'required',
            'description'=>'required',
            'sommePret'=>'required',
        ]);

        
        $prets->update($validated);

        return redirect()->route('prets.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pret = PretEntreprise::findOrFail($id);
        //Supprimer un client
        $pret -> delete();
        return redirect()->route('prets.index');
    }

}
