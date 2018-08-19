<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Scafold Larave 5.4') }}</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}">

        <!-- Styles-->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/style.css?v=15') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/account/jquery.datetimepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
        @yield('styles')

        <!-- Scripts -->
        <script type="text/javascript">
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('/js/script.js?v=2') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/printThis.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/maxlength.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".dropdown-toggle").dropdown();
                $('body').on('change keyup keydown', 'input[type="number"]', function(){
                    var num = $(this).val().match(/^\d+$/);
                    if (num === null) {
                        // If we have no match, value will be empty.
                        $(this).val('');
                    }
                });
            });
            // Select your input element.
            var numInput = document.querySelector('input');

            // Listen for input event on numInput.
            if(numInput)
            {
                numInput.addEventListener('input', function(){
                    // Let's match only digits.
                    var num = this.value.match(/^\d+$/);
                    if (num === null) {
                        // If we have no match, value will be empty.
                        this.value = "";
                    }
                }, false);
            }
        </script>
    </head>

    <body id="app">
        @yield('container')
        @yield('modal')
        <script type="text/javascript" src="{{ asset('js/account/jquery.datetimepicker.full.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('js/jquery.number.min.js') }}"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/account/script.js') }}"></script>
        @yield('scripts')
    </body>
</html>
