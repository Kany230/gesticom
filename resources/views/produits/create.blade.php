@extends('layout')
@section('title','Formulaire d\'enregistrement d\'un produits')

@section('content')
<div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>        
                    @endforeach
                </ul>
            </div>        
        @endif

        <form action="{{route('produits.store')}}" method="post">
            @csrf
            @include('produits.form')
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="submit">Enregistrer un produit</button>
            </div>
        </form>
    </div>
@endsection