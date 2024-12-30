<?php

namespace App\Http\Controllers;

use App\Models\Depenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepensesController extends Controller
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
        $depense = $user->depenses;
        $total = $depense->sum('somme');
        return view('depenses.index', compact('depense', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Formulaire d'enregistrement d'un client
        return view('depenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //Enregistrement apres validation 
        $validated = $request->validate(([
            'nom'=>'required',
            'description'=>'required',
            'somme'=>'required',        
        ]));

        if(!$request->user_id){
            $validated['user_id']=$user->id;
        }
       
        Depenses::create($validated);
        session()->flash('success','Depense enregistré avec success !!!');
        return redirect()->route('depenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $depense = Depenses::find($id);

        if(!$depense || $depense->user_id !==Auth::id()){
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
        $depenses =Depenses::findOrFail($id);
        //Afficher la formulaire d'un clients
        return view('depenses.edit', compact('depenses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depenses $depenses)
    {
        //modifier un client apres validation du formulaire d'edition
        $validated = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'somme' => 'required'
        ]);

        
        $depenses->update($validated);

        return redirect()->route('depenses.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $depenses = Depenses::findOrFail($id);
        //Supprimer un client
        $depenses -> delete();
        return redirect()->route('depenses.index');
    }

}
