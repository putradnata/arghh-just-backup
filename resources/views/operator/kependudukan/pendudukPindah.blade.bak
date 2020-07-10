<?php
    use \App\Http\Controllers\PendudukPindahController;
?>
@extends('layouts.base')

@section('addressTitle','Data Penduduk Pindah')

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
                    <div class="custom-title">Data Penduduk Pindah</div>
                    <div class="custom-post-title">Desa Sumerta Kaja</div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">

                <a href="#" id="tambahPenduduk" class="btn btn-success"><i class="fa fa-user-plus mr-2"></i>Tambah Penduduk Pindah</a>

                <table id="tablePenduduk" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                    <tr style="text-align:center;">
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Pindah</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($penduduk->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align:center;">Data Penduduk Pindah Tidak Ada</td>
                            </tr>
                        @else
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

                                    <td>{{ PendudukPindahController::indonesianFormattedDate($pdList->padaTanggal) }}</td>
                                    <td style="text-align:center;">
                                        <a href="#" class="btn btn-primary btn-sm" title="Detail" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('kependudukan.edit',$pdList->NIK) }}" class="btn btn-warning btn-sm" title="Update"><i class="fa fa-sticky-note-o"></i></a>
                                        {{-- <i href="#" data-id="{{ $pdList->NIK }}" class="btn btn-danger btn-sm" id="delete-data" title="Hapus"><i class="fa fa-trash"></i></i> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Init Modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" name="detailPenduduk" id="detailPenduduk">
                    <tr>
                        <th>Nomor KK</th>
                        <td>:</td>
                        <td>{{ empty($pdList->noKK) ? '' : $pdList->noKK }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>:</td>
                        <td>{{ empty($pdList->NIK) ? '' : ($pdList->NIK) }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ empty($pdList->nama) ? '' : $pdList->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        @if (empty($pdList->jenisKelamin == 'L') ? '' : $pdList->jenisKelamin == 'L')
                            <td>Laki-laki</td>
                        @elseif(empty($pdList->jenisKelamin == 'P') ? '' : $pdList->jenisKelamin == 'P')
                            <td>Perempuan</td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>:</td>
                        <td>{{ empty($pdList->tempatLahir) ? '' : $pdList->tempatLahir }}, {{ empty($pdList->tanggalLahir) ? '' : PendudukPindahController::indonesianFormattedDate($pdList->tanggalLahir) }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ empty($pdList->alamatLengkap) ? ''  : $pdList->alamatLengkap }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>:</td>
                        @if ( empty($pdList->statusPerkawinan) ? '' : $pdList->statusPerkawinan == 'S')
                            <td>Sudah Menikah</td>
                        @elseif( empty($pdList->statusPerkawinan) ? '' : $pdList->statusPerkawinan == 'B')
                            <td>Belum Menikah</td>
                        @elseif( empty($pdList->statusPerkawinan) ? '' : $pdList->statusPerkawinan == 'CH')
                            <td>Cerai Hidup</td>
                        @elseif( empty($pdList->statusPerkawinan) ? '' : $pdList->statusPerkawinan == 'CM')
                            <td>Cerai Mati</td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>:</td>
                        @if ( empty($pdList->agama) ? '' : $pdList->agama == 'H')
                            <td>Hindu</td>
                        @elseif( empty($pdList->agama) ? '' : $pdList->agama == 'I')
                            <td>Islam</td>
                        @elseif( empty($pdList->agama) ? '' : $pdList->agama == 'KK')
                            <td>Kristen Katholik</td>
                        @elseif( empty($pdList->agama) ? '' : $pdList->agama == 'KP')
                            <td>Kristen Protestan</td>
                        @elseif( empty($pdList->agama) ? '' : $pdList->agama == 'B')
                            <td>Buddha</td>
                        @elseif( empty($pdList->agama) ? '' : $pdList->agama == 'KH')
                            <td>Konghucu</td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>:</td>
                        @if ( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'TDKSEKOLAH')
                            <td>Tidak / Belum Sekolah</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'SD')
                            <td>Tamat SD / Sederajat</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'SMP')
                            <td>Tamat SMP / Sederajat</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'SMA')
                            <td>Tamat SLTA / Sederajat</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'DIPLOMA-I')
                            <td>Diploma I</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'DIPLOMA-II')
                            <td>Diploma II</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'STRATA-1')
                            <td>Strata I</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'STRATA-2')
                            <td>Strata II</td>
                        @elseif( empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir == 'STRATA-3')
                            <td>Strata III</td>
                        @else
                            <td>{{  empty($pdList->pendidikanTerakhir) ? '' : $pdList->pendidikanTerakhir }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>:</td>
                        <td>{{ empty($pdList->pekerjaan) ? '' : $pdList->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>:</td>
                        <td>{{ empty($pdList->namaAyah) ? '' : $pdList->namaAyah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>:</td>
                        <td>{{ empty($pdList->namaIbu) ? '' : $pdList->namaIbu }}</td>
                    </tr>
                    <tr>
                        <th>Pindah ke -</th>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Alasan Pindah</th>
                        <td>:</td>
                        <td>{{ empty($pdList->alasanPindah) ? '' : $pdList->alasanPindah }}</td>
                    </tr>
                </table>
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
