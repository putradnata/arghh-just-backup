@extends('layouts.base')

@section('addressTitle','Input Data Banjar')

@section('contentHere')

<div class="card shadow mb-4">
    <div class="card-header border-0">
        <div class="custom-title-wrap bar-primary">
            <div class="custom-title">Data Banjar</div>
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
        @if(!isset($banjarFind->id))
            <form method="POST" action="{{ route('banjar.store') }}">
        @else
            <form method="POST" action="{{ route('banjar.update', $banjarFind->id) }}">
                @method('put')
        @endif
                @csrf
                <div class="form-group">
                    <label for="namaBanjar">Nama</label>
                    <input class="form-control" id="nama" name="namaBanjar" type="text" placeholder="Nama Banjar" value="{{ old('namaBanjar', $request->nama) }}">
                </div>
                <div class="form-group">
                    <label for="alamatBanjar">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamatBanjar" placeholder="Alamat Banjar">{{ old('alamatBanjar', $request->alamat) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kelian">Kelian Banjar Dinas</label>
                    <select class="form-control" id="kelian" name="kelian">
                        <option hidden selected> ---</option>
                        @if(!isset($banjarFind->id))
                            {{-- @foreach ($requestKelian as $pddk)
                                <option value="{{ $pddk->NIK }}" {{ old('kelian') == $pddk->NIK ? "selected" : $request->kelian == "" ? "selected" : "" }}>{{ $pddk->nama }}</option>
                            @endforeach --}}
                            @foreach ($findPenduduk as $fP)
                                <option value="{{ $fP->NIK }}">{{ $fP->nama }}</option>
                            @endforeach
                        @else

                            @foreach ($requestKelian as $pddk)
                                <option value="{{ $pddk->NIK }}" {{ old('kelian') == $pddk->NIK ? "selected" : $request->kelian == "" ? "selected" : "" }}>{{ $pddk->nama }}</option>
                            @endforeach

                            @foreach ($findPenduduk as $fP)
                                <option value="{{ $fP->NIK }}">{{ $fP->nama }}</option>
                            @endforeach
                            {{-- @foreach ($requestKelian as $pddk)
                                <option value="{{ $pddk->NIK }}" {{ old('kelian') == $pddk->NIK ? "selected" : $request->kelian == "" ? "selected" : "" }}>{{ $pddk->nama }}</option>
                            @endforeach --}}
                            {{-- @foreach ($findPenduduk as $fP)
                                <option value="{{ $fP->NIK }}">{{ $fP->nama }}</option>
                            @endforeach --}}

                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="noTelp">No Telepon Kelian</label>
                    <input class="form-control" id="noTelp" name="noTelp" type="text" placeholder="Nomor Telepon" value="{{ old('noTelp', $request->noTelp) }}">
                </div>
                <div class="form-group">
                    <label for="keteranganBanjar">Keterangan</label>
                    <input class="form-control" id="keteranganBanjar" name="keteranganBanjar" placeholder="Keterangan" value="{{ old('keteranganBanjar', $request->keterangan) }}">
                </div>
                <button class="btn btn-secondary" type="reset">Ulang</button>
                <button class="btn btn-success btn-submit" type="submit">Simpan</button>
            </form>
    </div>
</div>




@endsection

@section('scriptPlace')
    {{-- init select for kelian --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#kelian").select2();
        });
    </script>
@endsection
