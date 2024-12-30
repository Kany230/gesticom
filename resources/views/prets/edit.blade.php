@extends('layout')
@section('title',"Edition d'une depense ")
@section('content')

<div class="row">
        <h3>Formulaire d'edition d'un emprunt</h3>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="{{ route('prets.update',$pret->id)}}" method="post">
            @csrf
            @method("PUT")
            @include("prets.form")

            <div class="d-grid gap-2">
                <button class="btn btn-warning btn-lg" type="submit">
                    Enregistrer un emprunt
                </button>
            </div>
        </form>
    </div>

@endsection