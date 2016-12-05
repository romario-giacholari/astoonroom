<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        
    <link rel = "stylesheet" href = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
    }

    #AD{
         border-style: ridge;
         border-color: black;
         
      
    }

    #Posts{
         padding:15px;
         overflow:hidden;
       

    }

    @media screen and (max-width: 480px) {
    #cover {
        height:250px;
    }
    #Posts{
        height:400px;
    }
}

    #banner:hover{
        opacity:0.4;
    
    }


    #nah:hover{
        text-decoration: none;
    }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style = 'background-color: #f2f2f2'>
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
                        <li style = 'margin-top:8px'>
                       <form action = '/articles/search' method = 'GET'>
                            <input  class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'property location, e.g. James Watt' size="40" required>
                           
                        
                        <!-- <label for="Location">Sort by</label>
                         <select class="form-control" id="sort" name = 'sort'>
                                <option>location</option>
                                <option>year</option>
                                <option>created_at</option>
                                <option>gender</option>
                                 <option>views</option>
                              </select> -->
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
