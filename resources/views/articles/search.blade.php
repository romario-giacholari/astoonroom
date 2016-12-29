@extends('layouts.app')

@section('content')


<div class = 'container'>
<h1 style = 'height:1px;background-color:#4AD452;color:black;font-size:3em; font-family:Arial, Helvetica, sans-serif;'></h1>
<div class = 'row'>
<div class = "col-md-10 col-md-offset-0" >

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

<!--<div class="form-group">
	  <form action = '/articles/search' method = 'GET'>
	 	<input style = ' font-size:2em; ' class="form-control" rows="4"  cols='3' id="search" name = 'q' placeholder= 'Search' required>
	 </form>
</div>
-->
     <div  id = 'whole'>
     

@foreach($articles as $article)
<a href = '{{$article->title}}'>
<div class = "col-md-12 col-md-offset-0 jumbotron" id ="Posts"  >
	
		 <div class="col-md-3 col-md-offset-0 form-group">
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
	
		@if(count($article->photo) > 0)
	     <div class = "col-md-9 col-md-offset-0">
		 	<div class = 'row'>
				<img class = 'img-responsive' src = '{{$article->photo[0]->path}}' height = "250px" width="230px" >
			</div>
		 </div>
		 @endif
</div>

</a>

  
@endforeach
</div>
</div>
</div>
</div>
<div class = 'text-center'>{{$articles->links()}}</div>
@endsection