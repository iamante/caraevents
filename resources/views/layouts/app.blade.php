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
    <link rel="icon" href="{{ asset('storage/users/logo1.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/jquery.datetimepicker.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css')}}"/>

    
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".slick-testimonial").slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
                },
            ]
        });

        
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
        })
        
    </script>
</body>
</html>
