@extends('layout')
@section('title','Commande')

@section('content')
<div>
       

    <!--Tableau-->
    <div class="table-container">
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Commandes</h1>
                </div>
            

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class='col-auto'>
                    <div class='page-utilities'>
                        <div class='row g-2 justify-content-start justify-content-md-end align-items-center'>
                            <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                                <a href="{{ route('commande.index') }}" class='btn btn-primary me-md-2' type='button'>####</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class='tab-content'>
               
                <div class='tab-pane fade show active' id='orders-all' role='tabpanel' aria-labelledby='orders-all-tab'>
                    <table>
                        <thead>
                            <tr>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Nom Article</th>
                                <th>Quantite</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{ $commande['first_name'] }}</td>
                                    <td>{{ $commande['last_name'] }}</td>
                                    <td>{{ $commande['phone'] }}</td>
                                    <td>{{ $commande['produit'] }}</td>
                                    <td>{{ $commande['quantite'] }}</td>
                                    <td>{{ number_format($commande['prixRevente'], 2) }}</td>
                                    <td>{{ number_format($commande['total'], 2) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                        <div class="d-inline-block">
                                        <a href="{{route('commande.show', ['phone' => $commande['phone']])}}" class="btn btn-primary btn-sm">
                                           <i class="bi bi-eye"></i>
                                        </a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

           
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
<script src="assets/js/app.js"></script>




  </div>

  </div>
</div>  
@endsection
    
