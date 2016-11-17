@extends('layouts.app')
@section('content')
@if(count($articles) >0)
<div class = 'container'>
<div class = 'row'>
<div class = "col-md-12 col-md-offset-0" >


<!-- <div class="form-group">
	  <form action = '/articles/search' method = 'GET'>
	 	<input style = ' font-size:2em;font-family:Arial, Helvetica, sans-serif; ' class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'Search'  required>
	 	
	 	<!-- <label for="Location">Sort by</label>
	 	 <select class="form-control" id="sort" name = 'sort'>
                <option>location</option>
                <option>year</option>
                <option>created_at</option>
                <option>gender</option>
                 <option>views</option>
              </select> 
	 </form>
</div>
-->
<script>

 $(document).ready(function(){
            $('#search').click(function(){

                $('#whole').css({ "opacity":"0.5"});

            });

             $('#whole').hover(function(){

                $('#whole').css({ "opacity":"1"});

            });

        });
        </script>


        <div   id = 'whole'>
        <h1  style = 'height:5px;background-color:#00CCFF;color:black;font-size:3em; font-family:Arial, Helvetica, sans-serif;'></h1>
@foreach($articles as $article)

<a href = 'articles/{{$article->id}}' style = 
@if($article->color == '#000000')


        'color:white';
        @else

        'color:black';
        @endif

>
<div class = "col-md-12	jumbotron col-md-offset-0" id ='Posts' style = "background-color:{{$article->color}};">

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
		  
		     <label ><h2 style = 'font-family:Arial, Helvetica, sans-serif'>{{$article->title}}</h2></label>
		
		 </div>
	     <div class = "col-md-9 col-md-offset-0">
		 @foreach($article->photo as $thumbnail)
			<img src = '{{$thumbnail->path}}' height = "180px" width="180px">
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
		<h1 style ='font-family:Arial, Helvetica, sans-serif;'>No Posts.</h1>
	</div>
</div>		

@endif
@endsection
