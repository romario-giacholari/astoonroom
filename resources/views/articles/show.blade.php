@extends('layouts.app')

@section('content')
<div class = 'container'>
  <div class = 'row'>

    


  
  

  
 

      <div class = "col-md-12 col-md-offset-0" >
     

      <div class = 'jumbotron' style = 'padding:40px'>
          <h1 class = 'cobotron'> {{$articles->title}}  </h1>
          <div style = 'font-size:1em; font-family: Arial; '>{{$articles->body}}</div>
          <hr>
           <div style = 'font-size:1em; font-family: Arial; '>Year: {{$articles->year}}</div>
          <div style = 'font-size:1em; font-family: Arial; '>Location: {{$articles->location}}</div>
           <div style = 'font-size:1em; font-family: Arial; '>Gender: {{$articles->gender}}</div>
           @if(Auth::check())
           <div style = 'font-size:1em; font-family: Arial; '>Contact info:{{$articles->contact}}</div>
           @endif
           <div style = 'font-size:1em; font-family: Arial; '>Created: {{$articles->created_at->diffForHumans()}}</div>
   </div>
</div>

<div class="col-xs-12 col-md-12">
         @foreach($articles->photo as $image)
           <img class = 'img-responsive ' src = '{{$image->path}}'>
        @endforeach

  </div>
  
  </div>
@endsection
