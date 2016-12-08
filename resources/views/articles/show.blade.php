@extends('layouts.app')

@section('content')
<div class = 'container'>
  <div class = 'row'>

    


  
  

  
  @if(Auth::user())

    @if(Auth::user()->id == $articles->user_id)
      
      <div class = "col-md-12 col-md-offset-0">

    @else

      <div class = "col-md-12 col-md-offset-0" >
     
    @endif
  @endif

      <div style = 'padding:40px'>
          @if(Auth::check())
          <a href = '/articles/{{$articles->id}}/edit'>
         
          <h1 class = 'cobotron'> {{$articles->title}}  </h1>
          </a>
          @else
          <h1 class = 'cobotron'> {{$articles->title}}  </h1>
          @endif
          <div style = 'font-size:1em; font-family: Arial; '>{{$articles->body}}</div>
          <hr>
           <div style = 'font-size:1em; font-family: Arial; '>Year: {{$articles->year}}</div>
          <div style = 'font-size:1em; font-family: Arial; '>Location: {{$articles->location}}</div>
           <div style = 'font-size:1em; font-family: Arial; '>Gender: {{$articles->gender}}</div>
           @if($articles->contact)
           <div style = 'font-size:1em; font-family: Arial; '>Contact info:{{$articles->contact}}</div>
           @else
           <div style = 'font-size:1em; font-family: Arial; '>Contact info: Non given</div>
           @endif
           <div style = 'font-size:1em; font-family: Arial; '>Created: {{$articles->created_at->diffForHumans()}}</div>
   </div>
</div>

<div class = "col-md-12 col-md-offset-0 ">
         @foreach($articles->photo as $image)
           <img class = 'img-thumbnail ' src = '{{$image->path}}'>
        @endforeach

  </div>
  
  </div>
@endsection
