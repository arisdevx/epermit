<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name', 'Scafold Larave 5.4') }}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/account/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/account/jquery.datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
	@yield('styles')
	<link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}">
</head>
<body class="scroll">
	@yield('container')
	@yield('modal')
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/account/jquery.datetimepicker.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/maxlength.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/printThis.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/account/script.js') }}"></script>
	<script type="text/javascript">
		(function($){
			'use strict';

			$(document).ready(function(){
				$('body').on('click', '#print', function(){
					$('#printArea').printThis();
				});
			});
		})(jQuery);
	</script>

	@yield('script')
</body>
</html>