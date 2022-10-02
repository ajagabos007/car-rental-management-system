<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Page Not Found | {{env('APP_NAME')}}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('auto_rental/assets/images/favicon_io/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('auto_rental/assets/images/favicon_io/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('auto_rental/assets/images/favicon_io/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('auto_rental/assets/images/favicon_io/site.webmanifest')}}">

        <link href="{{asset('auto_rental/assets/css/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/font-awesome.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/font/flaticon.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/slick.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/ion.rangeSlider.min.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/datepicker.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/magnific-popup.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/nice-select.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/style.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/responsive.css')}}" rel="stylesheet">
        @vite(['resources/css/toastr.css', 'resources/js/toastr.js'])

        <!-- Styles -->
        @livewireStyles
</head>
<body class="page-404 parallax">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-padding page-404-text">
                    <div class="text-wrapper">
                        <h1 class="text-custom-white">ouch!</h1>
                        <h6 class="text-custom-white">sorry the page you are looking for does not exist</h6>
                        <a href="/" class="btn-first btn-submit">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('auto_rental/assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/popper.min.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/ion.rangeSlider.min.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/slick.min.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/datepicker.js')}}"></script>
    <script src="{{asset('auto_rental/assets/js/datepicker.en.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/isotope.pkgd.min.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/jquery.nice-select.js')}}"></script>

    <script src="{{asset('auto_rental/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>

    <script src="{{asset('auto_rental/assets/js/custom.js')}}"></script>

</body>

<!-- Mirrored from www.codezion.com/themes/html/toor/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jul 2022 13:41:00 GMT -->
</html>