@extends('layouts.app')
<style>
.table-bordered {
  border:1px solid black !important;
}
.form-group{
border: 1px solid black;
    padding: 10px;
  margin-top:0 !important;
  margin-bottom:0 !important;
border-bottom-width:.5px;
margin-left: 0 !important;
margin-right: 0 !important;
}
.last{
  border-bottom: 1px solid black;
}
</style>
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
                              <a class="nav-link active" href="/campionarios">Echantillonnage</a>
                            </li>

                           @if (Auth::user()->type == "Administrateur")
                            <li class="nav-item">
                              <a class="nav-link" href="/reclamations">Reclamation</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/integrations">Integration</a>
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
                          <h3>Liste des echentillonnage </h3>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-success" data-toggle="modal" data-target="#campionarios"><i class="fas fa-plus-circle"></i> Ajouter un echentillonnage</button>
                        </div>
                        
                      </div>         
                              
                          
                    </div>
                    
                    <div class="container" style="padding-top:10px;background-color:white;max-height:400px;overflow-y:scroll;">
                      <hr>
                     <!-- Table -->
                     <form action="/campionario/filter" method="POST" class="container">
                     <div class="row" style="margin-bottom:20px;">
                      
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-sm-6">
                      <select name="filtre" class="form-control">  
                          <option value="1"> Toute la periode </option>
                          <option value="2"> Aujourd'hui </option>
                          <option value="3"> Cette mois </option>
                      </select>    
                        </div>
                        <div class="col-sm-6">
                      <input type="submit" value="valider" class="btn btn-primary">
                        </div>
                    </form>
                     
                     </div>

                     <table class="table table-bordered" style="margin-top:10px;">
                      <thead>
                          <th scope="col">#</th>
                          <th scope="col">Accessoire</th>
                          <th scope="col">Fournisseur</th>
                          <th scope="col">Quantité</th>
                          <th scope="col">Numéro de facture</th>
                          <th scope="col">Date d'ajout</th>
                          <th scope="col">Utilisateur</th>
                          <th scope="col">Saison</th>
                          @if (Auth::user()->type == "Administrateur")
                            <th scope="col">Fiche</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Selection </th>
                          @endif
                      </thead>
                      <tbody>
                        <?php $i=0; ?>
                        <form action="/campionario/print" method="POST">
                        @if ( count($campionarios) > 0 )
                        @foreach( $campionarios as $campionario )
                          <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td>
                            @foreach($accessoires as $accessoire )
                                @if ($accessoire->id == $campionario->idaccessoire )
                                     <a href="#" data-toggle="modal" data-target="#accessoire{{ $accessoire->id }}" > {{ $accessoire->code }} </a>
                                @endif  
                              @endforeach
                            </td>
                            <td>
                              @foreach($fournisseurs as $fournisseur )
                                @if ($fournisseur->id == $campionario->idfournisseur )
                                      {{ $fournisseur->fullname }}
                                @endif  
                              @endforeach
                            </td>
                            <td>{{ $campionario->qte }}</td>
                            <td>{{ $campionario->numfacture }}</td>
                            <td>{{ $campionario->created_at }}</td>
                            <td>{{ $campionario->user }}</td>
                            <td>{{ $campionario->saison }}</td>
                             @if (Auth::user()->type == "Administrateur")
                                @if ($campionario->file == 0 )
                                      
                                      <td ><a class="btn btn-success" data-toggle="modal" data-target="#fichier{{ $campionario->id }}" class="btn btn-primary"><i class="fas fa-file-signature"></i></a></td>
                                       
                                @else
                                  @foreach( $fichescontroles as $fichecontrole )
                                        @if ($fichecontrole->idcampionario == $campionario->id )
                                    <td ><a data-toggle="modal" data-target="#fichiercontrole{{ $fichecontrole->id }}" class="btn btn-primary"><i class="fas fa-file-alt"></i></a></td>
                                    @endif
                                      @endforeach
                                @endif
                                @if ($campionario->stat == 0 )
                                      <td ><a href="/campionario/debloque/{{ $campionario->id }}"  onclick="return confirm('voules-vous debloqué cet campionario')" class="btn btn-danger">Debloquer</a></td>
                                @else
                                           <td ><a href="/campionario/bloque/{{ $campionario->id }}" onclick="return confirm('voules-vous bloqué cet campionario')" class="btn btn-primary">bloquer</a></td> 
                                @endif
                              <td><input type="checkbox" name="printed[]" value="{{ $campionario->id }}" ></td>
                            
                          @endif
                          </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>        
                  </div>  
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="text-align:center"> <input type="submit" class="btn btn-success" value="Imprimer"></div>
                  </div>     
                        <form>    
                    </div>
           
    </div>
    
</div>
<!-- Modal Add Item -->
<!-- Modal -->
<div class="modal fade" id="campionarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/campionario/add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Echantillonnage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <label>Accessoire : </label>
                    <select name="idaccessoire" class="form-control">
                          <option value="" >Selectionner un accessoire</option> 
                        @foreach($accessoires as $accessoire )
                          <option value="{{ $accessoire->id }}">{{ $accessoire->code }}</option>
                        @endforeach
                    </select>
                    <br>
            
                    <label>Fournisseur : </label>
                    <select name="idfournisseur" class="form-control">
                          <option value="" >Selectionner un accessoire</option> 
                        @foreach($fournisseurs as $fournisseur )
                          <option value="{{ $fournisseur->id }}">{{ $fournisseur->fullname }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Quantité : </label>
                    <input type="number" class="form-control" name="qte" placeholder="quantite ..." ><br>
                    <label>Numéro de facture : </label>
                    <input type="text" class="form-control" name="numfacture" placeholder="Numéro du facture " ><br> 
                    <label>utilisateur : </label>
                    <input type="text" class="form-control" disabled name="user" value="{{ Auth::user()->name }}" ><br>
                    <label>saison : </label>
                    <input type="text" class="form-control" name="saison" placeholder="saison " ><br>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
    </form>
    </div>
  </div>
</div>

@if ( count($campionarios) > 0 )
@foreach($campionarios as $campionario )
<!-- Modal Add Item -->
<!-- Modal -->
<div class="modal fade" id="fichier{{ $campionario->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="/campionario/fichecontrole/add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rediger un fichier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">
        <thead>
          <tr>
                        
            <td> <img src="{{ asset('img/logo.png') }}" width="150" height="70"> </td>

            <td rowspan="2" style="text-align: center;padding-top:50px;">
                            <h2> fiche de controle </h2>
            </td>

            <td> 
              <?php echo date('Y-m-d'); ?>
            </td>

          </tr>

          <tr>
            <td> <label> Utilisateur </label><input type="text"  disabled class="form-control" value="{{ Auth::user()->name }}">
            <input type="hidden"  class="form-control" value="{{ Auth::user()->name }}" name="user"> </td>
            
            <td> <label> Numéro </label><input name="numero" type="text"  class="form-control" placeholder="tapper le numero" > </td>
          </tr>
        </thead>

        <tbody>
        </tbody>
        
      </table>

      <div class="form-group row">
        
          <div class="col-sm-3"> 
            <label>Code </label>  
          </div>
          <div class="col-sm-9"> 
            <select disabled name="" class="form-control">
                              @foreach($accessoires as $accessoire )
                                @if ($accessoire->id == $campionario->idaccessoire )
                                    <option value="{{ $accessoire->id }}">{{ $accessoire->code }}</option>
                                    <input type="hidden" name="idaccessoire" value="{{ $accessoire->id }}">     
                               
                                @endif  
                              @endforeach
                          
                       
                    </select> 
              
          </div>
        
      </div>
      
      
        <div class="form-group row">
              <div class="col-sm-3"> 
                  <label>Couleur </label>  
              </div>
              <div class="col-sm-9"> 
                              @foreach($accessoires as $accessoire )
                                @if ($accessoire->id == $campionario->idaccessoire )
                                <input disabled type="text" class="form-control"  value="{{ $accessoire->color }}">
                                    
                                <input type="hidden" name="couleuraccessoire" value="{{ $accessoire->color }}">     
                                   
                                @endif  
                              @endforeach
                     
              </div>
          
      </div>
      <div class="form-group row">
              <div class="col-sm-3"> 
                  <label>Fournisseur </label>  
              </div>
              <div class="col-sm-9"> 
                <select disabled  class="form-control">
                              @foreach($fournisseurs as $fournisseur )
                                @if ($fournisseur->id == $campionario->idfournisseur )
                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->fullname }}</option>
                                 <input type="hidden" name="idfournisseur" value="{{ $fournisseur->id }}">     
                                @endif  
                              @endforeach
                          
                       
                    </select>  
              </div>

      </div>
      <div class="form-group row">
              <div class="col-sm-3"> 
                  <label>type de controle </label>  
              </div>
              <div class="col-sm-9"> 
                <input type="text" class="form-control" name="typecontrole">  
              </div>

      </div>

      
      <div class="form-group row">
              <div class="col-sm-3">
                <label>probleme </label>
              </div>
              <div class="col-sm-9">
                <textarea class="form-control" name="probleme"></textarea>
              </div>
      </div>

      <div class="form-group row last">
              <div class="col-sm-3">
                <label>decision </label>
              </div>
              <div class="col-sm-9">
                <input type="text"  class="form-control" name="decision">
              </div>
      </div>
      <input type="hidden" name="idcampionario" value="{{ $campionario->id }}">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endforeach

@foreach($fichescontroles as $fichecontrole )
<!-- Modal Add Item -->
<!-- Modal -->
<div class="modal fade" id="fichiercontrole{{ $fichecontrole->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="/fichecontrole/print/{{ $fichecontrole->id }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">fichier de controle </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td><img img src="{{ asset('img/logo.png') }}" width="150" height="70"></td>
            <td rowspan="2" style="text-align: center;padding-top:30px;"><h2> fiche de controle </h2></td>
            <td> {{ $fichecontrole->created_at }} </td>
          </tr>

          <tr>
            <td> {{ $fichecontrole->user }} </td>
            
            <td> {{ $fichecontrole->numero }}  </td>
          </tr>
        </thead>

        <tbody>
        </tbody>
        
      </table>
      
      <div class="form-group row" style="text-align: center;">
        
          <div class="col-sm-6"> 
            <label>Code </label>  
          </div>
          <div class="col-sm-6"> 
             
                        @foreach($accessoires as $accessoire )
                          @if ($accessoire->id == $fichecontrole->idaccessoire)
                              {{ $accessoire->code }}
                            @endif
                        @endforeach
                    
              
          </div>
        
      </div>
      
      
        <div class="form-group row" style="text-align: center;">
              <div class="col-sm-6"> 
                  <label>Couleur </label>  
              </div>
              <div class="col-sm-6"> 
                {{ $fichecontrole->couleuraccessoire }}    
              </div>
          
      </div>
      
      <div class="form-group row" style="text-align: center;">
              <div class="col-sm-6"> 
                  <label>Fournisseur </label>  
              </div>
              <div class="col-sm-6"> 
                
                        @foreach($fournisseurs as $fournisseur )
                            @if ($fournisseur->id == $fichecontrole->idfournisseur)
                              {{ $fournisseur->fullname }}
                            @endif
                        @endforeach
                     
              </div>

      </div>
      
      <div class="form-group row" style="text-align: center;">
              <div class="col-sm-6"> 
                  <label>type de controle </label>  
              </div>
              <div class="col-sm-6"> 
                {{ $fichecontrole->typecontrole }}
              </div>

      </div>

      
      <div class="form-group row" style="text-align: center;">
              <div class="col-sm-6">
                <label>probleme </label>
              </div>
              <div class="col-sm-6">
                {{ $fichecontrole->probleme }}
              </div>
      </div>
      
      <div class="form-group row last" style="text-align: center;">
              <div class="col-sm-6">
                <label>decision </label>
              </div>
              <div class="col-sm-6">
                {{ $fichecontrole->decision }}
              </div>
      </div>
      <input type="hidden" name="idcampionario" value="{{ $campionario->id }}">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Imprimer</button>
      </div>
    </div>
  
  </div>
</div>
@endforeach

@foreach($accessoires as $accessoire )
<!-- Modal Add Item -->
<!-- Modal -->
<div class="modal fade" id="accessoire{{ $accessoire->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information d'accessoire </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div> <h5>Code d'accessoire :</h5>   {{ $accessoire->code }} </div>
       <hr>
       <div> <h5>Couleur d'accessoire :</h5>   {{ $accessoire->color }} </div>
       <hr>
       <div> <h5>Famille :</h5>   {{ $accessoire->famille }} </div>
       <hr>
       <div> <h5>Sous famille :</h5>   {{ $accessoire->sfamille }} </div>
       <hr>
       <div> <h5>Pays :</h5>   {{ $accessoire->payes }} </div>
       <hr>
       <div> <h5>Description :</h5>   {{ $accessoire->description }} </div>
       <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  
  </div>
</div>
@endforeach

@endif
@endsection