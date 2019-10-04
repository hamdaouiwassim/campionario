<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'campioMAG') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <style>
            .circlered{
                    border-radius:50%;
                    background-color:red;
                    width:15px;
                    height:15px;
            }
            
            .circlegreen{
                    border-radius:50%;
                    background-color:green;
                    width:15px;
                    height:15px;
            }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                  <a class="navbar-brand" href="{{ url('/') }}">campioMAG</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        @if (Auth::guest())
                            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                            <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                        @else
                           
                                <a href="#" class="nav-item nav-link">
                                    {{ Auth::user()->name }} 
                                </a>

                                
                                <a href="{{ route('logout') }}" class="nav-item nav-link"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                   
                            
                        @endif
                    
                    </div>
                  </div>
        </nav>


        @yield('content')
    </div>

    <!-- Scripts -->
    
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/print.js') }}"></script>
    
<script type="text/javascript">
$('.btnprn').click(function(){
     window.print();
});
</script>
<script>

function addtoprinter(id){
    alert(id);
    var check = $('#printed'+id);
   
    if (check.checked == true)
    {
        alert(check);
        $('#listeprinted').val(id);
    
    }
    
}

</script>
    <!-- Place your kit's code here -->
    <!--<script src="https://kit.fontawesome.com/0d7402bca0.js"></script>-->
</body>
</html>
