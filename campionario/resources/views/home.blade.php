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
                              <a class="nav-link" href="/approbations">Approbation</a>
                            </li>
                              
                            @endif
                            
                           
                        </ul>
                    </div>
                     
           
  
  </div>
  <h1 style="position:absolute;bottom:150px;left:40%;font-size:76px;"> campio<span style="color:green;">MAG</span> </h1>
</div>

@endsection