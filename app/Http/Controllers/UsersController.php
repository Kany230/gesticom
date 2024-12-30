<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        //Page d'accueil site
        return view('users.index');
    }
    public function register()
    {  
        //Formulaire d'inscription de l'utilisateur
        return view('users.register'); 
    }

    public function login()
    {  
        //Formulaire d'inscription de l'utilisateur
        return view('users.login'); 
    }

    public function store_login(Request $request)
    {
        //Connexion de l'utilisateur
        $client = $request ->only(
            'email','password');

        if(Auth::attempt($client)){

            $client = Auth::user();

            
            return redirect()->route('clients.index')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['email'=>'Les informations fournies sont incorrectes']);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //Enregistrer un utilisateur apres validation de la formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'secteur' => 'required'
        ]);
       
       //Creer l'utilisateur
       $user =  User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'secteur'=>$request->secteur,
        'password' => Hash::make($request->password)
       ]);
       
       

        return redirect()->route('users.login')->with('success', 'Inscription reussi !!!');
    }

    public function logout(Request $request){
        //Deconnexion de l'utilisateur
        Auth::logout();
        //Fermetture de session actuelle
        $request->session()->invalidate();
        //Regenere @csrf
        $request->session()->regenerateToken();
        //Rediriger vers la page deconnexion
        return redirect()->route('users.login');
    }

}
