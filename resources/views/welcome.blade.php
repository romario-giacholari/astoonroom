<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>astonroom</title>
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
                color: black;
                font-family: 'Arial', sans-serif;
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
                font-size: 14px;
                width:100%;
                height:100%;
                font-weight: 600;
            }

            .links > a {
                color:black;
                padding: 0 25px;
                font-size:11px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                
            }
            .links > a:hover {
                opacity:0.5;
                
            }

            .links :hover{
               color:black;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #img{
                
                  height:30%;
                  @if(Auth::check())
                  height:100%;
                  @endif
                  background-image:url('http://wallpaper.pickywallpapers.com/1920x1080/earth-stratosphere.jpg');
                   background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                
            }

        </style>
    </head>
    <body  >
       
        <div  id = 'img' class="flex-center position-ref full-height" >
            <div class="content">
                <div class="title m-b-md">
                    <h1 style ='color:black;font-family:Arial, Helvetica, sans-serif;'>astonroom</h1>
                </div>

                <div class="links">
                    @if (Route::has('login'))
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                <a href="register"> Sign Up</a>
                <a href="/login">Login</a>

         <a href="{{ url('/articles') }}">Browse</a> 
       
                    @endif
                
            @endif
                </div>

            </div>

        </div>  
        <hr>
        <!--
          <div class = " col-md-12 col-md-offset-0 " >
          <div class = 'container'>
                <div class = 'row'>

                        <div class="form-group ">
                          <p style = 'margin-left:15px'>Looking for a room within Birmingham?</p>

                           <form method = 'GET' action = 'articles/search'>
                            
                              <div class = "  col-xs-8 col-md-11 col-md-offset-0">
                                <div class="form-group" >
                                  <label for="q">Sort by location</label>
                                  <select required class="form-control" id="q" name = 'q' autofocus>
                                    <option>Birmingham</option>
                                  </select>
                                 </div>
                              </div>

                                 <div class = " col-md-0 col-md-offset-0" style = 'padding:24px'>
                                 <button type="submit" class="btn btn-info">
                                      <span class="glyphicon glyphicon-search"></span> 
                                    </button>
                                  </div>
                                
                                
                            </form>
                        </div>
                 </div>
        </div>
      </div>

      @if(Session::has('flash_message'))
      <div class =' container'>
       <div class = 'row'>
        <div class = ' col-md-12'>
            <div  id='alert-msg' class = 'alert alert-danger col-md-12 col-md-offset-0' style = 'margin-top:0px;'>  <p>{{Session::get('flash_message')}}</p>
              </div>
          </div>
        </div>
      </div>
    @endif
-->
@if(Auth::guest())
<div class="container" >
    <div class="row"> 
        <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>

@endif


  <footer class="text-center jumbotron" style = 'background-color: white'>
       <p style = 'font-size:1em'>Created by <a href = 'https://www.linkedin.com/in/romario-giacholari-71130b11b?trk=hp-identity-name' target="_blank">Romario Giacholari</a></p>
   </footer>            
              
    </body>
</html>