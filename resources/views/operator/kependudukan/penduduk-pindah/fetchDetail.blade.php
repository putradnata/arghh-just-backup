<?php
    use \Carbon\Carbon;
?>

@foreach ($fetched as $fetch)
<?php
    $tanggalPindah = Carbon::parse($fetch->tanggalPindah)->locale('id');
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
        <th>Tanggal Pindah</th>
        <td>:</td>
        <td>{{ $tanggalPindah->isoFormat('Do MMMM YYYY') }}</td>
    </tr>
    <tr>
        <th>Alamat Pindah</th>
        <td>:</td>
        <td>{{ $fetch->alamatPindah }}</td>
    </tr>
    <tr>
        <th>Alasan Pindah</th>
        <td>:</td>
        <td>{{ $fetch->alasanPindah }}</td>
    </tr>
@endforeach
    <tr>
        <th>Pengikut</th>
        <td>:</td>
        <td>
        @for ($z = 0; $z < count($fetchPengikut); $z++)
                <ul style="list-style: none; margin-left:-8%;">
                    <li>{{ $fetchPengikut[$z]->nama }}</li>
                </ul>
        @endfor
        </td>

    </tr>
</table>
