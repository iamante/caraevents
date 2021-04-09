<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Caraevents">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Caraevents Consultancy and Co.</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset("storage/users/logo1.png") }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('build/jquery.datetimepicker.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css')}}"/>
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css')}}" type="text/css" media="screen" />
    
    
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
    @yield('extra-js')
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('js/handlebars.js') }}"></script>
    <script src="{{ asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
</body>
</html>
