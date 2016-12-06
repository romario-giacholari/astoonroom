@extends('layouts.app')
@section('content')

<div class = 'container'>
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

<a href = 'articles/{{$article->id}}'>
<div class = "col-md-4 col-md-offset-0" id ='Posts' >
<div class = 'row'>
	     
			
			@if(count($article->photo) > 0 )
			<img id = 'cover' src = '{{$article->photo[0]->path}}' height = "280px" width="300px">
			@else
			<img id = 'cover' src = 'default.jpg	' height = "280px" width="300px">
			@endif


		  	<div id = 'banner' class = 'col-md-12 col-md-offset-0' style = 'margin-top:0px;background-color:#F0F5F5;max-width:300px ;min-width: 300px; padding:25px'>
		  	<div class = 'row'>
		    <h3 style = 'font-family:Arial, Helvetica, sans-serif'>{{$article->title}}</h3>
		     <div>{{$article->location}}</div>
		  	<span class="glyphicon glyphicon-eye-open"></span> {{$article->views}} 
		  	<div>$400 pp</div>
		  	 
		  	  
		  </div>
		   </div>
		 
		     
		
		 
	</div>
	</div>
	</a> 
	@endforeach

	</div>
		
</div>

</div>

</div>
@endsection
