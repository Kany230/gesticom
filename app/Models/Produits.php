<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clients;

class Produits extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_articles',
        'stock',
        'prixAchat',
        'count',
        'user_id'
    ];
    
    public function user(){

        return $this->belongsTo(User::class,'user_id', 'id');
    }
    
    public function clients(){

        return $this->hasMany(Clients::class,'produits_id');
    }

    public function rapports() {

        return $this->hasMany(Rapports::class, 'produits_id');
        
    }
    
}
