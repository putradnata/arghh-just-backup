@extends('website.layout')

@section('contentTitle','Pengajuan Surat')

@section('formHere')

@if (Session::has('error'))
    <div class="alert alert-danger">
        <p>{{ Session::get('error') }}</p>
    </div>
@elseif(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

<form class="form-horizontal" method="POST" action="/validasi-nik">
    @csrf
    <div class="form-group">
        <label class="control-label" for="NIK">Nomor Induk Kependudukan</label>
        <input type="text" class="form-control" id="NIK" name="NIK" placeholder="Masukkan NIK">
    </div>

    <div class="form-group">
        <label class="control-label" for="namaLengkap">Nama Lengkap <small><i>Sesuai dengan Kartu Tanda
                    Penduduk</i></small></label>
        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required>
    </div>

    <div class="form-group">
        <label class="control-label" for="tanggalLahir">Tanggal Lahir <small><i>Tanggal - Bulan - Tahun (Contoh : 05 - 01 - 1980)</i></small></label>
    </div>

    <div class="row">
        <div class="form-group col-sm-2">

            <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
        </div>
        <div class="form-group col-sm-2">

            <input type="text" class="form-control" id="bulanLahir" name="bulanLahir" required>
        </div>
        <div class="form-group col-sm-4">

            <input type="text" class="form-control" id="tahunLahir" name="tahunLahir" required>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label" for="suratDiajukan">Surat yang Diajukan</label>
        <br>

        <select class="suratDiajukan" name="suratDiajukan[]" style="width:100%;" multiple>
            @foreach ($kategoriSurat as $katSur)
                <option value="{{ $katSur->id }}">{{ $katSur->jenis }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="suratLainnya" name="suratLainnya" id="suratLainnya">
            <label class="form-check-label" for="inlineCheckbox2">Surat Lainnya</label>
        </div>
    </div>

    <div class="form-group suratLainnyaInput">
        <label class="control-label" for="suratLainnyaInput">Surat</label>
        <input type="text" class="form-control" id="suratLainnyaInput" name="suratLainnyaInput">
    </div>

    <button type="submit" class="btn btn-primary">Ajukan</button>
</form>

@endsection

@section('scriptPlace')
<script type="text/javascript">
    // Input Surat Lainnya
    $(".suratLainnyaInput").attr('hidden', true);

    $(document).ready(function () {
        $("#suratLainnya").change(function () {
            //var suratLainnya = $("#suratLainnya").val();

            if(this.checked)
                $(".suratLainnyaInput").attr('hidden', false);
            else
                $(".suratLainnyaInput").attr('hidden', true);
        });
    });
</script>
<!-- Define Select 2 -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".suratDiajukan").select2();
    });
</script>
@endsection
