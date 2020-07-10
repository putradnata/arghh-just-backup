<?php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/dashlab-v1.3/layout-dark-nav.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Jan 2020 03:16:44 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ asset('newBackAssets/img/favicon.html')}}">
    <title>@yield('addressTitle')</title>
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
    <!--data table-->
    <link href="{{ asset('newBackAssets/vendor/data-tables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!--iCheck-->
    <link href="{{ asset('newBackAssets/vendor/icheck/skins/all.css')}}" rel="stylesheet">
    <!-- Zebra Date Picker-->
    <link href="{{ asset('newBackAssets/vendor/zebra_datepicker/css/bootstrap/zebra_datepicker.min.css')}}" rel="stylesheet">
    <!--select2-->
    <link href="{{ asset('newBackAssets/vendor/select2/css/select2.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    @yield('customStyle')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('newBackAssets/vendor/html5shiv.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="fixed-nav">

    <!--navigation : sidebar & header-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">

        <!--brand name-->
        <a class="navbar-brand" href="#" data-jq-dropdown="#jq-dropdown-1">
            <img class="pr-3 float-left" height="50px" width="70px" src="{{ asset('images/sumertakajaLogo.png')}}" srcset="{{ asset('images/sumertakajaLogo.png 2x')}}"  alt=""/>


            <div class="float-left mt-3">
                <span>Sumerta Kaja</span>
            </div>
        </a>
        <!--/brand name-->

        <!--responsive nav toggle-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--/responsive nav toggle-->

        <!--responsive rightside toogle-->
        <a href="javascript:;" class="nav-link right_side_toggle responsive-right-side-toggle">
            <i class="icon-options-vertical"> </i>
        </a>
        <!--/responsive rightside toogle-->

        <div class="collapse navbar-collapse" id="navbarResponsive">
            @if (Auth::user()->jabatan == 'o')
                <!--left side nav-->
                <ul class="navbar-nav left-side-nav" id="accordion">

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Halaman Utama">
                        <a class="nav-link" href="/operator">
                            <i class="vl_dashboard"></i>
                            <span class="nav-link-text">Halaman Utama</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Kependudukan">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#multi_menu">
                            <i class="icon-people"></i>
                            <span class="nav-link-text">Data Kependudukan</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="multi_menu" data-parent="#accordion">
                            <li>
                                <a href="/operator/kependudukan">Seluruh Penduduk</a>
                            </li>
                            <li>
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#multi_menu_2">Status Penduduk</a>
                                <ul class="sidenav-third-level collapse" id="multi_menu_2">
                                    <li>
                                        <a href="{{ route('penduduk-pindah.index') }}">Penduduk Pindah</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('penduduk-meninggal.index') }}">Penduduk Meninggal</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Banjar">
                        <a class="nav-link" href="{{ route('banjar.index') }}">
                            <i class="icon-home"></i>
                            <span class="nav-link-text">Data Banjar</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Layouts">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#layouts">
                            <i class="icon-envelope-open"></i>
                            <span class="nav-link-text">Data Surat</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="layouts" data-parent="#accordion">
                            <li> <a href="{{ route('incomingLetter.incoming') }}">Surat Masuk</a></li>
                            <li> <a href="{{ route('data-surat.index') }}">Jenis Surat</a> </li>
                            <li> <a href="{{ route('agenda-surat') }}">Agenda Surat</a></li>
                        </ul>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Banjar">
                        <a class="nav-link" href="{{ route('manajer-website.index') }}">
                            <i class="icon-globe"></i>
                            <span class="nav-link-text">Manajemen Website</span>
                        </a>
                    </li>
                </ul>
                <!--/left side nav-->
            @elseif(Auth::user()->jabatan == 'p')
                <!--left side nav-->
                <ul class="navbar-nav left-side-nav" id="accordion">

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Halaman Utama">
                        <a class="nav-link" href="/penduduk">
                            <i class="vl_dashboard"></i>
                            <span class="nav-link-text">Halaman Utama</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profil Penduduk">
                        <a class="nav-link nav-link-collapse " data-toggle="collapse" data-target="#suratt">
                            <i class="icon-envelope-open "></i>
                            <span class="nav-link-text">Data Surat</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="suratt" data-parent="#accordion">
                            <li> <a href="{{ route('letterTracking.tracking') }}">Lacak Surat</a></li>
                        </ul>
                    </li>

                </ul>
                <!--/left side nav-->
            @endif


            <!--nav push link-->
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="left-nav-toggler">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <!--/nav push link-->

            <!--header rightside links-->
            @if (Auth::user()->jabatan == 'o')
                <?php
                    //current date
                    $today = \Carbon\Carbon::now()->format('Y-m-d');

                    $selectSurat = DB::table('pengajuan_surat')
                                    ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                                    ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                                    ->where('status','=','-1')
                                    ->where('pengajuan_surat.created_at','like','%'.$today.'%')
                                    ->orderByDesc('pengajuan_surat.created_at')
                                    ->select(
                                        'pengajuan_surat.*',
                                        'penduduk.nama as namaPenduduk',
                                        'jenis_surat.jenis as jenisSurat'
                                    )
                                    ->get();
                ?>

            <ul class="navbar-nav header-links ml-auto hide-arrow">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-3" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="vl_bell"></i>
                        <span class="d-lg-none">Notification
                            <span class="badge badge-pill badge-warning">5 New</span>
                        </span>

                        @if ($selectSurat->isNotEmpty())
                        <div class="notification-alarm">
                            <span class="wave wave-danger"></span>
                            <span class="dot bg-danger"></span>
                        </div>
                        @else

                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right header-right-dropdown-width pb-0" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header weight500">Notifikasi</h6>

                        <div class="dropdown-divider mb-0"></div>


                            @if ($selectSurat->isNotEmpty())
                                @foreach ($selectSurat as $ss)
                                    <a class="dropdown-item border-bottom" href="#">
                                        <span class="text-primary">
                                        <span class="weight500">
                                            <i class="vl_bell weight600 pr-2"></i>Pengajuan Surat {{ $ss->jenisSurat }}</span>
                                        </span>
                                        <span class="small float-right text-muted">{{ Carbon::parse($ss->created_at)->format('H:i') }}</span>

                                        <div class="dropdown-message f12">
                                            Oleh : {!! ucwords(strtolower($ss->namaPenduduk)) !!}
                                        </div>
                                    </a>
                                @endforeach
                            @else
                            <a class="dropdown-item border-bottom">
                                <span class="text-secondary">
                                    <span class="weight500">
                                        Tidak Ada Notifikasi
                                    </span>
                                </span>
                                <span class="small float-right text-muted"></span>

                                <div class="dropdown-message f12">

                                </div>
                            </a>
                            @endif


            @elseif(Auth::user()->jabatan == 'p')
            <ul class="navbar-nav header-links ml-auto hide-arrow">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-3" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="vl_bell"></i>
                        <span class="d-lg-none">Notification
                            <span class="badge badge-pill badge-warning">5 New</span>
                        </span>
                        <?php
                            $getPenduduk = DB::table('penduduk')
                                            ->where('NIK',\Auth::user()->NIK)
                                            ->first();

                            $getAllLetter = DB::table('pengajuan_surat')
                            ->join('penduduk','pengajuan_surat.NIK','=','penduduk.NIK')
                            ->join('jenis_surat','pengajuan_surat.idJenisSurat','=','jenis_surat.id')
                            ->select(
                                'penduduk.nama as namaPenduduk',
                                'penduduk.noKK as nomerKK',
                                'pengajuan_surat.*',
                                'jenis_surat.jenis as jenisSurat',
                            )
                            ->Where('penduduk.noKK',$getPenduduk->noKK)
                            ->orderByDesc('pengajuan_surat.created_at')
                            ->get();
                        ?>

                        {{-- @if ($getAllLetter->status == 'S')
                            <div class="notification-alarm">
                                <span class="wave wave-danger"></span>
                                <span class="dot bg-danger"></span>
                            </div>
                        @elseif($getAllLetter->isEmpty)
                            <div class="notification-alarm">

                            </div>
                        @endif --}}

                    </a>

                    <div class="dropdown-menu dropdown-menu-right header-right-dropdown-width pb-0" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header weight500">Notifikasi</h6>
                        <div class="dropdown-divider mb-0"></div>

                            @if ($getAllLetter == null)
                                <a class="dropdown-item border-bottom">
                                    <span class="text-secondary">
                                        <span class="weight500">
                                            Tidak Ada Notifikasi
                                        </span>
                                    </span>
                                    <span class="small float-right text-muted"></span>

                                    <div class="dropdown-message f12">

                                    </div>
                                </a>
                            {{-- @elseif($getAllLetter->isEmpty())
                                <a class="dropdown-item border-bottom">
                                    <span class="text-secondary">
                                        <span class="weight500">
                                            Tidak Ada Notifikasi
                                        </span>
                                    </span>
                                    <span class="small float-right text-muted"></span>

                                    <div class="dropdown-message f12">

                                    </div>
                                </a> --}}
                            @else
                                @foreach ($getAllLetter as $gAl)
                                    @if ($gAl->status == 'S')
                                    <a class="dropdown-item border-bottom">
                                        <span class="text-secondary">
                                            <span class="weight500">
                                                <strong class="text-primary">{{ $gAl->jenisSurat }}</strong> <small>Atas Nama</small>
                                                <br><i>{{ $gAl->namaPenduduk }}</i>
                                                <br>Sudah Selesai Diproses.<br>
                                                Surat dapat diambil di Kantor Desa
                                            </span>
                                        </span>
                                        <span class="small float-right text-muted"></span>

                                        <div class="dropdown-message f12">

                                        </div>
                                    </a>
                                @endif
                                @endforeach
                            @endif
            @endif


                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-3" id="userNav" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-thumb">
                            <img class="rounded-circle" src="{{ asset('newBackAssets/img/avatar/avatar1.jpg')}}" alt=""/>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                        @if(Auth::user()->jabatan == 'o')
                            <a class="dropdown-item" href="{{ route('profileOperator') }}">Profil</a>
                            <a class="dropdown-item" href="{{ route('operator-list.index') }}">Data Operator</a>
                        @elseif(Auth::user()->jabatan == 'p')
                            <a class="dropdown-item" href="{{ route('profilePenduduk')}}">Profil</a>
                        @endif

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sign Out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <!--/header rightside links-->

        </div>
    </nav>
    <!--/navigation : sidebar & header-->

    <!--main content wrapper-->
    <div class="content-wrapper">

        <div class="container-fluid">
            @yield('contentHere')
        </div>

        <!--footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>&copy; Sumerta Kaja - 2020</small>
                </div>
            </div>
        </footer>
        <!--/footer-->
    </div>
    <!--/main content wrapper-->



    <!--basic scripts-->
    <script src="{{ asset('newBackAssets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/jquery-dropdown-master/jquery.dropdown.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/icheck/skins/icheck.min.js')}}"></script>

    <!--datatables-->
    <script src="{{ asset('newBackAssets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('newBackAssets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Zebra DatePicker -->
    <script src="{{ asset('newBackAssets/vendor/zebra_datepicker/zebra_datepicker.min.js')}}"></script>

    <!--chartjs-->
    <script src="{{ asset('newBackassets/vendor/chartjs/Chart.bundle.min.js')}}"></script>

    <!--echarts-->
    <script type="text/javascript" src="{{ asset('newBackAssets/vendor/echarts/echarts-all-3.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('newBackAssets/vendor/swal/dist/sweetalert2.all.min.js')}}"></script>

    <!-- CKEditor -->
    <script src="{{ asset('newBackAssets/vendor/ckeditor/ckeditor.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('newBackAssets/vendor/select2/js/select2.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('newBackAssets/vendor/modernizr.js')}}"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="{{ asset('newBackAssets/js/scripts.js')}}"></script>

    <!-- Script Place -->
    @yield('scriptPlace')
</body>
</html>

