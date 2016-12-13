@extends('layouts.app')
@section('content')
@if(count($articles))
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
        <div>
        	<div class = "col-md-12 col-md-offset-0">
				<div class = 'row'>
						<div class="form-group">
						
				           <form method = 'GET' action = 'articles/search'>
						   <div class = "col-md-2 col-md-offset-0">
								<label class="radio-inline">
								<input type="radio" value = 'Lakeside' name="q">Lakeside
								</label>
								</div>
						<div class = "col-md-2 col-md-offset-0">
								<label class="radio-inline">
								<input type="radio" value = 'William Murdoch' name="q">William Murdoch
								</label>
								</div>
								<div class = "col-md-2 col-md-offset-0">
								<label class="radio-inline">
								<input type="radio" value = 'Harriet Martineau' name="q">Harriet Martineau
								</label>
								</div>
								<div class = "col-md-2 col-md-offset-0">
								<label class="radio-inline">
								<input type="radio" value = 'Mary Sturge' name="q">Mary Sturge
								</label>
								</div>
								<div class = "col-md-1 col-md-offset-0">
								<label class="radio-inline">
								<input type="radio" value = 'James Watt' name="q">James Watt
								</label>
								</div>
								<div class = "col-md-2 col-md-offset-0">
								<button  class = 'btn btn-info'><span class="glyphicon glyphicon-search"></span></button>
								<div>
							</form>
						</div>
        		 </div>
        </div>
	
@foreach($articles as $article)

<a href = 'articles/{{$article->id}}'>
<div class = "col-md-4 col-md-offset-0" id ='Posts' >
<div class = 'row'>
	     
			
			@if(count($article->photo) > 0 )
			<img class = 'img-thumbnail' src = '{{$article->photo[0]->path}}' >
			@else
			<img class = 'img-thumbnail' src = 'default.jpg' >
			@endif


		  	<div id = 'banner' class = 'img-thumnail' style = 'margin-top:0px;background-color:#F0F5F5;min-width: 300px; padding:15px'>
				<div class = 'row'>
					<h3 style = 'font-family:Arial, Helvetica, sans-serif'>{{$article->title}}</h3>
					<div>{{$article->location}}</div>
					<span class="glyphicon glyphicon-eye-open"></span> {{$article->views}} 
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

</div>
<div class = 'text-center'>{{$articles->links()}}</div>
@else
<div class = 'container'>
	<div class = 'row'>
		<div class = "col-md-12 col-md-offset-0" >
			<div class = 'jumbotron'><h1>No ads have been placed yet :/</h1> </div>
		</div>
	</div>
</div>		
@endif
@endsection
