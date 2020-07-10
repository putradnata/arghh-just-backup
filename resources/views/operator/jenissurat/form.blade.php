@extends('layouts.base')

@section('addressTitle','Input Data Surat')

@section('contentHere')

<div class="card shadow mb-4">
    <div class="card-header border-0">
        <div class="custom-title-wrap bar-primary">
            <div class="custom-title">Data Surat</div>
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
        @if(!isset($suratFind->id))
            <form method="POST" action="{{ route('data-surat.store') }}">
        @else
            <form method="POST" action="{{ route('data-surat.update', $suratFind->id) }}">
                @method('put')
        @endif
                @csrf
                <div class="form-group">
                    <label for="jenisSurat">Jenis Surat</label>
                    <input class="form-control" id="jenisSurat" name="jenisSurat" type="text" placeholder="Jenis Surat" value="{{ old('jenisSurat', $request->jenis) }}">
                </div>

                <button class="btn btn-secondary" type="reset">Ulang</button>
                <button class="btn btn-success btn-submit" type="submit">Simpan</button>
            </form>
    </div>
</div>




@endsection

@section('scriptPlace')

@endsection
