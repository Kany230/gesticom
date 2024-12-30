@extends('layout')
@section('title',"Edition du client ")
@section('content')

<div class="row">
        <h3>Formulaire d'edition d'un client</h3>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="{{ route('clients.update',$clients->id)}}" method="post">
            @csrf
            @method("PUT")
            @include("clients.form")

            <div class="d-grid gap-2">
                <button class="btn btn-warning btn-lg" type="submit">
                    Enregistrer un client
                </button>
            </div>
        </form>
    </div>

@endsection