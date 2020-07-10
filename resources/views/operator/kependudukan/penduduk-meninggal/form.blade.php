@extends('layouts.base')

@section('contentHere')
    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                <div class="custom-title">Data Penduduk</div>
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
            @if(!isset($pendudukFind->NIK))
                <form method="POST" action="{{ route('penduduk-meninggal.store') }}" class="form form-responsive">
            @else
                <form method="POST" action="#" class="form form-responsive">
                    @method('put')
            @endif

            @csrf
                <div class="form-group col-sm-6">
                    <label for="namaPenduduk">Nama Penduduk</label>
                    <select class="form-control" id="namaPenduduk" name="namaPenduduk">
                        <option hidden value=""> ------</option>
                        @foreach ($penduduk as $pdk)
                            <option value="{{ $pdk->NIK }}">{{ $pdk->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="detailPenduduk" class="fetched-data col-12"></div>

                <div class="form-group col-sm-2">
                    <label for="tanggalKematian">Tanggal Kematian</label>
                    <input type="text" name="tanggalKematian" id="tanggalKematian" class="form-control" readonly>
                </div>

                <div class="form-group col-sm-4">
                    <label for="sebabKematian">Sebab Kematian</label>
                    <input type="text" class="form-control" name="sebabKematian" id="sebabKematian">
                </div>

                <button class="btn btn-secondary reset" type="reset" data-dismiss="modal">Ulang</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('scriptPlace')
{{-- init select --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("#namaPenduduk").select2();
    });
</script>

<!-- Init Zebra Date Picker -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#tanggalKematian").Zebra_DatePicker();
    });
</script>

{{-- change when kelaurga click --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("#namaPenduduk").change(function(){
            var nikPassed = $("#namaPenduduk").val();

            $.get('/operator/penduduk-meninggal/fetchData/'+nikPassed, function(data){
                $(".fetched-data").html(data);
            });
        });
    });
</script>
@endsection
