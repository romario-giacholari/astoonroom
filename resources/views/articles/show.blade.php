@extends('layouts.app')

@section('content')
<div class = 'container'>
  <div class = 'row'>

    


  <div class = "col-md-12 col-md-offset-0 ">
         @foreach($articles->photo as $image)
           <img class = 'img-thumbnail ' src = '{{$image->path}}'>
        @endforeach

  </div>
  

  
  @if(Auth::user())

    @if(Auth::user()->id == $articles->user_id)
      
      <div class = "col-md-12 col-md-offset-0">

    @else

      <div class = "col-md-12 col-md-offset-0" >
     
    @endif
  @endif

      <div style = 'padding: 20px'>

          <h1 class = 'cobotron'> {{$articles->title}}  </h1>
          <div style = 'font-size:2em; font-family: Arial; padding:  '>{{$articles->body}}</div>
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
