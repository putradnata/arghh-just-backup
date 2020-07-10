<?php
    use \App\Http\Controllers\PendudukController;
    use \Carbon\Carbon;
?>
@extends('layouts.base')

@section('addressTitle','Data Penduduk Meninggal')

@section('customStyle')
<!-- Button Style -->
<style>
    #tambahPendudukMeninggal{
        margin: 0% 1% 1% 0%;
    }
</style>

@endsection

@section('contentHere')
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Data Penduduk Meninggal</div>
                    <div class="custom-post-title">Desa Sumerta Kaja</div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert alert-error successAlert">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">

                <a href="{{ route('penduduk-meninggal.create') }}" id="tambahPendudukMeninggal" class="btn btn-success"><i class="fa fa-user-plus mr-2"></i>Tambah Data</a>

                <table id="tablePendudukMeninggal" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Banjar</th>
                            <th>Nomor KK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendudukMeninggal as $pendudukM => $pm)
                        <?php
                            $tanggal = Carbon::parse($pm->tanggalLahir)->locale('id');
                        ?>
                            <tr>
                                <td style="text-align: center">{{ ++$pendudukM }}</td>
                                <td>{{ $pm->nama }}</td>
                                @if ($pm->jenisKelamin == 'L')
                                    <td>Laki - laki</td>
                                @elseif($pm->jenisKelamin == 'P')
                                    <td>Perempuan</td>
                                @endif
                                <td>{{ $pm->tempatLahir }}, {{$tanggal->isoFormat('Do MMMM YYYY')}}</td>
                                <td>{{ $pm->namaBanjar }}</td>
                                <td style="text-align:center;">
                                    <a href="#" class="btn btn-primary btn-sm" id="detailPenduduk" title="Detail" data-id="{{ $pm->NIK }}" data-toggle="modal" data-target="#pendudukMeninggalModal"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Init Modal -->
<div class="modal fade bd-example-modal-lg" id="pendudukMeninggalModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptPlace')
<!-- Initiate Data Table -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablePendudukMeninggal').DataTable();
    } );
</script>

<!-- Init Modal -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#pendudukMeninggalModal").on('show.bs.modal', function(e){
            var nikPassed = $(e.relatedTarget).data('id');

            $.get('/operator/penduduk-meninggal/show/'+nikPassed, function(data){
                $(".modal-body").html(data);
            });

        });
    });
</script>
<!-- End -->

<!-- Alert Fade out -->
<script>
    $(document).ready(function(){
        $(".successAlert").fadeTo(2000, 500).slideUp(500, function(){
            $(".successAlert").slideUp(500);
        });
    });
</script>
@endsection
