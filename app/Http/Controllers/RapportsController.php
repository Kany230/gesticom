<?php

namespace App\Http\Controllers;

use App\Models\Rapports;
use App\Models\Clients;
use App\Models\Produits;
use App\Models\Depenses;
use App\Models\PretEntreprise;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $rapport = $user->rapports;
        $count = $rapport->count('profitNet');
        $somme = $rapport->sum('profitNet');
        $sommeP = $rapport->sum('profit');
        return view('rapports.index', compact('rapport', 'somme', 'sommeP', 'count'));
    }

    public function question(Request $request)
    {
       $rapport = $request->input('response');
       if($rapport === 'oui'){
        return redirect()->route('rapports.genereRapport');
       }

       return redirect('rapports.index');
    }

    public function genereRapport() {
        $user = Auth::user();
    
        // Dernier rapport généré
        $lastReport = Rapports::latest('end_date')->first();
    
        // Définir les périodes pour chaque table
        $startDate = $lastReport ? Carbon::parse($lastReport->end_date)->addDay() : Clients::min('created_at');
        $endDate = collect([Clients::max('created_at')])->filter()->max();
    
        $startDateP = $lastReport ? Carbon::parse($lastReport->end_date)->addDay() : Produits::min('created_at');
        $endDateP = collect([Produits::max('created_at')])->filter()->max();
    
        $startDateD = $lastReport ? Carbon::parse($lastReport->end_date)->addDay() : Depenses::min('created_at');
        $endDateD = collect([Depenses::max('created_at')])->filter()->max();
    
        $startDatePe = $lastReport ? Carbon::parse($lastReport->end_date)->addDay() : PretEntreprise::min('created_at');
        $endDatePe =collect([PretEntreprise::max('created_at')])->filter()->max();
    
        //dd($startDate);
        if (is_null($startDate) || is_null($endDate || $startDate > $endDate)) {
            return response()->json(['message' => 'Aucune donnée de clients trouvée pour générer un rapport'], 400);
        }
        if (is_null($startDateP) || is_null($endDateP || $startDateP > $endDateP)) {
            return response()->json(['message' => 'Aucune donnée de produits trouvée pour générer un rapport'], 400);
        }
        if (is_null($startDateD) || is_null($endDateD || $startDateD > $endDateD)) {
            return response()->json(['message' => 'Aucune donnée de depenses trouvée pour générer un rapport'], 400);
        }
        if (is_null($startDatePe) || is_null($endDatePe || $startDatePe > $endDatePe)) {
            return response()->json(['message' => 'Aucune donnée de depenses trouvée pour générer un rapport'], 400);
        }
    
        // Récupération des données
        $client = Clients::where('user_id', $user->id)
            ->whereBetween('created_at', [$startDate, $endDate])->get();
        $produit = Produits::where('user_id', $user->id)
            ->whereBetween('created_at', [$startDateP, $endDateP])->get();
        $depense = Depenses::where('user_id', $user->id)
            ->whereBetween('created_at', [$startDateD, $endDateD])->get();
        $pret = PretEntreprise::where('user_id', $user->id)
            ->whereBetween('created_at', [$startDatePe, $endDatePe])->get();

        // Vérifie si aucune donnée n'existe
        if ($client->isEmpty() && $produit->isEmpty()) {
            return response()->json(['message' => 'Aucune donnée disponible pour générer un rapport'], 400);
        }
    
        // Calculs et création du rapport
        $sommeProduit = $produit->sum('prixAchat');
        $sommeTotal = $client->sum('prixTotal');
        $sommeDepense = $depense->sum('somme');
        $totalPayer = $client->where('status','payée')->sum('prixTotal');
        $sommeDette = $client->where('status','dette')->sum('prixTotal');
        $revenueNet = $sommeTotal - $sommeDette;
        $RR = ($revenueNet / $sommeTotal) * 100;
        $ROI = ((($sommeProduit - $sommeTotal) / $sommeTotal) * 100 );
        $sommePret = $pret->sum('sommePret');
        $profit = $sommeTotal - $sommeDepense - $sommeProduit;
        $profitNet = $revenueNet - $sommeDepense - $sommeProduit;
       //dd($sommeDette);
        Rapports::create([
            'totalPayer' => $totalPayer,
            'totalDette' => $sommeDette,
            'revenus' => $sommeTotal - $sommeDette,
            'depense' => $sommeDepense,
            'profit' => $profit,
            'profitNet'=> $profitNet,
            'RR' => $RR, 
            'ROI' => $ROI,
            'revenueNet' => $revenueNet,
            'sommeTotal' => $sommeTotal,
            'sommeProduit' => $sommeProduit,
            'sommePret' => $sommeProduit,
            'user_id' => $user->id,
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);

        
        $output = ['period' => $startDate . ' à ' .$endDate];

        return view('rapports.genereRapport', compact('output', 'RR', 'ROI',  'revenueNet', 'sommeDepense', 'sommeTotal', 'sommeDette', 'sommeProduit', 'profitNet', 'profit', 'sommePret'));
    }

    public function show($id){
        $user = Auth::user();

        //Recuperation du rapport 
        $rapport =  Rapports::findOrFail($id);

        
        return view('rapports.show', compact('rapport'));
    
    }


 

}
