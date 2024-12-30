@extends('layout')
@section('title',"Edition du produit nommé $produits->nom_articles ")
@section('content')

<div class="row">
        <h3>Formulaire d'edition d'un produit</h3>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="{{ route('produits.update',$produits->id)}}" method="post">
            @csrf
            @method("PUT")
            @include("produits.form")

            <div class="d-grid gap-2">
                <button class="btn btn-warning btn-lg" type="submit">
                    Enregistrer un produit
                </button>
            </div>
        </form>
    </div>

@endsection