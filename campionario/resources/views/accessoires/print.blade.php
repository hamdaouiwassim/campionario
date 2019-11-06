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
            <h2> les accessoires </h2>
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
         @foreach($accessoires  as $accessoire)
         <br>
         <div><h3> L'accessoire  {{ $accessoire->code }} </h3></div>
         <hr>
        <div >
            <h4>Code </h4>
            <div >
            <div class="databox">
            <h6>
                              {{ $accessoire->code }}
            </h6>
            </div>
            </div>

        </div>
        <div >
            <h4>Famille </h4>
            <div class="databox">
            <h6>{{ $accessoire->famille }}</h6>
            </div>
        </div>
        <div >
            <h4>Sous Famille </h4>
            <div class="databox">
            <h6>
            {{ $accessoire->sfamille }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Couleur </h4>
            <div class="databox">
            <h6>
            {{ $accessoire->color }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Description </h4>
            <div class="databox">
            <h6>
            {{ $accessoire->description }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Pays </h4>
            <div class="databox">
            <h6>
            {{ $accessoire->payes }}
            </h6>
            </div>

        </div>
        <div >
            <h4>Fournisseur </h4>
            <div class="databox">
            <h6>
            @foreach($fournisseurs as $fournisseur)
            @if ($fournisseur->id == $accessoire->fournisseur)
            {{ $fournisseur->fullname }}
            @endif
            @endforeach
            </h6>
            </div>

        </div>
       
        @endforeach
</div>
<script>
    
     window.print();

    </script>