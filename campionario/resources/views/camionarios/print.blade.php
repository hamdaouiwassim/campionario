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
            <h2> les echontillonages </h2>
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
         <?php $i=0; ?>  
         @foreach($campionarios  as $campionario)
         <?php $i++; ?>
         <br>
         <div><h3> L'echantillonage  {{ $i }} </h3></div>
         <hr>
        <div >
            <h4>Accessoire </h4>
            <div >
            <div class="databox">
            <h6>
            @foreach($accessoires  as $accessoire)
                @if ($campionario->idaccessoire == $accessoire->id )
                {{ $accessoire->code }}
                @endif
                             
             @endforeach
            </h6>
            </div>
            </div>

        </div>
        <div >
            <h4>Fournisseur </h4>
            <div >
            <div class="databox">
            <h6>
            @foreach($fournisseurs  as $fournisseur)
                    @if ($campionario->idfournisseur == $fournisseur->id )
                         {{ $fournisseur->fullname }}
                    @endif
                             
             @endforeach
            </h6>
            </div>
            </div>

        </div>
        <div >
            <h4>Quantité </h4>
            <div class="databox">
            <h6>{{ $campionario->qte }}</h6>
            </div>
        </div>
        <div >
            <h4>Numero du facture </h4>
            <div class="databox">
            <h6>
            {{ $campionario->numfacture }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Saison</h4>
            <div class="databox">
            <h6>
            {{ $campionario->saison }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Etat </h4>
            <div class="databox">
            <h6>
            @if ($campionario->stat == 0 )

            Bloqué

            @else
            Debloqué
            @endif
            
            </h6>
            </div>

        </div>
       
       
        @endforeach
</div>
<script>
    
     window.print();

    </script>