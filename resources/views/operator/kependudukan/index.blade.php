<?php
    use \App\Http\Controllers\PendudukController;
?>
@extends('layouts.base')

@section('addressTitle','Data Kependudukan')

@section('customStyle')
<!-- Button Style -->
<style>
    #tambahPenduduk{
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
                    <div class="custom-title">Data Penduduk</div>
                    <div class="custom-post-title">Desa Sumerta Kaja</div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">

                <a href="{{ route('kependudukan.create') }}" id="tambahPenduduk" class="btn btn-success"><i class="fa fa-user-plus mr-2"></i>Tambah Penduduk</a>

                <table id="tablePenduduk" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;">
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Banjar</th>
                            <th>Nomor KK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduk as $pddk => $pdList)
                            <tr>
                                <td style="text-align:center;">{{ ++$pddk }}</td>
                                <td>{{ $pdList->NIK }}</td>
                                <td>{{ $pdList->nama }}</td>

                                @if ($pdList->jenisKelamin == 'L')
                                    <td>Laki-laki</td>
                                @elseif($pdList->jenisKelamin == 'P')
                                    <td>Perempuan</td>
                                @else
                                    <td>-</td>
                                @endif

                                <td>{{ $pdList->tempatLahir }}, {{ PendudukController::indonesianFormattedDate($pdList->tanggalLahir) }}</td>
                                <td>{{ $pdList->namaBanjar }}</td>
                                <td>{{ $pdList->noKK }}</td>
                                <td style="text-align:center;">
                                <a href="#" class="btn btn-primary btn-sm" id="detailPenduduk" title="Detail" data-id="{{ $pdList->NIK }}" data-toggle="modal" data-target="#pendudukModal"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('kependudukan.edit',$pdList->NIK) }}" class="btn btn-warning btn-sm" title="Update"><i class="fa fa-sticky-note-o"></i></a>
                                    {{-- <i href="#" data-id="{{ $pdList->NIK }}" class="btn btn-danger btn-sm" id="delete-data" title="Hapus"><i class="fa fa-trash"></i></i> --}}
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
<div class="modal fade bd-example-modal-lg" id="pendudukModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
        $('#tablePenduduk').DataTable();
    } );
</script>

<!-- Init Modal -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#pendudukModal").on('show.bs.modal', function(e){
            var nikPassed = $(e.relatedTarget).data('id');

            $.get('/operator/kependudukan/'+nikPassed, function(data){
                $(".modal-body").html(data);
            });

        });
    });
</script>
<!-- End -->

{{-- <!-- Init Swal -->
<script type="text/javascript">
    $(document).ready(function(){

        var NIKPenduduk =
        var namaPenduduk = "{{ $pdList->nama }}";

        $("#delete-data").on('click',function(){
            Swal.fire({
            title: 'Apakah anda Yakin?',
            text: "Penduduk atas nama "+namaPenduduk+" akan dihapus dan tidak bisa dikembalikan. ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lanjutkan'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Data Terhapus!',
                'Data Penduduk Telah Terhapus.',
                'success'
                )
            }
            })

            });
        });

</script> --}}


<!-- Alert Fade out -->
<script>
    $(document).ready(function(){
        $(".successAlert").fadeTo(2000, 500).slideUp(500, function(){
            $(".successAlert").slideUp(500);
        });
    });
</script>
@endsection
