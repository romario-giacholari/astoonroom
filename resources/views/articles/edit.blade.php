@extends('layouts.app')
@section('content')
<div class = 'container'>
<div class = "row"  >
  <div class = "col-md-6 col-md-offset-0">

    <form action="update" method="POST">
    <h1 style ='font-family:Arial, Helvetica, sans-serif;'>Update your ad</h1>
         {{ method_field('PATCH') }}
    @include('articles.form',['submitButton'=>'Update'])

    </form>
  </div>
</div>
</div>
@endsection