@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
                   <div class="col-md-12" style="padding:20px;">
                        <ul class="nav nav-tabs" style="border-radius: 5px;background-color: white;">
                            
                            @if (Auth::user()->type == "Administrateur")
                            <li class="nav-item">
                              <a class="nav-link active" href="/accessoires">Accessoires</a>
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
                              <a class="nav-link" href="/approbations">Approbation</a>
                            </li>
                              
                            @endif
                            
                           
                        </ul>
                    </div>
                     <div class="col-md-12" style="min-height:80vh;border-radius:10px;">
                    <div class="container" style="margin-bottom:50px;padding-top:20px;">
                      <div class="row" style="background-color:white;padding:10px;border-radius:10px;">
                        <div class="col-sm-9">
                          <h3>Liste des accessoires </h3>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-success" data-toggle="modal" data-target="#accessoires"><i class="fas fa-plus-circle"></i> Ajouter un accessoire</button>
                        </div>
                        
                      </div>         
                              
                          
                    </div>
                    <hr>
                    <div style="padding-top:20px;background-color:white;max-height:400px;overflow-y:scroll;">
                     <!-- Table -->
                     <hr>
                  <div class="col-md-12" >
                    <form class="row" action="/accessoires/filter" method="POST"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="code">  
                      </div>
                      <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="checher">  
                      </div>
                      
                      
                    </form>
                    <br>
                  </div> 
                  <br>
                     <table class="table table-bordered">
                      <thead>
                          
                          <th>Code</th>
                          <th>Couleur</th>
                          <th>Famille</th>
                          <th>Sous Famille</th>
                          <th>Fournisseur</th>
                          <th>Pays</th>
                          <th>Description</th>
                          <th>Action</th>
                          <th> Selection </th>
                      </thead>
                      <tbody>
                        @foreach( $accessoires as $accessoire )
                          <tr>
                            <td>{{ $accessoire->code }}</td>
                            <td>{{ $accessoire->color }}</td>
                            <td>{{ $accessoire->famille }}</td>
                            <td>{{ $accessoire->sfamille }}</td>
                            <td>@foreach($fournisseurs as $fournisseur )
                                      @if( $accessoire->fournisseur == $fournisseur->id )
                                          {{ $fournisseur->fullname }}
                                      @endif
                                  @endforeach </td>
                            <td>{{ $accessoire->payes }}</td>
                            <td>{{ $accessoire->description }}</td>
                            <td> <button class="btn btn-primary" data-toggle="modal" data-target="#accessoire{{ $accessoire->id }}"> <i class="fas fa-edit"></i> </button> <a href="/accessoire/delete/{{ $accessoire->id }}" onclick="return confirm('Supprimer cette accessoire')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
                            <td><input type="checkbox" name="printed{{ $accessoire->id }}" id="printed{{ $accessoire->id }}" onclick="addtoprinter({{ $accessoire->id }})" value="{{ $accessoire->id }}" ></td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="text-align:center"> 
                        <form method="POST" action="/print">
                                <input name="listeprinted" type="hidden" id="listeprinted">
                                <button type="submit" class="btn btn-success"> Imprimer </button>
                        </form>
                    </div>
                  </div>      
                            
                    </div>
           
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="accessoires" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/accessoire/add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Ajouter un accessoire </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <label>Code </label>
                    <input type="text" class="form-control"  name="code" placeholder="code ..."><br>
                    <label>Couleur </label>
                    <input type="text" class="form-control" name="color" placeholder="couleur ..." ><br>
                    <label>Famille </label>
                    <input type="text" class="form-control" name="famille" placeholder="famille ..." ><br>
            
                    <label>Sous Famille </label>
                    <input type="text" class="form-control" name="sfamille" placeholder="sous famille ..." ><br>
                    <label>Fournisseur </label>
                    <select class="form-control" name="fournisseur">
                        @isset($fournisseurs)
                        @foreach( $fournisseurs as $fournisseur )
                                <option value="{{ $fournisseur->id }}"> {{ $fournisseur->fullname }} </option>;
                        @endforeach
                        @endisset
                    </select><br>      
                    <label>Payes </label>
                    <input type="text" class="form-control" name="payes" placeholder="payes ..." ><br>
                    <label>Description </label>
                    <textarea class="form-control" name="description"></textarea><br>
           
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@foreach( $accessoires as $accessoire )
<!-- Modal -->
<div class="modal fade" id="accessoire{{ $accessoire->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/accessoire/update/{{ $accessoire->id }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
       
        <h4 class="modal-title">Modifier un accessoire : {{ $accessoire->code }} </h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">       
            <input type="text" class="form-control" name="famille" value="{{$accessoire->famille}}" ><br>
            
            
            <input type="text" class="form-control" name="sfamille" value="{{$accessoire->sfamille}}" ><br>

            <select class="form-control" name="fournisseur">
                @isset($fournisseurs)
                @foreach( $fournisseurs as $fournisseur )
                      @if ($fournisseur->id == $accessoire->fournisseur )
                      <option value="{{ $fournisseur->id }}" selected> {{ $fournisseur->fullname }} </option>;
                      @else
                      <option value="{{ $fournisseur->id }}"> {{ $fournisseur->fullname }} </option>;
                      @endif
                        
                @endforeach
                @endisset
            </select><br>
            

            <input type="text" class="form-control" name="code" value="{{$accessoire->code}}" ><br>

            <input type="text" class="form-control"  name="color" value="{{$accessoire->color}}"><br>

            <input type="text" class="form-control" name="payes" value="{{$accessoire->payes}}" ><br>
            <textarea class="form-control" name="description">{{ $accessoire->description }}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

@endsection

