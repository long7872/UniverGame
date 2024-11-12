<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Lugx Gaming Shop HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        .main-banner {
            background-image: url({{ asset('storage/images/banner-bg.jpg') }})
        }
        .main-banner .caption h2:after {
            background-image: url({{ asset('storage/images/caption-dec.png') }});
        }
        .cta::after {
            background-image: url({{ asset('storage/images/cta-bg.jpg') }});
        }
        footer {
            background-image: url({{ asset('storage/images/footer-bg.jpg') }});
        }
        .page-heading {
            background-image: url({{ asset('storage/images/page-heading-bg.jpg') }});
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    @include('layouts.preloader')
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('layouts.header')
    <!-- ***** Header Area End ***** -->

    @yield('content')

    @include('layouts.footer')

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
