@extends('main')

@section('title', 'Login')

@section('content')

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{!! Form::open() !!}
				
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ["class" => 'form-control']) }}

				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ["class" => 'form-control']) }}
			
				{{ Form::checkbox('remember') }}
				{{ Form::label('remember', 'Remember Me') }}
				<br>
				<p><a href={{ url('password/reset') }}>Forgot My Password</a></p>
				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

			{!! Form::close() !!}
		</div>
	</div>

@stop