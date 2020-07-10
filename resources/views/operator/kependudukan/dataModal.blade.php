<?php
    use \App\Http\Controllers\PendudukController;
?>

@foreach ($testModal as $pdList)
<table class="table" name="detailPenduduk" id="detailPenduduk">
    <tr>
        <th>Nomor KK</th>
        <td>:</td>
        <td>{{ $pdList->noKK }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>:</td>
        <td>{{ $pdList->NIK }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>:</td>
        <td>{{ $pdList->nama }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>:</td>
        @if ($pdList->jenisKelamin == 'L')
            <td>Laki-laki</td>
        @elseif($pdList->jenisKelamin == 'P')
            <td>Perempuan</td>
        @else
            <td>-</td>
        @endif
    </tr>
    <tr>
        <th>Tempat, Tanggal Lahir</th>
        <td>:</td>
        <td>{{ $pdList->tempatLahir }}, {{ PendudukController::indonesianFormattedDate($pdList->tanggalLahir) }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>:</td>
        <td>{{ $pdList->alamatLengkap }}</td>
    </tr>
    <tr>
        <th>Status Perkawinan</th>
        <td>:</td>
        @if ($pdList->statusPerkawinan == 'S')
            <td>Sudah Menikah</td>
        @elseif($pdList->statusPerkawinan == 'B')
            <td>Belum Menikah</td>
        @elseif($pdList->statusPerkawinan == 'CH')
            <td>Cerai Hidup</td>
        @elseif($pdList->statusPerkawinan == 'CM')
            <td>Cerai Mati</td>
        @else
            <td>-</td>
        @endif
    </tr>
    <tr>
        <th>Agama</th>
        <td>:</td>
        @if ($pdList->agama == 'H')
            <td>Hindu</td>
        @elseif($pdList->agama == 'I')
            <td>Islam</td>
        @elseif($pdList->agama == 'KK')
            <td>Kristen Katholik</td>
        @elseif($pdList->agama == 'KP')
            <td>Kristen Protestan</td>
        @elseif($pdList->agama == 'B')
            <td>Buddha</td>
        @elseif($pdList->agama == 'KH')
            <td>Konghucu</td>
        @else
            <td>-</td>
        @endif
    </tr>
    <tr>
        <th>Pendidikan Terakhir</th>
        <td>:</td>
        @if ($pdList->pendidikanTerakhir == 'TDKSEKOLAH')
            <td>Tidak / Belum Sekolah</td>
        @elseif($pdList->pendidikanTerakhir == 'SD')
            <td>Tamat SD / Sederajat</td>
        @elseif($pdList->pendidikanTerakhir == 'SMP')
            <td>Tamat SMP / Sederajat</td>
        @elseif($pdList->pendidikanTerakhir == 'SMA')
            <td>Tamat SLTA / Sederajat</td>
        @elseif($pdList->pendidikanTerakhir == 'DIPLOMA-I')
            <td>Diploma I</td>
        @elseif($pdList->pendidikanTerakhir == 'DIPLOMA-II')
            <td>Diploma II</td>
        @elseif($pdList->pendidikanTerakhir == 'STRATA-1')
            <td>Strata I</td>
        @elseif($pdList->pendidikanTerakhir == 'STRATA-2')
            <td>Strata II</td>
        @elseif($pdList->pendidikanTerakhir == 'STRATA-3')
            <td>Strata III</td>
        @else
            <td>{{ $pdList->pendidikanTerakhir }}</td>
        @endif
    </tr>
    <tr>
        <th>Pekerjaan</th>
        <td>:</td>
        <td>{{ $pdList->pekerjaan }}</td>
    </tr>
    <tr>
        <th>Nama Ayah</th>
        <td>:</td>
        <td>{{ $pdList->namaAyah }}</td>
    </tr>
    <tr>
        <th>Nama Ibu</th>
        <td>:</td>
        <td>{{ $pdList->namaIbu }}</td>
    </tr>
</table>
@endforeach
