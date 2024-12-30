@extends('layout')
@section('title','Rapport')

@section('content')
    
<div>
        <div class="cards">
        <div class="card">
                <h2>{{$count}}</h2>
                <p>Nombre de rapports genérer</p>
            </div>
        <div class="card">
                <h2>{{$sommeP}}</h2>
                <p>Somme des Profit</p>
            </div>
            <div class="card">
                <h2>{{$somme}}</h2>
                <p>Somme des Profit Net</p>
            </div>
        
        </div>

    <!--Tableau-->
    <div class="table-container">
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Rapports</h1>
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
                                <a href="{{ route('rapports.genereRapport') }}" class='btn btn-primary me-md-2' type='button'>Generer un rapport</a>
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
                                <th>id</th>
                                <th>total Payer</th>
                                <th>total Dette</th>
                                <th>Revenue</th>
                                <th>Depense</th>
                                <th>Profit</th>
                                <th>Profit Net</th>
                                <th>RR</th>
                                <th>ROI</th>
                                <th>Somme Total</th>
                                <th>Somme Produit</th>
                                <th>Somme Pret</th>
                                <th>Date Debut</th>
                                <th>Date fin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rapport as $rapports)
                                <tr>
                                    <td>{{ $rapports->id }}</td>
                                    <td>{{ $rapports->totalPayer }}</td>
                                    <td>{{ $rapports->totalDette }}</td>
                                    <td>{{ $rapports->revenus }}</td>
                                    <td>{{ $rapports->depense }}</td>
                                    <td>{{ $rapports->profit }}</td>
                                    <td>{{ $rapports->profitNet }}</td>
                                    <td>{{ $rapports->RR }}</td>
                                    <td>{{ $rapports->ROI }}</td>
                                    <td>{{ $rapports->sommeTotal }}</td>
                                    <td>{{ $rapports->sommeProduit }}</td>
                                    <td>{{ $rapports->sommePret }}</td>
                                    <td>{{ $rapports->start_date }}</td>
                                    <td>{{ $rapports->end_date }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                        <div class="d-inline-block">
                                        <a href="{{ route('rapports.show',$rapports->id)}}" class="btn btn-sm-warning" title="modifier">
                                            <i class="bi bi-pencil"></i>
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
    </body> 

@endsection
    
