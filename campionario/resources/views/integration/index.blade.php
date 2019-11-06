@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
                   <div class="col-md-12" style="padding:20px;">
                        <ul class="nav nav-tabs" style="border-radius: 5px;background-color: white;">
                            
                            @if (Auth::user()->type == "Administrateur")
                            <li class="nav-item">
                              <a class="nav-link" href="/accessoires">Accessoires</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/fournisseurs">Fournisseurs</a>
                            </li>
                             @endif
                            <li class="nav-item">
                              <a class="nav-link" href="/campionarios">Echantillonnage</a>
                            </li>

                            @if (Auth::user()->type == "Administrateur")
                            <li class="nav-item">
                              <a class="nav-link" href="/reclamations">Reclamation</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" href="/integrations">Integration</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/approbations">Approbation</a>
                            </li>
                              
                            @endif
                            
                           
                        </ul>
                    </div>
                     <div class="col-md-12" style="min-height:80vh;border-radius:10px;">
                    <div class="container" style="margin-bottom:50px;padding-top:20px;">
                      <div class="row" style="background-color:white;padding:10px;border-radius:10px;">
                        <div class="col-sm-9">
                          <h3>Liste des integrations </h3>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-success" data-toggle="modal" data-target="#integrations"><i class="fas fa-plus-circle"></i> Ajouter un integration</button>
                        </div>
                        
                      </div>         
                              
                          
                    </div>
                    <hr>
                    <div style="background-color:white;max-height:400px;overflow-y:scroll;">
                    <div class="col-md-12" >
                    <form class="row" action="/integrations/filtre" method="POST"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="code">  
                      </div>
                      <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="checher">  
                      </div>
                      
                      
                    </form>
                  </div> 
                    <div style="padding-top:20px;">
                       <!-- Table -->
                     <table class="table table-bordered">
                      <thead>
                          
                          <th>Code</th>
                          <th>Saison </th>
                          <th>Type de defaut</th>
                          <th>Quantité</th>
                          <th>Cause de defaut</th>
                          <th>Date d'entrees ( d'effectueux) </th>
                          <th>Date de sorties ( remplacements ) </th>
                          <th>Selection </th>
                          
                      </thead>
                      <tbody>
                      <form action="/integration/print" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @foreach( $integrations as $integration )
                          <tr>
                            <td>{{ $integration->code }}  </td>
                            <td> {{ $integration->season }}</td>
                            <td>{{ $integration->type_defaut }} </td>
                            <td> {{ $integration->qte }}</td>
                            <td> {{ $integration->cause_defaut }} </td>
                            <td> {{ $integration->date_entree }}</td>
                            <td> {{ $integration->date_sortie }}  </td>
                            <td> <input type="checkbox" name="printed[]" value="{{ $integration->id }}" ></td>
                          </tr>
                          @endforeach
                        
                      </tbody>
                    </table> 
                    
                     </div> 
                     
                     </div>
                     <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="text-align:center"> <input type="submit" class="btn btn-success" value="Imprimer" ></div>
                  </div> 
                  </form>   
                     </div>
                    
                    
           
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="integrations" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/integration/add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Ajouter une integration </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <label> Code </label>
                    <input type="text" class="form-control"  name="code" placeholder="code ..."><br>
                    <label> Type de defaut </label>
                    <input type="text" class="form-control" name="typedefaut" placeholder="type de defaut ..." ><br>
                    <label> Quantité </label>
                    <input type="number" class="form-control" name="qte"  ><br>
            
                    <label> Cause de defaut </label>
                    <textarea class="form-control" name="causedefaut"  ></textarea><br>
                    <label> date d'entrée </label>
                    <input type="date" class="form-control" name="date_entree"  ><br>
                    <label> date de sortie </label>
                    <input type="date" class="form-control" name="date_sortie"  ><br>
                    <label> Saison </label>
                    <input type="text" class="form-control" name="season" placeholder="saison ..." ><br>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection