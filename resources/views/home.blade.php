@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
@if(count($articles) >0)
<div class = "col-md-12 col-md-offset-0 " >
    <h1  style ='font-family:Arial, Helvetica, sans-serif;'>My ads</h1>

    <table class="table table-inverse" >
      <thead>
        <tr>
          <th>Title</th>
          <th>Views</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      @foreach($articles as $article)
      <tbody>
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->views}}</td>
               <td style = 'height:100%;'>
              <form action="articles/{{$article->id}}/edit" method="GET" >

                <button class = 'btn btn-success btn-sm pull-left'>edit</button>
              </form>
         </td>
          <td style = 'height:100%;'>
                <button class = 'btn btn-danger btn-sm pull-left ' data-toggle="modal" data-target=".bd-example-modal-lg"><span class = 'glyphicon glyphicon-trash'></span></button>
         </td>
       </tr>

      </tbody>
       @endforeach
    </table>
  </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <form action="articles/{{$article->id}}/delete" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button style = 'width:100%;height:100%' class = 'btn btn-danger btn-sm pull-left '>Delete</button>
              
      </form>
    </div>
  </div>
</div>
@endif
 


  <form method = 'POST' action = 'article/store'>
  <h1 style ='font-family:Arial, Helvetica, sans-serif;'>Property description.</h1>

  @include ('articles.form', ['submitButton'=>'Post'])
        
   </form>

</div>
</div>
</div>





@endsection
