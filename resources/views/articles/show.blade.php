@extends('layouts.app')

@section('content')
<div class = 'container'>
  <div class = 'row'>

    


  <div class = "col-md-6 col-md-offset-0 ">
         @foreach($articles->photo as $image)
           <img src = '{{$image->path}}'  height ="250px" width = "250px">
        @endforeach

  </div>
  
@if(Auth::user())
@if(Auth::user()->id == $articles->user_id)
@if(count($articles->photo) < 4)

  <div class = "col-md-6 col-md-offset-0 ">

  <form class ='dropzone' action = '/articles/{{$articles->id}}/photos/' method = 'POST' style = 'margin-top:20px'>

  {{csrf_field()}}

  </form>


  </div>
  @endif
@endif
@endif
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
  
    @if(Auth::user())
  @if(Auth::user()->id == $articles->user_id)
  <div class = "col-md-6 col-md-offset-0" style = 
    @if($articles->color == '#000000')


          'color:white; text-align:center'
          @else

          'color:black;text-align:center'
          @endif


  >
  @else

  <div class = "col-md-12 col-md-offset-0" style = 
    @if($articles->color == '#000000')


          'color:white; text-align:center'
          @else

          'color:black;text-align:center'
          @endif


  >
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
