@extends('layout')
@section('title','Clients')

@section('content')
    
<div>



    <!--Tableau-->
    <div class="table-container">
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Clients</h1>
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
                                <a href="{{ route('clients.create') }}" class='btn btn-primary me-md-2' type='button'>Enregistrer un client</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <nav id='orders-table-tab' class='orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4'>
                <a class='flex-sm-fill text-sm-center nav-link active' id='orders-all-tab' data-bs-toggle='tab' href='#orders-all' role='tab' aria-controls='orders-all' aria-selected='true'>Tout</a>
                <a class='flex-sm-fill text-sm-center nav-link' id='orders-paid-tab' data-bs-toggle='tab' href='#orders-paid' role='tab' aria-controls='orders-paid' aria-selected='false'>Payer</a>
                <a class='flex-sm-fill text-sm-center nav-link' id='orders-debt-tab' data-bs-toggle='tab' href='#orders-debt' role='tab' aria-controls='orders-debt' aria-selected='false'>Dettes</a>
                <a class='flex-sm-fill text-sm-center nav-link' id='orders-total-tab' data-bs-toggle='tab' href='#orders-total' role='tab' aria-controls='orders-total' aria-selected='false'>Clients fidéle</a>
            </nav>
            
            <div class='tab-content'>
              
            
               <div class='tab-pane fade show active' id='orders-all' role='tabpanel' aria-labelledby='orders-all-tab'>
               @if ($client)    
               <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Numéro de Téléphone</th>
                                <th>Adresse</th>
                                <th>Produits Achetés</th>
                                <th>Quantité</th>
                                <th>Prix de vente</th>
                                <th>Prix Total</th>
                                <th>Date des Achats</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $clients)
                                <tr>
                                    <td>{{ $clients->id }}</td>
                                    <td>{{ $clients->first_name }}</td>
                                    <td>{{ $clients->last_name }}</td>
                                    <td>{{ $clients->phone }}</td>
                                    <td>{{ $clients->produit }}</td>
                                    <td>{{ $clients->address }}</td>
                                    <td>{{ $clients->quantite }}</td>
                                    <td>{{ $clients->prixRevente }}</td>
                                    <td>{{ $clients->prixTotal }}</td>
                                    <td>{{ $clients->created_at }}</td>
                                    <td>
                                        @if ($clients->status == 'payée')
                                            <span class='badge bg-success'>Payée</span>
                                        @else
                                            <span class='badge bg-danger'>Dette</span>
                                        @endif
                                    </td>
                                    <td >
                                        <div class="btn-group" role="group">
                                        <div class="d-inline-block">
                                        <a href="{{ route('clients.edit',$clients->id)}}" class="btn btn-sm-warning" title="modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        </div>
                                        <div class="d-inline-bloc">
                                        <a href="{{route('clients.destroy',$clients->id)}}" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer ce client ?')" title="supprimer">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @elseif(isset($query))
                    <p class="text-danger mt-4">Aucun resultat trouve pour {{$query}}</p>
                @endif
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
    </body> 

@endsection
    
