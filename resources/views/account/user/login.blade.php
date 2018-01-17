@extends('account.layouts.panel')

@section('content')
	<div class="container">
		<div class="login-panel">
			<div class="logo"><img src="{{ asset('img/logo-bg-white.png') }}"></div>
			@if(session()->has('active-status'))
				@if(session()->get('active-status') == 'success')
					<div class="alert alert-success text-center">Your account has been active</div>
				@else
					<div class="alert alert-danger text-center">Failed activate account</div>
				@endif
			@endif

			@if(session()->has('status'))
				@if(session()->get('status') == 'wrong-password')
					<div class="alert alert-danger text-center">Please check your password</div>
				@elseif(session()->get('status') == 'account-inactive')
					<div class="alert alert-danger text-center">Your account is not active</div>
				@elseif(session()->get('status') == 'no-account')
					<div class="alert alert-danger text-center">Please check your ID</div>
				@elseif(session()->get('status') == 'auth-false')
					<div class="alert alert-danger text-center">Cannot create session</div>
				@elseif(session()->get('status') == 'logout')
					<div class="alert alert-success text-center">Logout Successful</div>
				@endif
			@endif
			<div class="panel panel-default panel-jpsm">
				<div class="panel-heading"><h4>Log Masuk Pengguna</h4></div>
				<div class="panel-body">
					{{ Form::open(['url' => url('account/login/action')]) }}
						<div class="form-group{{ ($errors->has('username') ? ' has-error' : '') }}">
							<label for="idUser">ID Pengguna</label>
							<input type="text" id="idUser" name="username" class="form-control" placeholder="Masukan ID Pengguna">
							@if($errors->has('username'))
								<span class="help-block">{{ $errors->first('username') }}</span>
							@endif
						</div>
						<div class="form-group{{ ($errors->has('password') ? ' has-error' : '') }}">
							<label for="passwordUser">Kata Laluan</label>
							<input type="password" id="passwordUser" name="password" class="form-control" placeholder="Masukan Kata Laluan">
							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default btn-lg btn-block">Hantar</button>
						</div>
						<div class="form-group text-center">
							<a href="{{ url('account/forgot-password') }}">Lupa kata laluan?</a>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection