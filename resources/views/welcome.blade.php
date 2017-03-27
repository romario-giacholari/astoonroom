@extends('layouts.app')

@section('content')

@if(Auth::guest())
<div class="container" >
    <div class="row"> 




<a href = '/register'>
<div class="col-md-4 col-md-offset-0">
   <div class="panel panel-default">
     <img src = 'http://www.qubsu.org/Advertisewithus/CentredImage,426468,en.jpg' class ='img-thumbnail ad-image'>
  </div>
</div>
</a>



        <div class="col-md-8 col-md-offset-0">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required  placeholder="Email">

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


@endif


</div>
</div>
<blockquote>
This is a side project I that I have been working on lately. The only purpose of this web app, is to try an expand my web development skills. It is not serving any other purpose or whatsoever. Anyhow, you can find me on LinkedIn by following the link below. Feel free to contact me on this email: giacholari@gmail.com

</blockquote>

<img src = 'http://www.uws.asia/uploadimg/201602/Accommodation.png' height ='200' width ='200' style =" display: block;margin-left: auto;
    margin-right: auto;">
  <footer class="text-center" style = ';margin-top:20px;'>
       <p style = 'font-size:1em'>Created by <a href = 'https://www.linkedin.com/in/romario-giacholari-71130b11b?trk=hp-identity-name' target="_blank">Romario Giacholari</a></p>
   </footer> 

@endsection