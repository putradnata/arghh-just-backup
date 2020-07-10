<?php
    use \Carbon\Carbon;
?>
@foreach ($fetched as $data)

<?php $tanggal = Carbon::parse($data->tanggalLahir)->locale('id') ?>

    <table class="table table-responsive table-striped table-sm">
        <thead></thead>
        <tbody>
            <tr>
                <td width="20%">
                    <strong>NIK</strong>
                </td>
                <td>:</td>
                <td width="80%">{{ $data->NIK }}</td>
            </tr>
            <tr>
                <td>
                    <strong>Nomor KK</strong>
                </td>
                <td>:</td>
                <td>{{ $data->noKK }}</td>
            </tr>
            <tr>
                <td>
                    <strong>Nama Lengkap</strong>
                </td>
                <td>:</td>
                <td>{{ $data->nama }}</td>
            </tr>
            <tr>
                <td>
                    <strong>Tempat, Tanggal Lahir</strong>
                </td>
                <td>:</td>
                <td>{{ $data->tempatLahir }}, {{$tanggal->isoFormat('Do MMMM YYYY')}}</td>
            </tr>
            <tr>
                <td>
                    <strong>Jenis Kelamin</strong>
                </td>
                <td>:</td>
                @if ($data->jenisKelamin == "L")
                    <td>Laki - laki</td>
                @elseif($data->jenisKelamin == "P")
                    <td>Perempuan</td>
                @endif
            </tr>
            <tr>
                <td>
                    <strong>Alamat Lengkap</strong>
                </td>
                <td>:</td>
                <td>{{ $data->alamatLengkap }}</td>
            </tr>
        </tbody>
    </table>
@endforeach
