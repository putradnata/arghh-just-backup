<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Desa Sumerta Kaja</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('frontAssets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('frontAssets/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontAssets/lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('frontAssets/css/styleForm.css')}}" rel="stylesheet">

    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('backAssets/assets/select2/dist/css/select2.min.css') }}">

</head>

<body>

    <!--========================== Header ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="/"><img src="{{ asset('frontAssets/img/sumertakajalogo.png')}}" style="margin-top:-20px;" alt="" title="" width="390px" height="65px"/></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="#hero">Regna</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#hero">Home</a></li>
                    <li><a href="#visimisi">Visi dan Misi</a></li>
                    <li><a href="#statistik">Statistik</a></li>
                    <li class="menu-has-children"><a href="">Surat</a>
                        <ul>
                            <li><a href="/pengajuan-surat">Pengajuan Surat</a></li>
                            <li><a href="#">Monitoring Surat</a></li>
                        </ul>
                    </li>
                    <li><a href="#lokasi">Lokasi</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <main id="main">

        <!--========================== Visi Misi Section ============================-->
        <section id="visimisi">
            <div class="container mt-5">
                <div class="row about-container">
                    <div class="col-lg-12 content">
                        <h2 class="title text-center">@yield('contentTitle')</h2>
                        <p class="text-center" style="text-weight:10px;">

                        </p>
                    </div>
                    <div class="col-lg-6 mx-auto">
                        @yield('formHere')
                    </div>
                </div>

            </div>
        </section>
        <!-- #visimisi -->

    </main>

    <!--========================== Footer ============================-->
    <footer id="footer" style="position:absolute; bottom:0; width:100%; overflow:hidden;">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Sumerta Kaja 2019
            </div>
            <div class="credits">

            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontAssets/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/superfish/hoverIntent.js')}}"></script>
    <script src="{{ asset('frontAssets/lib/superfish/superfish.min.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ asset('frontAssets/js/main.js')}}"></script>

    <!-- Select 2 -->
    <script src="{{ asset('backAssets/assets/select2/dist/js/select2.full.min.js') }}"></script>

    @yield('scriptPlace')

</body>

</html>
