@extends('account.layouts.panel')

@section('content')
	<div class="container">
		<div class="login-panel">
			<div class="logo"><img src="{{ asset('img/logo-bg-white.png') }}"></div>

			@if(session()->has('status'))
				@if(session()->get('status') == 'empty')
					<div class="alert alert-danger text-center">Email tidak ditemukan</div>
				@elseif(session()->get('status') == 'failed')
					<div class="alert alert-danger text-center">Gagal</div>
				@elseif(session()->get('status') == 'success')
					<div class="alert alert-success text-center">Password anda telah dihantar, sila check email anda.</div>
				@endif
			@endif

			<div class="panel panel-default panel-jpsm">
				<div class="panel-heading"><h4>Lupa Kata Laluan?</h4></div>
				<div class="panel-body">
					{{ Form::open(['url' => url('account/forgot-password/action')]) }}
						<div class="form-group{{ ($errors->has('email') ? ' has-error' : '') }}">
							<label for="emailUser">Email</label>
							<input type="text" id="emailUser" name="email" class="form-control" value="{{ request()->old('email') }}" placeholder="Masukan Email Anda">
							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default btn-lg btn-block">Hantar</button>
						</div>
						<div class="form-group text-center">
							<a href="{{ url('login') }}">Masuk</a>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection