@extends('main')

@section('title','Homepage')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="jumbotron">
      <h1>Hello, world!</h1>
      <p class="lead">Thank you very much for visiting my website. This is my first blog project with Laravel.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a></p>
    </div>
  </div>
</div> <!--End of the row-->
<div class="row">
  <div class="col-md-8">

@foreach($posts as $post)

    <div class="post">
      <h3>{{ $post->title }}</h3>
      <p>{{ substr($post->body, 0, 180) }}{{ strlen($post->body) > 180 ? "..." : "" }}</p>
      <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
    </div>
    <hr>
@endforeach
  </div>

  <div class="col-md-3 col-md-offset-1">
    <h2>Sidebar</h2>
  </div>
</div>
@stop
