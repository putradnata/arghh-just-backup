@extends('layouts.base')

@section('addressTitle','Data Surat Masuk')

@section('customStyle')
@endsection

@section('contentHere')
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Data Surat Masuk</div>
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

                <table id="tableSuratMasuk" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;">
                            <th>No.</th>
                            <th>Nomer Surat</th>
                            <th>Nama Pemohon</th>
                            <th>Surat</th>
                            <th>Asal Banjar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($incomingLetter->isEmpty())
                            <tr>
                                <td colspan="6" style="text-align:center;">Tidak Ada Surat Masuk</td>
                            </tr>
                        @else
                            @foreach ($incomingLetter as $icl => $ic)
                                @if ($ic->statusSurat == '-1')
                                    <tr>
                                        <td style="text-align:center;">{{ ++$icl }}</td>
                                        <td>{{ $ic->noSurat }}</td>
                                        <td>{{ $ic->Pemohon }}</td>
                                        <td>{{ $ic->JenisSurat }}</td>
                                        <td>{{ $ic->Banjar }}</td>
                                        <td style="text-align:center;">
                                            <a href="{{ route('operator.process',$ic->noSurat) }}" class="btn btn-secondary btn-sm m-2" title="Terima"><i class="fa fa-user"></i> Surat Telah Diproses</a>

                                            <a href="{{ route('kelian.process',$ic->noSurat) }}" class="btn btn-info btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kelian Dinas</a>

                                            <a href="{{ route('kades.process',$ic->noSurat) }}" class="btn btn-primary btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kepala Desa</a>

                                            <a href="{{ route('process.completed',$ic->noSurat) }}" class="btn btn-success btn-sm m-2 disabled" title="Terima"><i class="fa fa-check"></i> Selesai</a>
                                        </td>
                                    </tr>
                                @elseif ($ic->statusSurat == 'D')
                                    <tr>
                                        <td style="text-align:center;">{{ ++$icl }}</td>
                                        <td>{{ $ic->noSurat }}</td>
                                        <td>{{ $ic->Pemohon }}</td>
                                        <td>{{ $ic->JenisSurat }}</td>
                                        <td>{{ $ic->Banjar }}</td>
                                        <td style="text-align:center;">
                                            <a href="{{ route('print-letter',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Cetak"><i class="fa fa-print"></i> Cetak</a>

                                            <a href="{{ route('kelian.process',$ic->noSurat) }}" class="btn btn-info btn-sm m-2" title="Terima"><i class="fa fa-user"></i> Kelian Dinas</a>

                                            <a href="{{ route('kades.process',$ic->noSurat) }}" class="btn btn-primary btn-sm m-2" title="Terima"><i class="fa fa-user"></i> Kepala Desa</a>

                                            <a href="{{ route('process.completed',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Terima"><i class="fa fa-check"></i> Selesai</a>
                                        </td>
                                    </tr>
                                @elseif ($ic->statusSurat == 'KBD')
                                    <tr>
                                        <td style="text-align:center;">{{ ++$icl }}</td>
                                        <td>{{ $ic->noSurat }}</td>
                                        <td>{{ $ic->Pemohon }}</td>
                                        <td>{{ $ic->JenisSurat }}</td>
                                        <td>{{ $ic->Banjar }}</td>
                                        <td style="text-align:center;">
                                            <a href="{{ route('print-letter',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Cetak"><i class="fa fa-print"></i> Cetak</a>

                                            <a href="{{ route('kelian.process',$ic->noSurat) }}" class="btn btn-info btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kelian Dinas</a>

                                            <a href="{{ route('kades.process',$ic->noSurat) }}" class="btn btn-primary btn-sm m-2" title="Terima"><i class="fa fa-user"></i> Kepala Desa</a>

                                            <a href="{{ route('process.completed',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Terima"><i class="fa fa-check"></i> Selesai</a>
                                        </td>
                                    </tr>
                                @elseif ($ic->statusSurat == 'KD')
                                    <tr>
                                        <td style="text-align:center;">{{ ++$icl }}</td>
                                        <td>{{ $ic->noSurat }}</td>
                                        <td>{{ $ic->Pemohon }}</td>
                                        <td>{{ $ic->JenisSurat }}</td>
                                        <td>{{ $ic->Banjar }}</td>
                                        <td style="text-align:center;">
                                            <a href="{{ route('print-letter',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Cetak"><i class="fa fa-print"></i> Cetak</a>

                                            <a href="{{ route('kelian.process',$ic->noSurat) }}" class="btn btn-info btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kelian Dinas</a>

                                            <a href="{{ route('kades.process',$ic->noSurat) }}" class="btn btn-primary btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kepala Desa</a>

                                            <a href="{{ route('process.completed',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Terima"><i class="fa fa-check"></i> Selesai</a>
                                        </td>
                                    </tr>
                                @elseif ($ic->statusSurat == 'S')
                                    <tr>
                                        <td style="text-align:center;">{{ ++$icl }}</td>
                                        <td>{{ $ic->noSurat }}</td>
                                        <td>{{ $ic->Pemohon }}</td>
                                        <td>{{ $ic->JenisSurat }}</td>
                                        <td>{{ $ic->Banjar }}</td>
                                        <td style="text-align:center;">
                                            <a href="{{ route('print-letter',$ic->noSurat) }}" class="btn btn-success btn-sm m-2" title="Cetak"><i class="fa fa-print"></i> Cetak</a>

                                            <a href="{{ route('kelian.process',$ic->noSurat) }}" class="btn btn-info btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kelian Dinas</a>

                                            <a href="{{ route('kades.process',$ic->noSurat) }}" class="btn btn-primary btn-sm m-2 disabled" title="Terima"><i class="fa fa-user"></i> Kepala Desa</a>

                                            <a href="{{ route('process.completed',$ic->noSurat) }}" class="btn btn-success btn-sm m-2 disabled" title="Terima"><i class="fa fa-check"></i> Selesai</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Init Modal -->

<div class="modal fade bd-example-modal-lg" id="banjarModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Banjar</h4>
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
        $('#tableSuratMasuk').DataTable();
    } );
</script>

<!-- Init Modal -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#banjarModal").on('show.bs.modal', function(e){
            var idBanjar = $(e.relatedTarget).data('id');

            $.get('/operator/banjar/'+idBanjar, function(data){
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

<script>
    $(document).ready(function(){
        $(".errorAlert").fadeTo(2000, 500).slideUp(500, function(){
            $(".errorAlert").slideUp(500);
        });
    });
</script>
@endsection
