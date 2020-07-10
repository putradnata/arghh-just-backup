@extends('layouts.base')

@section('addressTitle','Data Surat')

@section('customStyle')
<!-- Button Style -->
<style>
    #tambahJenisSurat{
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
                    <div class="custom-title">Data Surat</div>
                    <div class="custom-post-title">Desa Sumerta Kaja</div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger errorAlert">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">

                <a href="{{ route('data-surat.create') }}" id="tambahJenisSurat" class="btn btn-success"><i class="fa fa-home mr-2"></i>Tambah Surat</a>

                <table id="tableSurat" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr style="display: none;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    <tr style="text-align:center;">
                        <th>No.</th>
                        <th>Jenis Surat</th>
                        <th colspan="2" style="width:10%;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $srt => $datasurat)
                            <tr>
                                <td style="text-align:center;">{{ ++$srt }}</td>
                                <td>{{ $datasurat->jenis }}</td>

                                <td style="text-align:center;">
                                    <a href="{{ route('data-surat.edit',$datasurat->id) }}" class="btn btn-warning btn-sm" title="Update"><i class="fa fa-sticky-note-o"></i></a>
                                </td>

                                <td style="text-align:center;">
                                    <form method="POST" action="{{ route('data-surat.destroy',$datasurat->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button class="btn btn-danger btn-sm" title="Hapus" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
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

<div class="modal fade bd-example-modal-lg" id="jenisSuratModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Surat</h4>
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
        $('#tableSurat').DataTable();
    } );
</script>

<!-- Init Modal -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#jenisSuratModal").on('show.bs.modal', function(e){
            var idSurat = $(e.relatedTarget).data('id');

            $.get('/operator/data-surat/'+idSurat, function(data){
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
