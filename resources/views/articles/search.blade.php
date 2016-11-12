@extends('layouts.app')

@section('content')

@if(count($articles) >0)

<div class = 'container'>
<div class = "col-md-13 col-md-offset-0" >
<h1 style = 'font-size:3em; font-family:Arial;'>Closest match</h1>

<div class="form-group">
	  <form action = '/articles/search' method = 'GET'>
	 	<input style = ' font-size:2em; ' class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'Search' required>
	 </form>
</div>
</div>
</div>
     <div class = 'container' id = 'whole'>
@foreach($articles as $article)
<a href = '{{$article->id}}' style = 

@if($article->color == '#000000')


        'color:white'
        @else

        'color:black'
        @endif

>
<div class = "col-md-4 col-md-offset-1 jumbotron" id ="Posts" style =' background-color:{{$article->color}}'>
	<div class ='row'>
		 <div class="form-group">
		 <div>Views: {{$article->views}}</div>
		 <div>Year: {{$article->year}}</div>
		  <div >Contact info: 
		     @if($article->contact)
		     Provided
		     @else
		     None given
		     @endif
		     </div>
		     <div>Location: {{$article->location}}</div>
		     <div> {{$article->created_at->diffForHumans()}}</div>
		    <label style = 'width:100%;font-family:Arial, Helvetica, sans-serif;'><h2>{{$article->title}}</h2></label>
		 </div>
	</div>
</div>
</a>

  
@endforeach

</div>
@else
<div class = 'container'>
	<div class = "col-md-12 col-md-offset-0" >
		<h1 style = 'font-family:Arial, Helvetica, sans-serif;color:black;'>Woops... no results</h1>
		<div class="form-group">
		  <form action = '/articles/search' method = 'GET'>
		 	<input style = ' font-size:2em; ' class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'Search' required>
		 </form>
	  </div>

	</div>
</div>		
@endif
@endsection