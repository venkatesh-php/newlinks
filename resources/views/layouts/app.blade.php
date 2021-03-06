<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SivaLinks Matrimonial Consultancy Services">
    <meta name="keywords" content="sivalinks,Matrimonial,Consultancy,Services">
    <meta name="author" content="Sivalinks,venkateswarlu">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SivaLinks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122458766-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122458766-2');
    </script>


    <!-- Styles -->
  

    <style>
    .navbar .transparent .navbar-inner {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background-color: rgba(0,0,0,0.0);
    background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
    background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    }
    .li {
       
    font-family: "Times New Roman", Times, serif;

    }
    body {
        background-image:url({{url('background1.jpg')}});

    }
    </style>
    <script language="JavaScript">
     window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false)};

    </script>

</head>
<body background="background.jpg">

    <div id="app">

     <nav class="navbar transparent">
            <div class="navbar-inner">
                <div class="container">
        <!-- <nav class="navbar navbar-default navbar-static-top"> -->
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar">---</span>
                        <span class="icon-bar">---</span>
                        <span class="icon-bar">---</span>
                    </button>

                    <!-- Branding Image -->
                    @if(Auth::check())
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <h4><b style='color:white'>SivaLinks</b></h4>
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h4><b style='color:white'>SivaLinks</b></h4>
                    </a>
                    @endif

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        @if(Auth::check())
                        @if(Auth::user()->id == 1 || Auth::user()->id == 2  )
                        <li><a href="{{ route('Users.index') }}"><h4 style='color:white'><b>All Users</b></h4></a></li>
                        <li><a href="{{ route('Consultants.index') }}"><h4 style='color:white'><b>Brides</b></h4></a></li>
                        
                        @else
                            @if(Auth::user()->gender == 'male')
                            <li><a href="{{ route('Consultants.index') }}"><h4 style='color:white'><b>Brides</b></h4></a></li>
                           
                            @else
                            <li><a href="{{ route('Consultants.index') }}"><h4 style='color:white'><b>Grooms</b></h4></a></li>
                            
                            @endif
                        @endif
                        <li><a><h4 style='color:white'><b>Your ID : {{Auth::user()->id}} </b></h4></a></li>
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><h4 style='color:white'><b>Login</b></h4></a></li>
                            <li><a href="{{ route('register') }}"><h4 style='color:white'><b>Registration</b></h4></a></li>
                        @else
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <h4 style='color:white'><b>{{ Auth::user()->fullname }}</b></h4> 
                                
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <h4 style='color:white'><b>Logout</b></h4>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

            </div>
            </div>
        </nav>
        <!-- <br><br> -->
        @yield('content')
    </div>

   
</body>
</html>
