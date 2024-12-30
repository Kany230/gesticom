<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    
    protected $table = 'commande';

    public function clients() {
        return $this->belongsTo(Clients::class);
    }

    public function produits()  {
        return $this->belongsToMany(Produits::class, 'commande_produit', 'commande_id', 'produit_id');
        
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }
}
