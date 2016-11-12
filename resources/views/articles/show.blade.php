@extends('layouts.app')

@section('content')
<div class = "col-md-10 col-md-offset-1" style = 
  @if($articles->color == '#000000')


        'color:white; text-align:center'
        @else

        'color:black;text-align:center'
        @endif


>
  <div class = 'row'>
    <div id = 'AD' class="jumbotron" style = 'height:100%; width:100%; background-color:{{$articles->color}};'>
    	     <h1>'{{$articles->title}}'</h1>
   
     		<div style = 'font-size:2em; font-family: Arial; '>{{$articles->body}}</div>
     		<hr>
         <div style = 'font-size:2em; font-family: Arial; '>Year: {{$articles->year}}</div>
     		<div style = 'font-size:2em; font-family: Arial; '>Location: {{$articles->location}}</div>
         <div style = 'font-size:2em; font-family: Arial; '>Gender: {{$articles->gender}}</div>
     		 @if($articles->contact)
		     <div style = 'font-size:2em; font-family: Arial; '>Contact info:{{$articles->contact}}</div>
		     @else
		     <div style = 'font-size:2em; font-family: Arial; '>Contact info: Non given</div>
		     @endif
		     <div style = 'font-size:2em; font-family: Arial; '>Created: {{$articles->created_at->diffForHumans()}}</div>
      </div>
    </div>  
  </div>

@endsection
