<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PretEntreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomPret',
        'description',
        'sommePret',
        'user_id',
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function rapports() {

        return $this->hasMany(Rapports::class, 'prets_id');
        
    }
}
