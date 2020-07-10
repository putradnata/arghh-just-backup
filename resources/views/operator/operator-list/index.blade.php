@extends('layouts.base')

@section('addressTitle','Data Operator')

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

                <a href="{{ route('operator-list.create') }}" id="tambahPenduduk" class="btn btn-success"><i class="fa fa-user-plus mr-2"></i>Tambah Operator</a>

                <table id="tableSuratMasuk" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;">
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $usr => $user)
                            <tr>
                                <td style="text-align:center">{{ ++$usr }}</td>
                                <td>{{ $user->namaPenduduk }}</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
@endsection
