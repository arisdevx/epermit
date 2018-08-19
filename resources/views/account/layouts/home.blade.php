@extends('account.layouts.app')

@section('container')
	@parent
	<header>
			<div class="container" style="position: relative;">
				<nav class="navbar navbar-default navbar-home" style="margin-bottom: 0px !important;">
					{{-- <div class="container"> --}}

						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							@if(empty($logo->setting_value))
								{{-- <a class="navbar-brand" href="{{ url('/') }}">JPSM</a> --}}
							@else
								{{-- <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url($logo->setting_value) }}"></a> --}}
							@endif

						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li>
									{{ Form::open(['url' => url('account/register'), 'method' => 'GET', 'style' => 'margin-top: 7px;' ]) }}
										<button type="submit" class="btn btn-danger" style="background-color: #e40001; padding-left: 25px; padding-right: 25px;"><span class="glyphicon glyphicon-user"></span> Daftar / Register</button>
									{{ Form::close() }}
								</li>
								<li>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="margin-top: 7px; margin-left: 10px; margin-right: 10px; background-color: #e40001;"><span class="glyphicon glyphicon-lock"></span> Log Masuk / Log In</button>
									{{-- {{ Form::open(['url' => url('login'), 'method' => 'GET', 'style' => 'margin-top: 7px; margin-left: 10px; margin-right: 10px;' ]) }}
										<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-lock"></span> Log Masuk</button>
									{{ Form::close() }} --}}
								</li>
							</ul>
						</div>
						<div class="clearfix"></div>
					{{-- </div> --}}
				</nav>
			</header>
		</div>
	<main>
	<div class="container site-main">
		<div class="site-content">
			@yield('content')
		</div>
	</div>
	</main>
	<footer class="footer">

			<div class="container">
				<div class="copyright" style="padding-top:15px; padding-bottom: 10px;">
				<p>Hakcipta Terpelihara &copy; {{ date('Y') }} Jabatan Perhutanan Semananjung Malaysia.
			</div>
			</div>
		
	</footer>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel" style="text-align: center">Log Masuk / Log In</h4>
				</div>
				<div class="modal-body">
					<div class="form-body" style="margin: 20px 30px;">
						<div class="alert alert-danger" id="loginAlert" style="display: none"><p>Alert</p></div>
						<div class="form-group">
							<input type="text" id="loginUsername" class="form-control input-lg" placeholder="Kata Nama / Username">
						</div>
						<div class="form-group">
							<input type="password" id="loginPassword" class="form-control input-lg" placeholder="Kata Laluan / Password">
						</div>
						<a href="javascript:void(0)" id="resetPasswordLink" style="margin-bottom: 15px; display: block;">Lupa Kata Laluan<br /><i><small>Forgot Password</small></i></a>
						<div class="form-group">
							<button type="button" class="btn btn-danger btn-block btn-lg" id="loginSubmit" style="background-color: #e40001;">Log Masuk</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel" style="text-align: center">Lupa Kata Laluan / Forgot Password</h4>
				</div>
				<div class="modal-body">
					<div class="form-body" style="margin: 20px 30px;">
						<div class="alert alert-danger" id="resetPasswordAlert" style="display: none"><p>Alert</p></div>
						<div class="form-group">
							<label for="resetEmail">Masukkan Email Anda <br><i>Please enter your email</i></label>
							<input type="text" id="resetEmail" class="form-control input-lg" placeholder="Email">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-danger btn-block btn-lg" id="resetSubmit" style="background-color: #e40001;">Hantar / Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection