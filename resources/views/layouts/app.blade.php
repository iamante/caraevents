<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Caraevents">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/users/logo1.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/jquery.datetimepicker.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>

    
</head>
<body>
    <header>
        @include('include.topbar')
        @include('include.navbar')
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer text-white">
        @include('include.footer')
    </footer>
    
    <!-- Scripts -->
    <!-- reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LfwIhUaAAAAALnjpTfDNt_xIHE1GYymjPsQ-4pQ"></script>
    <script>
          grecaptcha.ready(function() {
            grecaptcha.execute('6LfwIhUaAAAAALnjpTfDNt_xIHE1GYymjPsQ-4pQ', {action: 'register'}).then(function(token) {
                document.getElementsByClassName('g-recaptcha').value = token;
            });
          });
    </script>
    <!-- end of reCAPTCHA v3 -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/carousel.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
        $('.datepicker').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
        });

        $('.timepicker').datetimepicker({
            OnBlur: false,
            ampm: true,
            datepicker:false,
            format:'H:i:s',
        });

    </script>
     <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</body>
</html>
