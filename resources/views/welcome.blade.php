<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AstonRoom</title>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="icon" href="https://alphavulture.com/wp-content/uploads/2013/12/alpha.png" type="image/gif" sizes="16x16">
        <!-- Styles -->
        <style>
            html, body {
                background-color:white;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;


            }

            .title {
                font-size: 34px;
                width:100%;
                height:100%;
                font-weight: 600;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links :hover{
               color:black;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style = 'background-color:#F8F8F8;' >
       
        <div class="flex-center position-ref full-height" style = 'background-color:white; height:30%; width:100%; opacity:1'>
            <div class="content">
                <div class="title m-b-md">
                    <h1 style ='font-family:Arial, Helvetica, sans-serif;'>AstonRoom</h1>
                </div>

                <div class="links">
                    @if (Route::has('login'))
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>

         <a href="{{ url('/articles') }}">Browse</a> 
       
                    @endif
                
            @endif
                </div>

            </div>

        </div>  
        <div class="flex-center position-ref" style = 'background-color:white'>
            <h2 style = 'font-family:Arial;'>Looking for a room?</h2>
        </div>

          <div class="flex-center position-ref" style = 'color:black;background-color:grey'>
          <img class = 'img-responsive' src = 'room1.jpg'  >
        </div>
    </body>
</html>