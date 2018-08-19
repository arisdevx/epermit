@extends('account.layouts.app')

@section('container')
	@parent
	<header>
			<div class="container">
				<nav class="navbar navbar-default navbar-home">
					{{-- <div class="container"> --}}

						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							@if(empty($logo->setting_value))
								<a class="navbar-brand" href="{{ url('/') }}">JPSM</a>
							@else
								<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url($logo->setting_value) }}"></a>
							@endif

						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="{{ url('/') }}">Home</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									{{ Form::open(['url' => url('account/register'), 'method' => 'GET', 'style' => 'margin-top: 7px;' ]) }}
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Daftar</button>
									{{ Form::close() }}
								</li>
								<li>
									{{ Form::open(['url' => url('login'), 'method' => 'GET', 'style' => 'margin-top: 7px; margin-left: 10px; margin-right: 10px;' ]) }}
										<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-lock"></span> Log Masuk</button>
									{{ Form::close() }}
								</li>
							</ul>
						</div>
						<div class="clearfix"></div>
					{{-- </div> --}}
				</nav>
			</header>
		</div>
	<main>
	<div class="container">
		<div class="site-content">
			@yield('content')
		</div>
	</div>
	</main>
	<footer class="footer">

			<div class="container">
				<div class="copyright">
				<p>Hakcipta Terpelihara &copy; {{ date('Y') }} Jabatan Perhutanan Semananjung Malaysia.
			</div>
			</div>
		
	</footer>
@endsection