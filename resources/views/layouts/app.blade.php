<!DOCTYPE html>
<html lang="en">
<head>
        <link rel = "stylesheet" href = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css'>
        <meta charset="utf-8">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="https://alphavulture.com/wp-content/uploads/2013/12/alpha.png" type="image/gif" sizes="16x16">
        
    <title>{{ config('app.name', 'Laravel') }}</title>
 

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>
 $(document).ready(function(){
            $('#search').click(function(){
                $('#whole').css({ "opacity":"0.1"});
            });
             $('#whole').hover(function(){
                $('body').css({ "opacity":"1"});
            });
        });
        </script>


    <style>
    body{
        background-color:white;
    }
        #Posts:hover{
        color:blue;
        opacity:0.8;
        border:ridge;
        border-width: 1px;
        border-color: blue;
    }
    #AD{
         border-style: ridge;
         border-color: black;
         
      
    }
    #Posts{
         padding:15px;
         overflow:hidden;
         
    }
  
    #pills{
        margin-bottom:5px;
    }
    #nah:hover{
        text-decoration: none;
    }
    #mainImage:hover{
        opacity:0.8;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top"  style = 'background-color:white'>
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'AstonRoom') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    @if(Auth::check())
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    
                    <li><a href="{{ url('/articles') }}">Browse</a></li>
                    @else
                     <li><a href="{{ url('/articles') }}">Browse</a></li>
                    @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                        <li style = 'padding:10px'>
                            <form action = '/articles/search' method = 'GET'>
                                <input  class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'search property location, e.g. James Watt' size="40" required>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
       
        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    
</body>
</html>