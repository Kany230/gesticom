<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'produit',
        'quantite',
        'prixRevente',
        'prixTotal',
        'status',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function produits(){

        return $this->belongsTo(Produits::class,'produits_id');
    }

    public function rapports() {

        return $this->hasMany(Rapports::class, 'clients_id');
        
    }

}
