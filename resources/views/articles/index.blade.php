@extends('layouts.app')
@section('content')
<div class = 'container'>
<div class = 'row'>
<div class = "col-md-12 col-md-offset-0" >
@if(Session::has('flash_message'))
<div  id='alert-msg' class = 'alert alert-danger col-md-12 col-md-offset-0' style =' padding:10px:margin-bottom:10px;'>{{Session::get('flash_message')}}
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
        	<div class = "col-md-12 col-md-offset-0 ">
				<div class = 'row'>
						<div class="form-group ">
						
				           <form method = 'GET' action = 'articles/search'>
							
							  <div class = "col-md-2 col-md-offset-0">
								<div class="form-group" >
								  <label for="sel1">Sort by location</label>
								  <select required class="form-control" id="q" name = 'q'>
								    <option>Lakeside</option>
								    <option>William Murdoch</option>
								    <option>Harriet Martineau</option>
								    <option>Mary Sturge</option>
								    <option>James Watt</option>
								  </select>
								 </div>
							  </div>

								 <div class = "col-md-12 col-md-offset-0">
								  	<input type = 'submit'  class = 'btn btn-info'>
								  </div>
								
								
							</form>
						</div>
        		 </div>
        </div>
        

@foreach($articles as $article)
<a href = '{{$article->title}}'>
<div class = "col-md-12 col-md-offset-0 jumbotron" id ="Posts"  style = 'margin-top:10px' >
	
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

</div>
<div class = 'text-center'>{{$articles->links()}}</div>
@endsection
