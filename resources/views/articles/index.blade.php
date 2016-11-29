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
@foreach($articles as $article)
  @foreach($article->photo as $thumbnail)
	@if(count($thumbnail)>0)
        <div   id = 'whole'>
        @else
        <div id = 'whole' style = 'height:200px;'>
        @endif
        @endforeach	
        @endforeach
        <h1  style = 'height:1px;background-color:#00CCFF;color:black;font-size:3em; font-family:Arial, Helvetica, sans-serif;'></h1>
@foreach($articles as $article)


<div class = "col-md-4 col-md-offset-0" id ='Posts' ">

	     
			
			@if(count($article->photo) > 0 )
			<img id = 'cover' src = '{{$article->photo[0]->path}}' height = "280px" width="300px">
			@else
			<img id = 'cover' src = 'default.jpg	' height = "280px" width="300px">
			@endif
<a href = 'articles/{{$article->id}}'>

		  	<div id = 'banner' class = 'col-md-12 col-md-offset-0' style = 'margin-top:0px;background-color:#F0F5F5;max-width:300px ;min-width: 300px'>
		    <h3 style = 'font-family:Arial, Helvetica, sans-serif'>{{$article->title}}</h3>
		     <div>{{$article->location}}</div>
		  	<span class="glyphicon glyphicon-eye-open"></span> {{$article->views}} 
		  	<div>$400 pp</div>
		  	 
		  	  
		  
		   
		</a>  
		     
		
		 </div>
	</div>
	
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
