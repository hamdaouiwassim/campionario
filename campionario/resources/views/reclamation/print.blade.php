<style>
    div.cont{
        padding:20px;
        margin-top:50px;
        width:80%;
        margin:0 auto;
        
    }
    table{
        padding:10px;
        width:100%;
        border:1px solid black;
    }
    table tr{
        border:1px solid black;
    }
    table thead tr td {
        margin:-1px;
        text-align:center;
    }
    .databox{
        background-color:silver;
        padding:10px;
        border:1pw solid black;
    }
    h4{
        font-weight:bolder;
    }
    
</style>
<div class="cont" style="border:1px solid black;">
       
        <div style="display:flex;border:1px solid black;">
            <div style="width:30%">
                        <div style="width:100%;height:100px;text-align:center">
                        <img src="{{ asset('img/logo.png') }}" width="150" height="70">
                        </div>
                        <div style="width:100%;height:100px;text-align:center">
                        {{ Auth::user()->name }}
                        </div>
                         
             
              
            </div>
            <div style="width:40%;text-align:center;padding-top:45px">
            <h2> les reclamations </h2>
            </div>
            <div style="width:30%">
                        <div style="width:100%;height:100px;text-align:center;padding-top:15px">
                        <?php echo date('Y-m-d:H:i:s'); ?>
                        </div>
                        <div style="width:100%;height:100px;text-align:center">
                        <?php echo uniqid(); ?>
                        </div>
            
         

           
            </div>
            
         </div>   
         <?php $i=0;?>  
         @foreach($reclamations  as $reclamation )
         <?php $i++; ?>
         <br>
         <div><h3> La reclamation   {{ $i }} </h3></div>
         <hr>
        <div >
            <h4>Reclamé par </h4>
            <div >
            <div class="databox">
            <h6>
                              {{ $reclamation->claimed_by }}
            </h6>
            </div>
            </div>

        </div>
        <div >
            <h4>Fournisseur </h4>
            <div class="databox">
            <h6>{{ $reclamation->supplier }}</h6>
            </div>
        </div>
        <div >
            <h4>Saison </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->season }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Facture fournisseur </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->supplier_invoice }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Accessoire </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->code_accessory }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Couleur </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->color }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Famille  </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->family }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Sous Famille  </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->sfamily }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Date de reception  </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->date_receive }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Prix unitaire  </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->price }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Quantité  </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->quantity }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Prix totale </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->total_amount }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Quantité reclamé </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->claimed_accessory }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Type de defaut </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->out_of_standard_detected }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Decision </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->QC }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Detecté par </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->required_by }}
            </h6>
            </div>

        </div>
        <div >
            <h4>validation </h4>
            <div class="databox">
            <h6>
            {{ $reclamation->validation }}
            </h6>
            </div>

        </div>
        @endforeach
</div>
<script>
    
     window.print();

    </script>