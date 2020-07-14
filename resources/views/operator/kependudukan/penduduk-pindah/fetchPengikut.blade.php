

    <table class="table table-responsive table-striped table-sm">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>NIK</th>
                <th width="50%">Nama Lengkap</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @if ($fetched->isEmpty())
                <td><input type="hidden" name="noKK" value="{{ $getKK }}"></td>
                <td colspan="5" align="center">Tidak Ada Anggota Keluarga</td>
            @else
                @foreach ($fetched as $data)
                <tr>
                    <td><input type="hidden" name="noKK" value="{{ $data->noKK }}"></td>
                    <td><input type="checkbox" name="pindah[]" value="{{ $data->NIK }}"></td>
                    <td>{{ $data->NIK }}</td>
                    <td>{{ $data->nama }}</td>
                    @if ($data->jenisKelamin == "L")
                        <td>Laki - laki</td>
                    @elseif($data->jenisKelamin == "P")
                        <td>Perempuan</td>
                    @endif
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

