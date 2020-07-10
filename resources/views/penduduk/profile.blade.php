<?php
    use \App\Http\Controllers\ProfileController;
    use \Carbon\Carbon;

    // $imageLocation = public_path().'/images/1588766434_Slider-Photo-Desa-Sumerta-Kaja.png';
    $imageLocation = asset('/images/1588766434_Slider-Photo-Desa-Sumerta-Kaja.png');

?>

@extends('layouts.base')

@section('customStyle')
<style>
    .gradient-sad-kerthi{
        /* background: rgb(255,0,0);
        background: linear-gradient(180deg, rgba(255,0,0,1) 0%, rgba(255,255,255,1) 100%);
         */
        /* background-color: #32bdff; */
        background-image: url('<?= $imageLocation ?>');
        background-size:cover;
    }
</style>
@endsection

@section('contentHere')
    <!--profile banner-->
    <div class="profile-banner gradient-sad-kerthi">
        <div class="row ">
            <div class="col-md-6 ml-auto text-lg-right">
                <div class="profile-follower-info">
                </div>
            </div>
        </div>
    </div>
    <!--/profile banner-->

    <!--profile nav-->
    <div class="profile-nav bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto">
                    <div class="profile-nav-links">
                        <ul class="nav f12">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" id="dataKeluarga">DATA KELUARGA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="dataSurat">DATA SURAT</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/profile nav-->

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-4 col-md-6 profile-info-position">
                <div class="card card-shadow mb-4 ">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="mt-4 mb-3">
                                <img class="rounded-circle" src="{{ asset('newBackAssets/img/avatar/avatar1.jpg')}}" width="85"
                                    alt="" />
                            </div>
                            <h5 class="text-uppercase mb-0">{{ $dataUser[0]->namaPenduduk }}</h5>
                            <p class="text-muted mb-0">
                                @if ($dataUser[0]->banjarPenduduk == '1')
                                    Penduduk Banjar Tegal Kuwalon
                                @elseif ($dataUser[0]->banjarPenduduk == '2')
                                    Penduduk Banjar Sima
                                @elseif ($dataUser[0]->banjarPenduduk == '3')
                                    Penduduk Banjar Kerta Bumi
                                @elseif ($dataUser[0]->banjarPenduduk == '4')
                                    Penduduk Banjar Peken
                                @elseif ($dataUser[0]->banjarPenduduk == '5')
                                    Penduduk Banjar Pande
                                @elseif ($dataUser[0]->banjarPenduduk == '6')
                                    Penduduk Banjar Lebah
                                @endif
                            </p>
                            <br>
                            <div class="badge-icon mb-4">
                                <span class="badge badge-primary text-light form-pill px-5 py-3"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Anggota Keluarga : {!! count($keluargaUser) !!}</span>
                                <br><br>
                                <span class="badge badge-primary text-light form-pill px-5 py-3"><i class="fa fa-envelope-open"></i>&nbsp;&nbsp;&nbsp;&nbsp;Surat Diajukan : {!! $jumlahSurat !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="noKKPenduduk" value="{{ $dataUser[0]->noKKPenduduk }}" id="noKKPenduduk">

            <div class="col-xl-8 col-md-6" id="contentKeluarga">
                <div class="card card-shadow mb-4 ">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-warning">
                            <div class="custom-title">Data Keluarga</div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Kedudukan Dalam Keluarga</th>
                                </tr>
                                </thead>
                                <tbody id="tbodyKeluarga">
                                    @foreach ($keluargaUser as $kUs => $ks)
                                        <tr>
                                            <td style='text-align:center;'>{{ ++$kUs }}</td>
                                            <td>{{ $ks->nama }}</td>
                                            @if ($ks->jenisKelamin == 'L')
                                                <td>Laki - laki</td>
                                            @elseif($ks->jenisKelamin == 'P')
                                                <td>Perempuan</td>
                                            @endif

                                            @if ($ks->kedudukanKeluarga == 'KK')
                                                <td>Kepala Keluarga</td>
                                            @elseif($ks->kedudukanKeluarga == 'I')
                                                <td>Istri</td>
                                            @elseif($ks->kedudukanKeluarga == 'AK')
                                                <td>Anak Kandung</td>
                                            @elseif($ks->kedudukanKeluarga == 'OT')
                                                <td>Orang Tua</td>
                                            @elseif($ks->kedudukanKeluarga == 'FL')
                                                <td>Famili Lain</td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-6" id="contentSurat">
                <div class="card card-shadow mb-4 ">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-warning">
                            <div class="custom-title">
                                Data Surat <small>Surat Terbaru</small>
                                <a class="btn btn-success float-right" href="{{ route('penduduk.index') }}" style="color:white"><i class="fa fa-envelope-open-o"></i>&nbsp;&nbsp;Ajukan Surat</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Surat yang Diajukan</th>
                                    <th scope="col">Nama Pemohon</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Status Surat</th>
                                </tr>
                                </thead>
                                <tbody id="tbodySurat">
                                    @foreach ($dataSurat as $dst => $ds)
                                    <?php
                                        $tanggal = Carbon::parse($ds->created_at)->locale('id')
                                    ?>
                                        <tr>
                                            <td style='text-align:center;'>{{ ++$dst }}</td>
                                            <td>{{ $ds->jenisSurat }}</td>
                                            <td>{{ $ds->namaPenduduk }}</td>
                                            <td>{{ $tanggal->isoFormat('dddd, Do MMMM YYYY') }}</td>
                                            @if ($ds->status == '-1')
                                                <td>
                                                    <span class="badge badge-info text-light form-pill px-3 py-1">Pengajuan Berhasil</span>
                                                </td>
                                            @elseif ($ds->status == 'D')
                                                <td>
                                                    <span class="badge badge-warning text-light form-pill px-3 py-1">Diproses Operator</span>
                                                </td>
                                            @elseif ($ds->status == 'KBD')
                                                <td>
                                                    <span class="badge badge-secondary text-light form-pill px-3 py-1">Diproses Kelian Banjar Dinas</span>
                                                </td>
                                            @elseif ($ds->status == 'KD')
                                                <td>
                                                    <span class="badge badge-primary text-light form-pill px-3 py-1">Diproses Kepala Desa</span>
                                                </td>
                                            @elseif ($ds->status == 'S')
                                                <td>
                                                    <span class="badge badge-success text-light form-pill px-3 py-1">Surat Selesai</span>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">{{ $dataSurat->links() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scriptPlace')
{{-- Init Ajax Data Keluarga --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("#contentSurat").attr('hidden',true);

        $("#dataKeluarga").on('click',function(){

            $("#dataKeluarga").addClass('active');
            $("#dataSurat").removeClass('active');
            $("#contentKeluarga").attr('hidden',false);
            $("#contentSurat").attr('hidden',true);

        });
    });
</script>

{{-- Init Ajax Data Surat --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("#dataSurat").on('click',function(){
            $("#dataSurat").addClass('active');
            $("#dataKeluarga").removeClass('active');
            $("#contentKeluarga").attr('hidden',true);
            $("#contentSurat").attr('hidden',false);


        });
    });
</script>

@endsection
