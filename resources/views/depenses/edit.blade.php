@extends('layout')
@section('title',"Edition d'une depense ")
@section('content')

<div class="row">
        <h3>Formulaire d'edition d'une depense</h3>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="{{ route('depenses.update',$depenses->id)}}" method="post">
            @csrf
            @method("PUT")
            @include("depenses.form")

            <div class="d-grid gap-2">
                <button class="btn btn-warning btn-lg" type="submit">
                    Enregistrer une depense
                </button>
            </div>
        </form>
    </div>

@endsection