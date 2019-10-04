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
                              <a class="nav-link active" href="/reclamations">Reclamation</a>
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
                     <div class="col-md-12" border-radius:10px;" >
                    <div class="container" style="margin-bottom:50px;padding-top:20px;">
                      <div class="row" style="background-color:white;padding:10px;border-radius:10px;">
                        <div class="col-sm-9">
                          <h3>Liste des reclamations </h3>
                        </div>
                        <div class="col-sm-3">
                          <button class="btn btn-success" data-toggle="modal" data-target="#reclamation"><i class="fas fa-plus-circle"></i> Ajouter une reclamation</button>
                        </div>
                        
                        
                      </div>         
                              
                          
                    </div>
                  </div>
                  <div style="padding-top:10px;background-color:white;max-height:400px;overflow-y:scroll;overflow-x:scroll;">
                    <hr>
                  <div class="col-md-12" >
                    <form class="row" action="/reclamations/filter" method="POST"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="code">  
                      </div>
                      <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="checher">  
                      </div>
                      
                      
                    </form>
                  </div> 
                  <div style="padding:10px;">
                     <!-- Table -->
                     <table class="table table-bordered">
                      <thead>
                          <th> Reclamer par </th>
                          <th> Fournisseur </th>
                          <th> Saison </th>
                          <th> Facture fournisseur </th>
                          <th> Code accessoire  </th>
                          <th> Couleur </th>
                          <th> Famile </th>
                          <th> Sous Famile </th>
                          <th> Date de reception  </th>
                          <th> Prix unitaire  </th>
                          <th> Quantité   </th>
                          <th> Prix total   </th>
                          <th> Quantité reclamé   </th>
                          <th> Garments   </th>
                          
                          <th> Type defaut </th>
                          <th> Decision   </th>
                          <th> Montant Total facturé au fournisseur  </th>
                          <th> detecté par   </th>
                          
                          <th> declaré on   </th>
                       
                          <th> Validation </th>
                          <th>Action </th>
                          <th> Selection </th>

                          

                      </thead>
                      <tbody>
                        @foreach( $reclamations as $reclamation )
                          <tr>
                            <td>{{ $reclamation->claimed_by }}</td>
                            <td>{{ $reclamation->supplier }}</td>
                            <td>{{ $reclamation->season }}</td>
                            <td>{{ $reclamation->supplier_invoice }}</td>
                            <td>{{ $reclamation->code_accessory }}</td>
                            <td>{{ $reclamation->color }}</td>
                            <td>{{ $reclamation->family }}</td>
                            <td>{{ $reclamation->sfamily }}</td>
                            <td>{{ $reclamation->date_receive }}</td>
                            <td>{{ $reclamation->price }}</td>
                            <td>{{ $reclamation->quantity }}</td>
                            <td>{{ $reclamation->total_amount }}</td>
                            <td> {{ $reclamation->claimed_accessory }}</td>
                            <td> {{ $reclamation->garments }}</td>
                            
                            <td>{{ $reclamation->out_of_standard_detected }}</td>
                            <td>{{ $reclamation->QC }}</td>
                            <td>{{ $reclamation->total_amount_charged }}</td>

                            <td> {{ $reclamation->required_by }}</td>
                            <td> {{ $reclamation->referred_to_month }}</td>
                            
                            
                            <td style="text-align:center;"> @if ( $reclamation->validation == "closed" )
                            <center><div class='circlered'></div> </center>
                                  @else
                                  
                                  <center><div class='circlegreen'></div></center>
                                  @endif
                             </td>
                             <td> <a data-toggle="modal" data-target="#reclamation{{ $reclamation->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a> </td>
                             <td><input type="checkbox" name="printed[]" value="{{ $reclamation->id }}" ></td>

                            
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>   

                  </div>   
                      
                  <hr>                            
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="text-align:center"> <a href="/imprimer/accessoire/{}" class="btn btn-success"> Imprimer </a></div>
                  </div>
           
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="reclamation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="/reclamation/add" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une reclamation </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
                  <label> Reclamer par </label>
                  <input type="text" class="form-control" name="claimed_by">
                  <label> Fournisseur </label>
                  <input type="text" class="form-control" name="supplier">
                  <label> Saison </label>
                  <input type="text" class="form-control" name="season">
                  <label> Facture fournisseur </label>
                  <input type="text" class="form-control" name="supplier_invoice">
                  <label> Code accessoire </label>
                  <input type="text" class="form-control" name="code_accessory">
                  <label> Couleur </label>
                  <input type="text" class="form-control" name="color">
                  <label> Famille </label>
                  <input type="text" class="form-control" name="famille">
                  <label> Sous famille </label>
                  <input type="text" class="form-control" name="sfamille">
                  <label> Date de reception </label>
                  <input type="date" class="form-control" name="date_receive">
                  <label> Prix Unitaire </label>
                  <input type="number" step="0.01" class="form-control" name="price">
                  <label> Quantité </label>
                  <input type="number" class="form-control" name="quantity">
                  <label> Prix total </label>
                  <input type="number" step="0.01" class="form-control" name="total_amount">
                  <label>Quantité reclamé </label>
                  <input type="number" name="claimed_accessory" class="form-control"     >
                  <label>garments</label>
                  <input type="number" name="garments" class="form-control"              >
                  <label>Type de defaut</label>
                  <input type="number" name="industrial_unit_cost" class="form-control"  >
                  <label>Decision</label>
                  <input type="text" name="out_of_standard_detected" class="form-control"       >
                  <label>QC</label>
                  <input type="text" name="QC" class="form-control"                    >
                  <label>Montant Total facturé au fournisseur</label>
                  <input type="number" step="0.01" name="total_amount_charged" class="form-control"  >
                  <label>detecté par</label>
                  <input type="text" name="required_by" class="form-control"           >
                  <label>referred_to_month</label>
                  <input type="text" name="referred_to_month" class="form-control"     >
                  <label>declaré on</label>
                  <input type="date" name="claim_issued" class="form-control"          >
                  <label>approved_by_supplier</label>
                  <input type="date" name="approved_by_supplier" class="form-control"  >
                  <label>debit_note</label>
                  <input type="text" name="debit_note" class="form-control"            >
                  <label>validation</label>
                  <input type="text" disabled name="validation" class="form-control" value="en cours"           >

                  

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@foreach( $reclamations as $reclamation )
<!-- Modal -->
<div class="modal fade" id="reclamation{{ $reclamation->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="/reclamation/modify" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une reclamation </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
                  <label> Reclamer par </label>
                  <input type="text" class="form-control" value="{{ $reclamation->claimed_by }}" name="claimed_by">
                  <label> Fournisseur </label>
                  <input type="text" class="form-control" value="{{ $reclamation->supplier }}" name="supplier">
                  <label> Saison </label>
                  <input type="text" class="form-control" value="{{ $reclamation->season }}" name="season">
                  <label> Facture fournisseur </label>
                  <input type="text" class="form-control" value="{{ $reclamation->supplier_invoice }}" name="supplier_invoice">
                  <label> Code accessoire </label>
                  <input type="text" class="form-control" name="code_accessory">
                  <label> Couleur </label>
                  <input type="text" class="form-control" name="color">
                  <label> Famille </label>
                  <input type="text" class="form-control" name="famille">
                  <label> Sous famille </label>
                  <input type="text" class="form-control" name="sfamille">
                  <label> Date de reception </label>
                  <input type="date" class="form-control" name="date_receive">
                  <label> Prix Unitaire </label>
                  <input type="number" step="0.01" class="form-control" name="price">
                  <label> Quantité </label>
                  <input type="number" class="form-control" name="quantity">
                  <label> Prix total </label>
                  <input type="number" step="0.01" class="form-control" name="total_amount">
                  <label>Quantité reclamé </label>
                  <input type="number" name="claimed_accessory" class="form-control"     >
                  <label>garments</label>
                  <input type="number" name="garments" class="form-control"              >
                  <label>Type de defaut</label>
                  <input type="number" name="industrial_unit_cost" class="form-control"  >
                  <label>Decision</label>
                  <input type="text" name="out_of_standard_detected" class="form-control"       >
                  <label>QC</label>
                  <input type="text" name="QC" class="form-control"                    >
                  <label>Montant Total facturé au fournisseur</label>
                  <input type="number" step="0.01" name="total_amount_charged" class="form-control"  >
                  <label>detecté par</label>
                  <input type="text" name="required_by" class="form-control"           >
                  <label>referred_to_month</label>
                  <input type="text" name="referred_to_month" class="form-control"     >
                  <label>declaré on</label>
                  <input type="date" name="claim_issued" class="form-control"          >
                  <label>approved_by_supplier</label>
                  <input type="date" name="approved_by_supplier" class="form-control"  >
                  <label>debit_note</label>
                  <input type="text" name="debit_note" class="form-control"            >
                  <label>validation</label>
                  <input type="text" disabled name="validation" class="form-control" value="en cours"           >

                  

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endforeach
@endsection