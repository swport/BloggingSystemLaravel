@extends('main')

@section('title', " $post->title ")

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->body }}<p>
      <hr>
      <p>Posted In <b>{{ $post->category->name }}</b> Category </p>
    </div>
  </div><hr/>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3>Comments:</h3>
      @foreach($post->comments as $comment)
      <div class="comment">
        <h4><b>{{ $comment->name }}</b> ({{ $comment->email }}) <small>says,</small></h4>
        <p>{{ $comment->comment }}</p> <br/>
      </div>

      @endforeach
    </div>
  </div>

  <div class="row">
  	<div id="comment-form" class="col-md-8 col-md-offset-2">
  		{{ Form::open(['route'=>['comments.store', $post->id], 'method'=>'POST']) }}

  		<div class="row">
  			<div class="col-md-6">
  				{{ Form::label('name', 'Name:') }}
  				{{ Form::text('name', null, ['class'=>'form-control']) }}
			</div>

			<div class="col-md-6">
				{{ Form::label('email', 'Email:') }}
  				{{ Form::text('email', null, ['class'=>'form-control']) }}
			</div>

			<div class="col-md-12">
				{{ Form::label('comment', 'Comment:') }}
				{{ Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'4']) }}<br>

				{{ Form::submit('Add Comment', ['class'=>'btn btn-success btn-block']) }}
			</div>
  				
  		</div>

  		{{ Form::close() }}

  	</div>

@endsection