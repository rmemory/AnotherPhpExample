@extends ('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
	<h1>Sign in</h1>

	<hr>

	{!! Form::open(['method' => 'post', 'action' => 'SessionsController@store']) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
		</div>	

		<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
		</div>	

		<div class="form-group">
			{!! Form::submit('Sign in', ['class' => 'btn btn-primary']) !!}
		</div>

		<div class="form-group">
			@include ('layouts.errors')
		</div>
	{!! Form::close() !!}
	</div>
@endsection