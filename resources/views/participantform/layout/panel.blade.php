@extends('participantform.layout.app')

@section('container')
	@parent
		

	<main>
		<div class="site-content">

			<div class="container">
				@yield('content')
			</div>
		</div>
	</main>
	
@endsection