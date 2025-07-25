<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('storage/images/logo-uni.png') }}" type="image/x-icon">
    <title>UniverGame</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/headerCategories.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mostPlayed.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framegame.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/managerUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/userReport.css') }}">
    <!-- Search -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Additional CSS Files -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        /* .main-banner {
            background-image: url({{ asset('storage/images/banner-bg.jpg') }})
        } */
        .main-banner .caption h2:after {
            background-image: url({{ asset('storage/images/caption-dec.png') }});
        }

        .cta::after {
            background-image: url({{ asset('storage/images/cta-bg.jpg') }});
        }

        /*
        footer {
            background-image: url({{ asset('storage/images/footer-bg.jpg') }});
        } */

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
    {{-- @include('layouts.admin.navbar') --}}
    <!-- ***** Header Area End ***** -->

    <!-- ***** Session Status Start ***** -->
    @include('layouts.status')
    <!-- ***** Session Status End ***** -->

    @yield('content')

    <!-- ***** Footer Area Start ***** -->
    {{-- @include('layouts.footer') --}}
    <!-- ***** Footer Area End ***** -->

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/filterCategory.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ asset('js/userInteractGame.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Kiểm tra nếu URL chứa 'login' hoặc 'signup' thì ẩn footer
        if (window.location.pathname.includes('login') || window.location.pathname.includes('signup') || window.location
            .pathname.includes('uploadGame') ||
            window.location.pathname.includes('managermentUser') || window.location.pathname.includes('report')) {
            document.querySelector('.footer-Hidden').style.display = 'none';
            document.querySelector('.Nav-header').style.display = 'none';
        } else {
            // Ngược lại, hiển thị footer
            document.querySelector('.footer-Hidden').style.display = 'block';
            document.querySelector('.Nav-header').style.display = 'flex';
        }
    </script>
    <script>
        if (window.location.hash === '#_=_') {
            history.replaceState ?
                history.replaceState(null, null, window.location.href.split('#')[0]) :
                window.location.hash = '';
        }
    </script>
    <script>
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>

</body>

</html>
