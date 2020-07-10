<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ asset('newBackAssets/img/favicon.html')}}">

    <title>
        @yield('addressTitle')
    </title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="{{ asset('newBackAssets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--icon font-->
    <link href="{{ asset('newBackAssets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('newBackAssets/vendor/dashlab-icon/dashlab-icon.css')}}" rel="stylesheet">
    <link href="{{ asset('newBackAssets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('newBackAssets/vendor/themify-icons/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('newBackAssets/vendor/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="{{ asset('newBackAssets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="{{ asset('newBackAssets/vendor/jquery-dropdown-master/jquery.dropdown.css')}}" rel="stylesheet">

    <!--jquery ui-->
    <link href="{{ asset('newBackAssets/vendor/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

    <!--iCheck-->
    <link href="{{ asset('newBackAssets/vendor/icheck/skins/all.css')}}" rel="stylesheet">

    <!--custom styles-->
    <link href="{{ asset('newBackAssets/css/main.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-bg">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 d-lg-flex align-items-center">
                <!--login form-->
                @if (Route::has('register'))
                    <div class="login-form">
                @elseif(Route::has('login'))
                    <div class="login-form">
                @endif
                    {{-- <h4 class="text-uppercase text-black text-center mb-5">
                        @if (Route::has('register'))
                            Daftar
                        @elseif(Route::has('login'))
                            Masuk
                        @endif
                    </h4> --}}
                        @yield('loginForm')
                </div>
                <!--/login form-->

                <!--login promo-->
                @if (Route::has('register'))
                    <div class="login-promo registration-promo basic-gradient  text-white position-relative">
                @elseif(Route::has('login'))
                    <div class="login-promo basic-gradient  text-white position-relative">
                @endif
                    <div class="login-promo-content text-center">
                        <a href="#" class="mb-4 d-block">
                            <img class="pr-3" style="width: 25%;" src="{{ asset('newBackAssets/img/sumertakajaLogo.png')}}" srcset="{{ asset('newBackAssets/img/sumertakajaLogo@2x.png 2x')}}" alt="">
                        </a>
                        <h1 class="text-white">Selamat Datang</h1>
                        <p>Sistem Informasi Administrasi Kependudukan Desa Adat Sumerta</p>
                    </div>
                </div>
                <!--/login promo-->

            </div>
        </div>
    </div>

    <!--basic scripts-->
    <script src="{{ asset('newBackAssets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/jquery-dropdown-master/jquery.dropdown.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/icheck/skins/icheck.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('newBackAssets/vendor/modernizr.js')}}"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="{{ asset('newBackAssets/js/scripts.js')}}"></script>
</body>
</html>

