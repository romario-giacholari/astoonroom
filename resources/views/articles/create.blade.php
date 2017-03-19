@extends('layouts.app')

@section('content')

<div class = 'container'>
  <form method = 'POST' action = 'article/store'>
  <h1 style ='font-family:Arial, Helvetica, sans-serif;'>Property description.</h1>

  @include ('articles.form', ['submitButton'=>'Post'])
        
   </form>
</div>

@endsection