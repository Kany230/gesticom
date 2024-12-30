@extends('layout')
@section('title','Formulaire d\'enregistrement d\'une depenses')

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

        <form action="{{route('depenses.store')}}" method="post">
            @csrf
            @include('depenses.form')
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="submit">Enregistrer une depense</button>
            </div>
        </form>
    </div>
@endsection