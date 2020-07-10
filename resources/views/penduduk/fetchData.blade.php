<?php
    use \App\Http\Controllers\HomeController;
?>

@foreach ($fetched as $data)
    <div class="form-group">
        <label for="tempatTanggalLahir">Tempat, Tanggal Lahir</label>
        <input class="form-control" id="tempatTanggalLahir" name="tempatTanggalLahir" type="text" value="{{ $data->tempatLahir }}, {{ HomeController::indonesianFormattedDate($data->tanggalLahir)}}" readonly>
    </div>
    <div class="form-group">
        <label for="jenisKelamin">Jenis Kelamin</label>
            @if($data->jenisKelamin)
                <input class="form-control" id="jenisKelamin" name="jenisKelamin" type="text" value="Laki-laki" readonly>
            @else
                <input class="form-control" id="jenisKelamin" name="jenisKelamin" type="text" value="Perempuan" readonly>
            @endif
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat">{{ $data->alamatLengkap }}</textarea>
    </div>

    <div class="form-group">
        <label for="nik">Nomor Induk Kependudukan</label>
        <input class="form-control" id="nik" name="nikpenduduk" type="text" value="{{ $data->NIK }}" readonly>
    </div>
@endforeach
