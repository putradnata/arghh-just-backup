<?php
    use \Carbon\Carbon;
?>

@foreach ($fetched as $fetch)
<?php
    $tanggalKematian = Carbon::parse($fetch->tanggalKematian)->locale('id');
    $tanggalLapor = Carbon::parse($fetch->tanggalLapor)->locale('id');
?>

<table class="table" name="detailPenduduk" id="detailPenduduk">
    <tr>
        <th>Nomor KK</th>
        <td>:</td>
        <td>{{ $fetch->noKK }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>:</td>
        <td>{{ $fetch->NIK }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>:</td>
        <td>{{ $fetch->nama }}</td>
    </tr>
    <tr>
        <th>Tanggal Kematian</th>
        <td>:</td>
        <td>{{ $tanggalKematian->isoFormat('Do MMMM YYYY') }}</td>
    </tr>
    <tr>
        <th>Sebab Kematian</th>
        <td>:</td>
        <td>{{ $fetch->sebabKematian }}</td>
    </tr>
    <tr>
        <th>Tanggal Lapor</th>
        <td>:</td>
        <td>{{ $tanggalLapor->isoFormat('dddd, Do MMMM YYYY') }}</td>
    </tr>
    <tr>
        <th>Asal Banjar</th>
        <td>:</td>
        <td>{{ $fetch->namaBanjar }}</td>
    </tr>
</table>
@endforeach
