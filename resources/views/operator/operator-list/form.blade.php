@extends('layouts.base')

@section('addressTitle','Form Tambah Operator')

@section('contentHere')
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                <div class="custom-title">Data Penduduk</div>
                <div class="custom-post-title">Desa Sumerta Kaja</div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger errorAlert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="card-body">
            {{-- @if(!isset($pendudukFind->NIK))
            <form method="POST" action="#">
                @else
                <form method="POST" action="#">
                    @method('put')
                    @endif --}}
                    <form method="POST" action="{{ route('operator-list.store') }}">
                    @csrf
                    <div class="form-group col-sm-5">
                        <label for="namaLengkap">Nama Lengkap</label>
                        {{-- <input class="form-control" id="namaLengkap" name="namaLengkap" type="text" placeholder="Nama Lengkap Penduduk"> --}}
                        <select class="form-control" id="penduduk" name="penduduk">
                            <option hidden> ---</option>
                            @foreach ($penduduk as $pddk)
                                <option value="{{ $pddk->NIK }}">{{ $pddk->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-5">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username">
                    </div>

                    <div class="form-group col-sm-5">
                        <label for="kataSandi">Kata Sandi</label>
                        <input class="form-control" id="kataSandi" name="kataSandi" type="password" placeholder="Password">
                    </div>

                    <div class="form-group col-sm-5">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                    </div>

                    <a class="btn btn-primary" href="{{ url()->previous() }}" type="button">Kembali</a>
                    <button class="btn btn-secondary reset" type="reset" data-dismiss="modal">Ulang</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
        </div>
    </div>
@endsection

@section('scriptPlace')
{{-- init select for penduduk --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("#penduduk").select2();
    });
</script>
@endsection
