@extends('layouts.app')

@section('content')


<div class = 'container'>
<h1 style = 'height:1px;background-color:#4AD452;color:black;font-size:3em; font-family:Arial, Helvetica, sans-serif;'></h1>
<div class = 'row'>
<div class = "col-md-12 col-md-offset-0" >

 @if(Session::has('flash_message'))
<div  id='alert-msg' class = 'alert alert-danger col-md-12 col-md-offset-0' style = 'padding: '>
<h1 style ='font-family:Arial, Helvetica, sans-serif;'>{{Session::get('flash_message')}}</h1>
</div>


<script>
$(document).ready(function(){
  $('#alert-msg').fadeIn(2000);
  });
</script>
@endif	

<!--<div class="form-group">
	  <form action = '/articles/search' method = 'GET'>
	 	<input style = ' font-size:2em; ' class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'Search' required>
	 </form>
</div>
-->
     

@foreach($articles as $article)
  <div class="  col-md-12 col-md-offset-0">
  <div class="row">
    <div  class="thumbnail " >
    @if(count($article->photo) > 0)
     <a href="articles/{{$article->id}}"  >
        <img  id="mainImage" class = 'img-responsive' src = '{{$article->photo[0]->path}}' alt ='{{$article->title}}' >
      </a>
      @endif
      <div class="caption">
        <h3>{{$article->title}}</h3>
        <p>{{$article->body}}</p>
        <p>Location:{{$article->location}}</p>
        <p><span class = 'glyphicon glyphicon-eye-open' ></span> {{$article->views}}</p>
        <p><a href="articles/{{$article->id}}" class="btn btn-primary" role="button">View</a> </p>
      </div>
    </div>
  </div>
</div>
	
@endforeach
</div>
</div>
</div>
<div class = 'text-center'>{{$articles->links()}}</div>
@endsection