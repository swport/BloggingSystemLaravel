@extends('main')

@section('title', "Edit $tag->name")

@section('content')

	<div class="row">
		<div class="col-md-8">
		<h3>Current title: <i>{{ $tag->name }}</i>. Change it to:</h3>
			{!! Form::model($tag, ['route'=>['tags.update', $tag->id], 'method'=>"PUT"]) !!}

				{{ Form::text('name', null, ['class'=>'form-control']) }}<br/>

				{{ Form::submit('Change Tag', ['class'=>'btn btn-default form-control']) }}
			
			{!! Form::close() !!}
		</div>
	</div>

@endsection