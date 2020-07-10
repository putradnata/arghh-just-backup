@extends('layouts.base')

@section('contentHere')
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                <div class="custom-title">Penduduk Pindah</div>
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
            <form method="POST" action="{{ route('kependudukan.store') }}">
                @else
                <form method="POST" action="{{ route('kependudukan.update', $pendudukFind->NIK) }}">
                    @method('put')
                    @endif --}}
                <form method="POST" action="{{ route('penduduk-pindah.store') }}">
                    @csrf

                        <div class="form-group col-6">
                            <label for="namaLengkap">Nama Penduduk</label>
                            <select name="namaLengkap" id="namaLengkap" class="form-control">
                                <option hidden> ---</option>
                                @foreach ($penduduk as $pdk)
                                    <option value="{{ $pdk->NIK }}">{{ $pdk->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-2">
                            <label for="tanggalPindah">Tanggal Pindah</label>
                            <input type="text" class="form-control" name="tanggalPindah" id="tanggalPindah" readonly>
                        </div>

                        <div class="form-group col-4">
                            <label for="alasanPindah">Alasan Kepindahan</label>
                            <input type="text" class="form-control" name="alasanPindah">
                        </div>

                        <div class="form-group col-5">
                            <label for="alamatPindah">Alamat Pindah</label>
                            <textarea type="text" class="form-control" name="alamatPindah"></textarea>
                        </div>

                        <div class="form-group col-12">
                            <label for="pengikut">Pengikut</label>
                            <div id="pengikut" class="fetched-data"></div>
                        </div>


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
        $("#namaLengkap").select2();
    });
</script>

<!-- Init Zebra Date Picker -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#tanggalPindah").Zebra_DatePicker();
    });
</script>

{{-- change when kelaurga click --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("#namaLengkap").change(function(){
            var nikPassed = $("#namaLengkap").val();

            $.get('/operator/penduduk-pindah/fetchPengikut/'+nikPassed, function(data){
                $(".fetched-data").html(data);
            });
        });
    });
</script>
@endsection
