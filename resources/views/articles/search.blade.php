@extends('layouts.app')

@section('content')

@if(count($articles) >0)

<div class = 'container'>
<div class = 'row'>
<div class = "col-md-12 col-md-offset-0" >

<!--<div class="form-group">
	  <form action = '/articles/search' method = 'GET'>
	 	<input style = ' font-size:2em; ' class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'Search' required>
	 </form>
</div>
-->
     <div  id = 'whole'>
     <h1 style = 'height:5px;background-color:#4AD452;color:black;font-size:3em; font-family:Arial, Helvetica, sans-serif;'></h1>
@foreach($articles as $article)
<a href = '{{$article->id}}' style = 

@if($article->color == '#000000')


        'color:white'
        @else

        'color:black'
        @endif

>

<div class = "col-md-12 col-md-offset-0 jumbotron" id ="Posts" style =' background-color:{{$article->color}}'>
	
		 <div class="col-md-3 col-md-offset-0 form-group">
		 <span class = 'glyphicon glyphicon-home'></span>
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
		     <div>Gender: {{$article->gender}}</div>
		     <div> {{$article->created_at->diffForHumans()}}</div>
		    <label style = 'width:100%;font-family:Arial, Helvetica, sans-serif;'><h2>{{$article->title}}</h2></label>
		 </div>
	

	     <div class = "col-md-9 col-md-offset-0">
		 @foreach($article->photo as $thumbnail)
			<img src = '{{$thumbnail->path}}' height = "180px" width="180px" >
		 @endforeach
		 </div>
</div>

</a>

  
@endforeach
</div>
</div>
</div>
</div>

@else
<div class = 'container'>
	<div class = "col-md-12 col-md-offset-0" >
	 <h1 style = 'height:5px;background-color:#E6001A;color:black;font-size:3em; font-family:Arial, Helvetica, sans-serif;'>
	 <br />
	<a id = 'nah' style = 'color:white;' href = '/articles'> <button class = 'btn btn-primary btn-lg'>Back</button></a>
	 </h1>

	</div>
</div>		
@endif
@endsection