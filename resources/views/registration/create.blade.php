@extends ('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
	<h1>Register</h1>

	<hr>

	{!! Form::open(['method' => 'post', 'action' => 'RegistrationController@store']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
		</div>	

		<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
		</div>	

		<div class="form-group">
				{!! Form::label('password_confirmation', 'Password Confirmation:') !!}
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
		</div>	

		<div class="form-group">
			{!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
		</div>

		<div class="form-group">
			@include ('layouts.errors')
		</div>
	{!! Form::close() !!}
</div>
@endsection