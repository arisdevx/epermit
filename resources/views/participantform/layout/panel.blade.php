@extends('participantform.layouts.app')

@section('container')
	@parent
	<header>
			<nav class="navbar navbar-default">
				<div class="container">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ url('/') }}">JPSM</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="{{ url('/') }}">Home</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{ url('account/register') }}">Daftar</a></li>
							<li><a href="{{ url('account/login') }}">Log Masuk</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	<main>
		<div class="site-content">
			<div class="container">
				@yield('content')
			</div>
		</div>
	</main>
	<footer class="footer">

			<div class="copyright">
				<p>Hakcipta Terpelihara &copy; {{ date('Y') }} Jabatan Perhutanan Semananjung Malaysia.
			</div>
		
	</footer>
@endsection