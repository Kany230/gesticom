<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\DepensesController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PretEntrepriseController;
use App\Http\Controllers\RapportsController;
use App\Models\Produits;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('users/index', [UsersController::class, 'index'])->name('users.index');

Route::get('users/register', [UsersController::class, 'register'])->name('users.register');

Route::get('users/login', [UsersController::class, 'login'])->name('users.login');

Route::post('users/login', [UsersController::class,'store_login'])->name('users.store_login');

Route::post('users', [UsersController::class,'store'])->name('users.store');

Route::get('user.logout', [UsersController::class, 'logout'])->name('users.logout');

Route::middleware(['auth.custom'])->group(function(){

    Route::get('clients/index', [ClientsController::class, 'index'])->name('clients.index');

    Route::get('clients/create',[ClientsController::class, 'create'])->name('clients.create');

    Route::post('clients', [ClientsController::class,'store'])->name('clients.store');

    Route::get('clients/{client}/edit',[ClientsController::class,'edit'])->name('clients.edit');

    Route::get('clients/{id}/destroy',[ClientsController::class,'destroy'])->name('clients.destroy');

    Route::put('clients/{client}',[ClientsController::class,'update'])->name('clients.update');

    Route::get('clients/{id}', [ClientsController::class,'show'])->name('clients.show');

    Route::get('clients',[ClientsController::class,'search'])->name('clients.search');

    Route::get('produits/start', [ProduitsController::class, 'start'])->name('produits.start');

    Route::get('produits/index', [ProduitsController::class, 'index'])->name('produits.index');

    Route::get('produits/index2', [ProduitsController::class, 'index2'])->name('produits.index2');

    Route::get('produits/create',[ProduitsController::class, 'create'])->name('produits.create');

    Route::post('produits', [ProduitsController::class,'store'])->name('produits.store');

    Route::get('produits/{produit}/edit',[ProduitsController::class,'edit'])->name('produits.edit');

    Route::get('produits/{id}/destroy',[ProduitsController::class,'destroy'])->name('produits.destroy');

    Route::put('produits/{produit}',[ProduitsController::class,'update'])->name('produits.update');

    Route::get('produits/{id}', [ProduitsController::class,'show'])->name('produits.show');
    
    Route::get('produits',[ProduitsController::class,'search'])->name('produits.search');

    Route::get('depenses/index', [DepensesController::class, 'index'])->name('depenses.index');

    Route::get('depenses/create',[DepensesController::class, 'create'])->name('depenses.create');

    Route::post('depenses', [DepensesController::class,'store'])->name('depenses.store');

    Route::get('depenses/{depense}/edit',[DepensesController::class,'edit'])->name('depenses.edit');

    Route::get('depenses/{id}/destroy',[DepensesController::class,'destroy'])->name('depenses.destroy');

    Route::put('depenses/{depense}',[DepensesController::class,'update'])->name('depenses.update');

    Route::get('depenses/{id}', [DepensesController::class,'show'])->name('depenses.show');

    Route::get('rapports/index', [RapportsController::class,'index'])->name('rapports.index');

    Route::get('rapports/question', [RapportsController::class, 'question'])->name('rapports.question');
    
    Route::get('rapports/genereRapport', [RapportsController::class, 'genereRapport'])->name('rapports.genereRapport');

    Route::get('rapports/{id}', [RapportsController::class,'show'])->name('rapports.show');
    
    Route::get('prets/index', [PretEntrepriseController::class, 'index'])->name('prets.index');

    Route::get('prets/create',[PretEntrepriseController::class, 'create'])->name('prets.create');

    Route::post('prets', [PretEntrepriseController::class,'store'])->name('prets.store');

    Route::get('prets/{pret}/edit',[PretEntrepriseController::class,'edit'])->name('prets.edit');

    Route::get('prets/{id}/destroy',[PretEntrepriseController::class,'destroy'])->name('prets.destroy');

    Route::put('prets/{depense}',[PretEntrepriseController::class,'update'])->name('prets.update');

    Route::get('prets/{id}', [PretEntrepriseController::class,'show'])->name('prets.show');
});

Route::get('/', function () {
    return view('rapports.question');
});
