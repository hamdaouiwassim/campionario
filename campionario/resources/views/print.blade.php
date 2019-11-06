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
                        {{ $fichecontrole->user }}
                        </div>
                         
             
              
            </div>
            <div style="width:40%;text-align:center;padding-top:45px">
            <h2> Fiche de controle </h2>
            </div>
            <div style="width:30%">
                        <div style="width:100%;height:100px;text-align:center;padding-top:15px">
                        <?php echo date('Y-m-d:H:i:s'); ?>
                        </div>
                        <div style="width:100%;height:100px;text-align:center">
                        {{ $fichecontrole->numero }} 
                        </div>
            
         

           
            </div>
            
         </div>   
 
        <div >
            <h4>Accessoire </h4>
            <div >
            <div class="databox">
            <h6>
                             @foreach($accessoires as $accessoire)
                             @if ($accessoire->id == $fichecontrole->idaccessoire )
                                {{ $accessoire->code }}
                             @endif
                             @endforeach
            </h6>
            </div>
            </div>

        </div>
        <div >
            <h4>Fournisseur </h4>
            <div class="databox">
            <h6> @foreach($fournisseurs  as $fournisseur)
                    @if ($fichecontrole->idfournisseur == $fournisseur->id )
                         {{ $fournisseur->fullname }}
                    @endif
                             
             @endforeach</h6>
            </div>
        </div>
        <div >
            <h4>Couleur  </h4>
            <div class="databox">
            <h6>
            {{ $fichecontrole->couleuraccessoire }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Type de controle  </h4>
            <div class="databox">
            <h6>
            {{ $fichecontrole->typecontrole }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Probleme </h4>
            <div class="databox">
            <h6>
            {{ $fichecontrole->probleme }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Decision </h4>
            <div class="databox">
            <h6>
            {{ $fichecontrole->decision }}
            </h6>
            </div>

        </div>
      
       
       
     
       
     
      
      
    
     
        

</div>
<script>
    
     window.print();

    </script>