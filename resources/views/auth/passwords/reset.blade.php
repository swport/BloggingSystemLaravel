@extends('main')

@section('title', 'Reset Password')

@section ('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					
					{!! Form::open(['url'=>'password/reset', 'method'=>'POST']) !!}

					{{ Form::hidden('token', $token) }}

					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', $email, ['class'=>'form-control']) }}

					{{ Form::label('password', 'New Password:') }}
					{{ Form::password('password', ['class'=>'form-control']) }}

					{{ Form::label('password_confirmation', 'Confirm Password:') }}
					{{ Form::password('password_confirmation', ['class'=>'form-control']) }}

					<br>
					{{ Form::submit('Set Password', ['class'=>'btn btn-danger']) }}

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@stop