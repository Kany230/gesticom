@extends('layout')
@section('title','Produits')

@section('content')
    
<div>



    <!--Tableau-->
    <div class="table-container">
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Produits</h1>
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
                                <a href="{{ route('produits.create') }}" class='btn btn-primary me-md-2' type='button'>Enregistrer un produit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <nav id='orders-table-tab' class='orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4'>
                <a class='flex-sm-fill text-sm-center nav-link active' id='orders-all-tab' data-bs-toggle='tab' href='#orders-all' role='tab' aria-controls='orders-all' aria-selected='true'>Tout</a>
                <a class='flex-sm-fill text-sm-center nav-link' id='orders-nbre-tab' data-bs-toggle='tab' href='#orders-nbre' role='tab' aria-controls='orders-nbre' aria-selected='false'>Produits plus vendus</a>
            </nav>
            
            <div class='tab-content'>
               
            <div class='tab-pane fade show active' id='orders-all' role='tabpanel' aria-labelledby='orders-all-tab'>
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom du produit</th>
                                <th>Stock</th>
                                <th>Prix d'achat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produit as $produits)
                                <tr>
                                    <td>{{ $produits->id }}</td>
                                    <td>{{ $produits->nom_articles }}</td>
                                    <td>{{ $produits->stock }}</td>
                                    <td>{{ $produits->prixAchat }}</td>
                                    <td >
                                        <div class="btn-group" role="group">
                                        <div class="d-inline-block">
                                        <a href="{{ route('produits.edit',$produits->id)}}" class="btn btn-sm-warning" title="modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        </div>
                                        <div class="d-inline-bloc">
                                        <a href="{{route('produits.destroy',$produits->id)}}" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer ce client ?')" title="supprimer">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>

            <div class='tab-pane fade' id='orders-nbre' role='tabpanel' aria-labelledby='orders-nbre-tab'>
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom du produit</th>
                                <th>Stock</th>
                                <th>Nombre d'achat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produit as $produits)
                                <tr>
                                    <td>{{ $produits->id }}</td>
                                    <td>{{ $produits->nom_articles }}</td>
                                    <td>{{ $produits->stock }}</td>
                                    <td>{{ $produits->reduct_count }}</td>
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
    
