@extends('layouts.app')

@section('content')
<div class = 'container'>
  <div class = 'row'>

      <div class = "col-md-12 col-md-offset-0" >

      <div id = 'press' class = 'jumbotron' style = 'padding:40px'>
          <h1 class = 'cobotron'> {{$articles->title}}  </h1>
          <div style = 'font-size:1em; font-family: Arial; '>{{$articles->body}}</div>
          <hr>
           <div style = 'font-size:1em; font-family: Arial; '>Year: {{$articles->year}}</div>
          <div style = 'font-size:1em; font-family: Arial; '>Location: {{$articles->location}}</div>
           <div style = 'font-size:1em; font-family: Arial; '>Gender: {{$articles->gender}}</div>
           @if(Auth::check())
           <div style = 'font-size:1em; font-family: Arial; '>Contact info:{{$articles->contact}}</div>
           @endif
           @if($articles->postcode)
           <div id = 'postcode' style = 'font-size:1em; font-family: Arial; '>Postcode:{{$articles->postcode}}</div>
           @endif
           <div style = 'font-size:1em; font-family: Arial; '>Created: {{$articles->created_at->diffForHumans()}}</div>
   </div>
</div>
 @foreach($articles->photo as $image)
 @if($image)
<div class="col-xs-12 col-md-6 " style = 'padding:15px'>
      <img class = 'img-responsive ' src = '{{$image->path}}'>
</div>
@endif
 @endforeach
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZUHOHlyg7U3qHZuor6SULmnrxEE0Vbo4"></script>
      <script type="text/javascript">

          function getPosition(callback) {
            var geocoder = new google.maps.Geocoder();
            var postcode = $('#postcode').text();

            geocoder.geocode({'address': postcode}, function(results, status) 
            {   
              if (status == google.maps.GeocoderStatus.OK) 
              {
                callback({
                  latt: results[0].geometry.location.lat(),
                  long: results[0].geometry.location.lng()
                });
              }
            });
          }

          function setup_map(latitude, longitude) { 
            var _position = { lat: latitude, lng: longitude};
            
            var mapOptions = {
              zoom: 15,
              center: _position,
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var marker = new google.maps.Marker({
              position: mapOptions.center,
              map: map
            });
          }

          window.onload = function() {
            setup_map(52.484279, -1.890067);

              getPosition(function(position){

                var text = document.getElementById("text")
                text.innerHTML = "Marker position: { Longitude: "+position.long+ ",  Latitude:"+position.latt+" }";

                setup_map(position.latt, position.long);
              });
            }
      </script>  
@if($articles->postcode)
<div class="col-xs-12 col-md-6" style = 'padding:15px'>
      <div id="map" style = 'height:400px; width:100%;display:block;'></div>
      <div style = 'display:none' id="text"></div>
</div>
@endif
  </div>
@endsection
