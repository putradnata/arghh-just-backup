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
    <link href="{{ asset('frontAssets/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!--========================== Header ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                @if ($content == null)
                    LOGO Desa
                @else
                    <a href="#hero"><img src="{{ url('/images/'.$content->logoDesa)}}" style="margin-top:-20px;" alt="" title="" width="390px" height="65px"/></a>
                @endif
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="#hero">Regna</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#hero">Home</a></li>
                    <li><a href="#visimisi">Visi dan Misi</a></li>
                    <li><a href="#statistik">Statistik</a></li>
                    <li><a href="#lokasi">Lokasi</a></li>
                    @if (!Auth::user())
                        <li><a href="{{ route('register') }}">Daftar</a></li>
                    @elseif(Auth::user()->jabatan == 'o')
                        <li><a href="{{ route('operator.index') }}">Dashboard</a></li>
                    @elseif(Auth::user()->jabatan == 'p')
                        <li><a href="{{ route('penduduk.index') }}">Dashboard</a></li>
                    @else
                        <li><a href="#">Daftar</a></li>
                    @endif
                    <li><a href="/lacak-surat">Lacak Surat</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <!--========================== Hero Section ============================-->
    @if ($content == null)
        <section id="hero" style="background-color:darkgreen !important;">
            <div class="hero-container">
                <h1>Heading1</h1>
                <h2>Heading 2</h2>
            </div>
        </section>
        <!-- #hero -->
    @else
        <section id="hero" style="background:url('{{ url('/images/'.$content->sliderPhoto) }}') !important;">
            <div class="hero-container">
                <h1>{!! $content->sliderTextH1 !!}</h1>
                    <h2>{!! $content->sliderTextH2 !!}</h2>
            </div>
        </section>
        <!-- #hero -->
    @endif


    <main id="main">

        <!--========================== Visi Misi Section ============================-->
        <section id="visimisi">
            <div class="container">
                <div class="row about-container">

                    <div class="col-lg-12 content order-lg-1 order-2">
                        <h2 class="title text-center">VISI</h2>
                        <p class="text-center">
                            @if ($content == null)
                                <strong>Lorem ipsum dolor sit amet consectetur adipisicing elit.</strong>
                            @else
                                <strong>{!! $content->visi !!}</strong>
                            @endif

                        </p>

                        <h2 class="title text-center">MISI</h2>
                        <div class="ml-4">
                            @if ($content == null)
                                <strong>Lorem ipsum dolor sit amet consectetur adipisicing elit.</strong>
                            @else
                                {!! $content->misi !!}
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- #visimisi -->

        <!--========================== statistik Section ============================-->
        <section id="statistik">
            <div class="container wow fadeIn">
                <div class="section-header">
                    <h3 class="section-title">Statistik</h3>
                    <p class="section-description">Penduduk Desa Sumerta Kaja</p>
                </div>
                <div class="row counters mx-auto">
                    @if ($totalPenduduk == null)
                        <div class="col-lg-1 col-6 text-center">

                        </div>
                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up"></span>
                            <p>Warga</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up"></span>
                            <p>Dusun / Banjar</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up"></span>
                            <p>Total Kepala Keluarga</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up"></span>
                            <p>Penduduk Pria</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up"></span>
                            <p>Penduduk Wanita</p>
                        </div>
                        <div class="col-lg-1 col-6 text-center">

                        </div>
                    @else
                        <div class="col-lg-1 col-6 text-center">

                        </div>
                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up">{{ $totalPenduduk }}</span>
                            <p>Warga</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up">{{ $banjar }}</span>
                            <p>Dusun / Banjar</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up">{{ $kepalaKeluarga }}</span>
                            <p>Total Kepala Keluarga</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up">{{ $laki }}</span>
                            <p>Penduduk Pria</p>
                        </div>

                        <div class="col-lg-2 col-6 text-center">
                            <span data-toggle="counter-up">{{ $perempuan }}</span>
                            <p>Penduduk Wanita</p>
                        </div>
                        <div class="col-lg-1 col-6 text-center">

                        </div>
                    @endif
                </div>

            </div>
        </section>
        <!-- #statistik -->

        <!--========================= Call To Action Section ============================-->
        <section id="call-to-action">
            <div class="container wow fadeIn">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-left">
                        <h3 class="cta-title">Hubungi Kami</h3>
                        <p class="cta-text"> Untuk informasi lebih lanjut dapat menghubungi Kantor Desa Sumerta Kaja pada nomor berikut. </p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="tel:+62361224898">Hubungi</a>
                    </div>
                </div>

            </div>
        </section><!-- #call-to-action -->

        <!--========================== lOKASI ============================-->
        <section id="lokasi">
            <div class="container wow fadeInUp">
                <div class="section-header">
                    <h3 class="section-title" style="margin-top:60px;">LOKASI KANTOR DESA</h3>
                    <p class="section-description"></p>
                </div>
            </div>

            <!-- Uncomment below if you wan to use dynamic maps -->
            <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.4294043479304!2d115.22722371541214!3d-8.650646290387472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f7c3f430f0d%3A0xdbc3e8da214e257e!2sKantor%20Desa%20Sumerta%20Kaja%20Denpasar!5e0!3m2!1sid!2sid!4v1571321931748!5m2!1sid!2sid"
                width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            @if ($content == null)
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4666.461198015658!2d115.21962204521353!3d-8.66339606903838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2409736a60439%3A0xc4995e16a365272b!2sPasar%20Swalayan%20Tiara%20Dewata!5e0!3m2!1sid!2sid!4v1589690455154!5m2!1sid!2sid"
                    width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            @else
                <iframe
                    src="{!! $content->lokasiDesa !!}"
                    width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            @endif


        </section>
        <!-- #contact -->

    </main>

    <!--========================== Footer ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Sumerta Kaja {{ date('Y') }}
            </div>
            <div class="credits">
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

</body>

</html>
