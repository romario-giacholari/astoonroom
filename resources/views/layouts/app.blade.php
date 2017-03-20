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

    <style>
    /* Style the Image Used to Trigger the Modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.Imagemodal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index:1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.Imagemodal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.Imagemodal-content, #caption { 
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 55px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color:white;
    opacity:1;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .Imagemodal-content {
        width: 100%;
    }
}

    body{
        background-color:white;
    }
        #Posts:hover{
        opacity:0.8;
        color:blue;
        background-color:#f2f2f2;     
    }
    #AD{
         border-style: ridge;
         border-color: black;
         
      
    }
    #Posts{
         padding:15px;
         overflow:hidden;
         background-color:white;
         
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

  
             .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top :0;
                left: 0;
                background-color:black;
                overflow-x: hidden;
                transition:0s;
                text-align:center;
                opacity:1;
                




            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size:24px;
                font-family: Lato;
                color: #818181;
                display: block;
                transition: 0.5s;
                margin-left:auto;
                margin-right:100%;
                position:relative;




            }

            .sidenav a:hover{
                color:white;
            }

            .closebtn {
                font-size: 36px !important;


            }
     #arrow{
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 10px 10px 0 10px;
                border-color: white transparent transparent transparent;
                margin-top:7px;
            }

    </style>
</head>
<body>
    <div id="app">

            <div id="mySidenav" class="sidenav">
                    
             

                <div class = 'container'>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
                <a href="/home"><span class="glyphicon glyphicon-home"></span></a>
                <a href="/articles"><span class ='glyphicon glyphicon-flash'></span></a>
                <a href="/create"><span class =' glyphicon glyphicon-plus'></span></a>
               
            @if(Auth::guest())
               <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span></a>
               <a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span></a>
             @else
                            
                  
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class = 'glyphicon glyphicon-off'></span>
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                          
                        @endif
                     <!--       
                 <form action = '/articles/search' method = 'GET' class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input size = '30' style = 'color:white;background:black;' id="search" name = 'q' type="text" class="form-control" placeholder="Search">
                  </div>
                </form>
                    -->
            </div>
            </div>

<nav class="navbar navbar-inverse" style = 'background-color:black; '>
  <div class="container-fluid">
    <div class="navbar-header">
       <button  class = 'navbar-brand' style = 'background-color:black;  border:none; position:relative;' type="button"  onclick="openNav()"><span class ='glyphicon glyphicon-align-justify' >
        
      </span></button>
      <a class="navbar-brand" style = " color:white; font-size :2em;" href="/">astonroom</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a class = 'menuItem'  href="/home">Home</a></li>
            <li><a class = 'menuItem'  href="/create">Post</a></li>
            <li><a class = 'menuItem'  href="/articles">Browse</a></li>
          </ul>
        <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
              @if(Auth::guest())
               <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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

                                    </li>

                                </ul>
                            </li>
                        
                    @endif

              </ul>
         </div>
   </div>
 </div>
</nav>

     <div id  = 'content'>
       

        @yield('content')
      

       </div>
        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script>
$("#content").click(function() {

    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("app").style.marginLeft= "0";

});

function openNav() {
    document.getElementById("mySidenav").style.width = "80px";
    document.getElementById("app").style.marginLeft = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("app").style.marginLeft= "0";
}
</script>
<!--
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
-->
    
</body>
</html>