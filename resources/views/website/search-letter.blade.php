<?php
    // use \App\Http\Controllers\PendudukLetterActivity;
    use \Carbon\Carbon;
?>
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

    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <link href="{{ asset('inWebsiteTracker/p.w3layouts.com/demos/shipment_track/web/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <script src='{{ asset('inWebsiteTracker/ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}'></script>
    <script src="{{ asset('inWebsiteTracker/m.servedby-buysellads.com/monetization.js')}}" type="text/javascript"></script>

    <style>
        .contentZ{
            height:250px !important;
        }
        .contentx{
            width:100% !important;
        }

        .padding-bottom-80px{
            padding-bottom: 80px;
        }

        .content2-header1{
            width:33% !important;
        }

        .content2-header1 p > span{
            font-size:18px;
        }
    </style>

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
                    <li><a href="#">Lacak Surat</a></li>
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

        <!--========================== Lacak Surat ============================-->
        <section id="visimisi" style="padding:80px 0px 0px 0px !important;">
            <div class="container">
                <div class="row about-container">

                    <div class="col-lg-12 contentZ order-lg-1 order-2">
                        <h2 class="title text-center">LACAK SURAT</h2>
                        <p class="text-center">
                            Silahkan Masukkan Nomer Surat Anda pada Field Dibawah ini.
                        </p>
                        @if(Session::has('error'))
                            <div class="alert alert-danger errorAlert">
                                <p>{{ Session::get('error') }}</p>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('findletter') }}">
                            @csrf
                            <div class="form-group form-inline">
                                <div class="col-2">&nbsp;</div>
                                <label class="col-2">Nomer Surat</label>

                                <input type="text" class="form-control col-5" name="nomerSurat">
                            </div>

                            <div class="form-group form-inline">
                                <div class="col-2">&nbsp;</div>
                                <label class="col-2">&nbsp;</label>

                                <div style="position: relative; left:35%;">
                                    <input type="submit" class="btn btn-success" value="LACAK">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="lacak-surat">
            <div class="container padding-bottom-80px">
                <div class="row about-container">
                    @if (!$letterTracking)

                    @else
                        <div class="contentx">
                            <div class="content1">
                                <h2>Nomor Surat: {!! $letterTracking->first()->noSurat !!}</h2>
                            </div>
                            <div class="content2">
                                <div class="content2-header1">
                                    <p><span></span></p>
                                </div>
                                <div class="content2-header1">
                                    <p>Status :
                                        @if($letterTracking->first()->status == "-1")
                                            <span>Surat Berhasil Diajukan</span></p>
                                        @elseif($letterTracking->first()->status == "D")
                                            <span>Surat Telah Dikonfirmasi Operator</span></p>
                                        @elseif($letterTracking->first()->status == "KBD")
                                            <span>Surat Diproses Oleh Kelian Banjar Dinas</span></p>
                                        @elseif($letterTracking->first()->status == "KD")
                                            <span>Surat Diproses Oleh Kepala Desa</span></p>
                                        @elseif($letterTracking->first()->status == "S")
                                            <span>Surat Telah Selesai</span></p>
                                        @endif
                                </div>
                                <div class="content2-header1">
                                    <p><span></span></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="content3">
                                @if ($letterTracking->first()->status == "-1")
                                    <div class="shipment">
                                        <div class="confirm">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line" style="background-color:#F5998E !important;"></span>
                                            <p>Surat Berhasil Diajukan</p>
                                        </div>
                                        <div class="dispatch">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Telah <br>Dikonfirmasi Operator</p>
                                        </div>
                                        <div class="dispatch">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kelian Banjar Dinas</p>
                                        </div>
                                        <div class="dispatch">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kepala Desa</p>
                                        </div>
                                        <div class="delivery">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <p>Surat Telah Selesai</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    @elseif($letterTracking->first()->status == "D")
                                    <div class="shipment">
                                        <div class="confirm">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Berhasil Diajukan</p>
                                        </div>
                                        <div class="quality">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Telah <br>Dikonfirmasi Operator</p>
                                        </div>
                                        <div class="dispatch">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kelian Banjar Dinas</p>
                                        </div>
                                        <div class="dispatch">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kepala Desa</p>
                                        </div>
                                        <div class="delivery">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <p>Surat Telah Selesai</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    @elseif($letterTracking->first()->status == "KBD")
                                    <div class="shipment">
                                        <div class="confirm">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Berhasil Diajukan</p>
                                        </div>
                                        <div class="process">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Telah <br>Dikonfirmasi Operator</p>
                                        </div>
                                        <div class="quality">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kelian Banjar Dinas</p>
                                        </div>
                                        <div class="dispatch">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kepala Desa</p>
                                        </div>
                                        <div class="delivery">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <p>Surat Telah Selesai</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    @elseif($letterTracking->first()->status == "KD")
                                    <div class="shipment">
                                        <div class="confirm">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Berhasil Diajukan</p>
                                        </div>
                                        <div class="process">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Telah <br>Dikonfirmasi Operator</p>
                                        </div>
                                        <div class="process">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kelian Banjar Dinas</p>
                                        </div>
                                        <div class="quality">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kepala Desa</p>
                                        </div>
                                        <div class="delivery">
                                            <div class="imgcircle">
                                                <span class="fa fa-clock" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <p>Surat Telah Selesai</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    @elseif($letterTracking->first()->status == "S")
                                    <div class="shipment">
                                        <div class="confirm">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Berhasil Diajukan</p>
                                        </div>
                                        <div class="process">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Telah <br>Dikonfirmasi Operator</p>
                                        </div>
                                        <div class="process">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kelian Banjar Dinas</p>
                                        </div>
                                        <div class="process">
                                            <div class="imgcircle">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <span class="line"></span>
                                            <p>Surat Diproses Oleh <br> Kepala Desa</p>
                                        </div>
                                        <div class="delivery">
                                            <div class="imgcircle" style="background-color:#98D091 !important;">
                                                <span class="fa fa-check" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                            </div>
                                            <p>Surat Telah Selesai</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                @endif
                                {{-- <div class="shipment">
                                    <div class="confirm">
                                        <div class="imgcircle">
                                            <span class="fa fa-envelope" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                        </div>
                                        <span class="line"></span>
                                        <p>Surat Berhasil Diajukan</p>
                                    </div>
                                    <div class="process">
                                        <div class="imgcircle">
                                            <span class="fa fa-envelope" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                        </div>
                                        <span class="line"></span>
                                        <p>Surat Telah <br>Dikonfirmasi Operator</p>
                                    </div>
                                    <div class="quality">
                                        <div class="imgcircle">
                                            <span class="fa fa-envelope" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                        </div>
                                        <span class="line"></span>
                                        <p>Surat Diproses Oleh <br> Kelian Banjar Dinas</p>
                                    </div>
                                    <div class="dispatch">
                                        <div class="imgcircle">
                                            <span class="fa fa-envelope" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                        </div>
                                        <span class="line"></span>
                                        <p>Surat Diproses Oleh <br> Kepala Desa</p>
                                    </div>
                                    <div class="delivery">
                                        <div class="imgcircle">
                                            <span class="fa fa-envelope" style="color: #FFFFFF; position:relative; top:22px; width:30px; height:auto;"></span>
                                        </div>
                                        <p>Surat Telah Selesai</p>
                                    </div>
                                    <div class="clear"></div>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

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
