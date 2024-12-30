<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Clients;
use App\Models\Produits;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'secteur',
        'password'
    ];

    public function clients(){

        return $this->hasMany(Clients::class,'user_id');
    }

    public function produits(){

        return $this->hasMany(Produits::class,'user_id', 'id');
    }

    public function depenses(){

        return $this->hasMany(Depenses::class,'user_id');
    }

    public function prets(){

        return $this->hasMany(PretEntreprise::class,'user_id');
    }

    public function rapports(){

        return $this->hasMany(Rapports::class,'user_id');
    }

   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
