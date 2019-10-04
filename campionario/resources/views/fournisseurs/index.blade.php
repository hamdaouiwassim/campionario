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
                              <a class="nav-link active" href="/fournisseurs">Fournisseurs</a>
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
                          <h3>Liste des fournisseurs </h3>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-success" data-toggle="modal" data-target="#fournisseur"><i class="fas fa-plus-circle"></i> Ajouter un fournisseur</button>
                        </div>
                        
                      </div>         
                              
                          
                    </div>
                    
                    
                    <div style="padding-top:20px;background-color:white;max-height:400px;overflow-y:scroll;">
                    <hr>
                       <hr>
                  <div class="col-md-12" >
                    <form class="row" action="/fournisseurs/filter" method="POST"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="fullname">  
                      </div>
                      <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="checher">  
                      </div>
                      
                      
                    </form>
                    <br>
                  </div> 
                  <br>
                     <!-- Table -->
                     <table class="table table-bordered" style="border-color:black !important;">
                      <thead>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Adresse </th>
                          <th>Telephone </th>
                          <th>Action</th>
                          <th> Selection </th>
                      </thead>
                      <tbody>
                      <?php $i=0; ?>  
                      @foreach($fournisseurs as $fournisseur)
                        <?php $i++; ?>
                          <tr>
                          <td>{{ $i }}</td>  
                          <td>{{ $fournisseur->fullname }}</td>
                            <td>{{ $fournisseur->email }}</td>
                            <td>{{ $fournisseur->adresse }}</td>
                            <td>{{ $fournisseur->telephone }}</td>
                            <td> <a class="btn btn-primary" data-toggle="modal" data-target="#fournisseur{{ $fournisseur->id }}"> <i class="fas fa-user-edit"></i> </a> <a href="/fournisseur/delete/{{ $fournisseur->id }}" onclick="return confirm('Supprimer cette fournisseur')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
                            <td><input type="checkbox" name="printed[]" value="{{ $fournisseur->id }}" ></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>        
                  </div>  
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="text-align:center"> <a href="/imprimer/accessoire/{}" class="btn btn-success"> Imprimer </a></div>
                  </div>    
                            
                    </div>
           
    </div>
    
</div>
<!-- Modal Add Item -->
<!-- Modal -->
<div class="modal fade" id="fournisseur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <form action="/fournisseur/add" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fournisseur </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
                    <input type="text" class="form-control" name="fullname" placeholder="Nom complete ..." ><br>
            
            
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse ..." ><br>

                   
                    <input type="text" class="form-control" name="telephone" placeholder="Telephone ..." ><br>

                    <input type="email" class="form-control" name="email" placeholder="fournisseur@gmail.com" ><br>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@foreach($fournisseurs as $fournisseur )
<!-- Modal Add Item -->
<div class="modal fade" id="fournisseur{{ $fournisseur->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="/fournisseur/update/{{ $fournisseur->id }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifier un fournissuer : {{ $fournisseur->fullname }} </h4>
      </div>
      <div class="modal-body">       
                    <input type="text" class="form-control" name="fullname" value="{{ $fournisseur->fullname }}" ><br>
            
            
                    <input type="text" class="form-control" name="adresse" value="{{ $fournisseur->adresse }}" ><br>

                   
                    <input type="text" class="form-control" name="telephone" value="{{ $fournisseur->telephone }}" ><br>

                    <input type="email" class="form-control" name="email" value="{{ $fournisseur->email }}" ><br>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach


@endsection