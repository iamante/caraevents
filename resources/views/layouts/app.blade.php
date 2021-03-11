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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    <script src="{{ asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
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

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var todayDate = yyyy + '-' + mm + '-' + dd;
        var expireDate = new Date(todayDate);
        expireDate.setFullYear(expireDate.getFullYear() + 1);
        expireDate.setDate(expireDate.getDate() -1);
        var expiredDate = 
                    expireDate.toLocaleString("en", { year: "numeric" }) + '-' +
                    expireDate.toLocaleString("en", { month: "numeric"  }) + '-' +
                    expireDate.toLocaleString("en", { day: "numeric"});

        const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
                    
        $('.datepicker').datetimepicker({
                timepicker:false,
                inline:true,
                format:'Y-m-d',
                minDate: todayDate,
                maxDate: expiredDate,
                onShow:function(current_time,input){
                input.datetimepicker( {mask: '2050-12-32'})
                },
                onSelectDate:function(current_time,input){
                    let d = new Date(input.val());
                    let date = monthNames[d.getMonth()] + ' ' + d.getDate() + ', ' + d.getFullYear();
                    $('#date-val').html(date);
                    $('.datepicker').val(input.val());
                },
                todayButton:false,
        });

        $('.timepicker').datetimepicker({
            ampm: true,
            datepicker:false,
            formatTime:'g:i A',
            format:'g:i A',
            minTime: '7:00',
            maxTime: '23:00',
            onShow:function(current_time,input){
                input.datetimepicker( {mask: '10:00'})
            },
            validateOnBlur: false,
        });

        $('#calendar').click(function(){
            $('.timepicker').click()
        })

        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</body>
</html>
