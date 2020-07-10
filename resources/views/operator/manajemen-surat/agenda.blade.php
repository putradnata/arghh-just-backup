<?php
    use \Carbon\Carbon;
?>
@extends('layouts.base')

@section('addressTitle','Agenda Surat')

@section('customStyle')
<style>
    .dataTables_filter {
        display: none;
    }
</style>
@endsection

@section('contentHere')
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Agenda Surat</div>
                    <div class="custom-post-title">Desa Sumerta Kaja</div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-success errorAlert">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <table id="tableAgenda" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;">
                            <th>Tanggal Pengajuan</th>
                            <th>Nomer Surat</th>
                            <th>Nama Pemohon</th>
                            <th>Surat</th>
                            <th>Asal Banjar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agenda as $ag => $agd)
                            <?php
                                $parsedDate = Carbon::parse($agd->tanggalMengajukan)->locale('id');
                            ?>
                            <tr>
                                <td>{{ $parsedDate->isoFormat('dddd, Do MMMM YYYY') }}</td>
                                <td>{{ $agd->noSurat }}</td>
                                <td>{{ $agd->Pemohon }}</td>
                                <td>{{ $agd->JenisSurat }}</td>
                                <td>{{ $agd->Banjar }}</td>
                                @if ($agd->statusSurat == '-1')
                                    <td class="text-center">
                                        <span class="badge badge-info text-light form-pill px-3 py-1">Pengajuan Berhasil</span>
                                    </td>
                                @elseif ($agd->statusSurat == 'D')
                                    <td class="text-center">
                                        <span class="badge badge-warning text-light form-pill px-3 py-1">Diproses Operator</span>
                                    </td>
                                @elseif ($agd->statusSurat == 'KBD')
                                    <td class="text-center">
                                        <span class="badge badge-secondary text-light form-pill px-3 py-1">Diproses Kelian Banjar Dinas</span>
                                    </td>
                                @elseif ($agd->statusSurat == 'KD')
                                    <td class="text-center">
                                        <span class="badge badge-primary text-light form-pill px-3 py-1">Diproses Kepala Desa</span>
                                    </td>
                                @elseif ($agd->statusSurat == 'S')
                                    <td class="text-center">
                                        <span class="badge badge-success text-light form-pill px-3 py-1">Surat Selesai</span>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="text-align:center;">
                            <th>Tanggal Pengajuan</th>
                            <th>Nomer Surat</th>
                            <th>Nama Pemohon</th>
                            <th>Surat</th>
                            <th>Asal Banjar</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptPlace')
<!-- individual search -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#tableAgenda tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Cari '+title+'" />' );
        });
    });
</script>

<!-- Initiate Data Table -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableAgenda').DataTable({
            initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
        });
    } );
</script>

<!-- Alert Fade out -->
<script>
    $(document).ready(function(){
        $(".successAlert").fadeTo(2000, 500).slideUp(500, function(){
            $(".successAlert").slideUp(500);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".errorAlert").fadeTo(2000, 500).slideUp(500, function(){
            $(".errorAlert").slideUp(500);
        });
    });
</script>

<!-- Init Zebra Date Picker -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#tanggal").Zebra_DatePicker();
    });
</script>
@endsection
