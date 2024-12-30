<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapports extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalPayer',
        'totalDette',
        'revenus',
        'depense', 
        'profit',
        'profitNet',
        'RR', 
        'ROI',
        'revenueNet',
        'sommeTotal',
        'sommeProduit',
        'sommePret',
        'user_id',
        'start_date',
        'end_date'
    ];

    public function clients() {
        return $this->belongsToMany(Clients::class, 'clients_id', 'clients_rapports', 'rapports_id', 'totalDette');
    }

    public function produits()  {
        return $this->belongsToMany(Produits::class, 'produits_id', 'produits_rapports', 'rapports_id');
        
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function depenses(){

        return $this->belongsToMany(Depenses::class,'depenses_id', 'depenses_rapports', 'rapports_id');
    }

    public function prets(){

        return $this->belongsToMany(PretEntreprise::class,'prets_id', 'prets_rapports', 'rapports_id');
    }
}
