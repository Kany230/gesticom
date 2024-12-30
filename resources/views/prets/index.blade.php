@extends('layout')
@section('title','Emprunt')

@section('content')
    
<div>
        <div class="cards">
            <div class="card">
                <h2>{{ $total }}</h2>
                <p>Somme des Emprunts</p>
            </div>
        
        </div>

    <!--Tableau-->
    <div class="table-container">
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Emprunt</h1>
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
                                <a href="{{ route('prets.create') }}" class='btn btn-primary me-md-2' type='button'>Enregistrer un emprunt</a>
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
                                <th>Nom Emprunt</th>
                                <th>Description</th>
                                <th>Somme</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pret as $prets)
                                <tr>
                                    <td>{{ $prets->id }}</td>
                                    <td>{{ $prets->nomPret }}</td>
                                    <td>{{ $prets->description }}</td>
                                    <td>{{ $prets->sommePret }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                        <div class="d-inline-block">
                                        <a href="{{ route('prets.edit',$prets->id)}}" class="btn btn-sm-warning" title="modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        </div>
                                        <div class="d-inline-bloc">
                                        <a href="{{route('prets.destroy',$prets->id)}}" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer cet emprunt ?')" title="supprimer">
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
    
