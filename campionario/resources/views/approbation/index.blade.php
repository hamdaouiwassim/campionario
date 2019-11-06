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
                              <a class="nav-link" href="/integrations">Integration</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" href="/approbations">Approbation</a>
                            </li>
                              
                            @endif
                            
                           
                        </ul>
                    </div>
                     <div class="col-md-12" style="min-height:80vh;border-radius:10px;">
                    <div class="container" style="margin-bottom:50px;padding-top:20px;">
                      <div class="row" style="background-color:white;padding:10px;border-radius:10px;">
                        <div class="col-sm-9">
                          <h3>Liste des approbations </h3>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-success" data-toggle="modal" data-target="#approbations"><i class="fas fa-plus-circle"></i> Ajouter une approbation</button>
                        </div>
                        
                      </div>         
                              
                          
                    </div>
                    <div style="padding-top:10px;background-color:white;max-height:400px;overflow-y:scroll;">
                    <hr> <div class="col-md-12">
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
                          <th>Couleur</th>
                          <th>Numéro echantillon</th>
                          <th>Fournisseur</th>
                          <th>Season </th>
                          <th>Date </th>
                          <th>Decision </th>
                          <th>Note </th>
                          <th>Selection </th>
                      </thead>
                      <tbody>
                      <form action="/approbation/print" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @foreach( $approbations as $approbation )
                          <tr>
                            <td>{{ $approbation->code }}  </td>
                            <td>{{ $approbation->color }} </td>
                            <td> {{ $approbation->num_echentient }}</td>
                            <td>  @foreach($fournisseurs as $fournisseur )
                                      @if( $approbation->fournisseur == $fournisseur->id )
                                          {{ $fournisseur->fullname }}
                                      @endif
                                  @endforeach  </td>
                            <td> {{ $approbation->season }}</td>
                            <td> {{ $approbation->date }}  </td>
                            <td> {{ $approbation->decision }}  </td>
                            <td> {{  $approbation->note}}</td>
                            <td> <input type="checkbox" name="printed[]" value="{{ $approbation->id }}" > </td>
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
<div class="modal fade" id="approbations" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/approbation/add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Ajouter une approbation </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <label> Code </label>
                    <input type="text" class="form-control"  name="code" placeholder="code ..."><br>
                    <label> couleur </label>
                    <input type="text" class="form-control" name="color" placeholder="couleur ..." ><br>
                    <label> Numéro echantient </label>
                    <input type="number" class="form-control" name="numech"  ><br>
            
                    <label> fournisseur </label>
                    <select class="form-control" name="fournisseur">
                        @isset($fournisseurs)
                        @foreach( $fournisseurs as $fournisseur )
                                <option value="{{ $fournisseur->id }}"> {{ $fournisseur->fullname }} </option>;
                        @endforeach
                        @endisset
                    </select><br>
                    <label> saison </label>
                    <input type="text" class="form-control" name="season" placeholder="sous famille ..." ><br>
                    <label> date  </label>
                    <input type="date" class="form-control" name="date"  ><br>
                    <label> decision  </label>
                    <input type="text" class="form-control" name="decision" placeholder="sous famille ..." ><br>
                    <label> note  </label>
                    <textarea class="form-control" name="note"  ></textarea><br>
                    
                    
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