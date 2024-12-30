<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'somme',
        'user_id',
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function rapports() {

        return $this->hasMany(Rapports::class, 'depenses_id');
        
    }
}
