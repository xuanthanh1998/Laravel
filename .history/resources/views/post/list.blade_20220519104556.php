<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 8 Generate Unique Slug For Post With Example - Tutsmake.com</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
    body{
    background-color: #25274d;
    }
    .container{
    background: #ff9b00;
    padding: 4%;
    border-top-left-radius: 0.5rem;
    border-bottom-left-radius: 0.5rem;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add Post</a> <br>
      <div class="row">
            <div class="col-12">
              
              <table class="table table-bordered" id="laravel_unique_slug_table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Title</th>
                     <th>Slug</th>
                    
                  </tr>
               </thead>
               <tbody>
                  @foreach($posts as $post)
                  <tr>
                     <td>{{ $post->id }}</td>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->slug }}</td>
                     
                  </tr>
                  @endforeach
               </tbody>
              </table>
              {!! $posts->links() !!}
           </div> 
      </div>
    </div>
  </body>
</html>