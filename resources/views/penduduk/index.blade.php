@extends('layouts.base')

@section('addressTitle','Dashboard Penduduk')

@section('contentHere')
<div class="row">
    <!-- Ajukan Surat -->
    <div class="col-xl-6 col-md-6">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Pengajuan Surat Surat</div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success successAlert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-success errorAlert">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <p class="text-muted">Silahkan ajukan surat melalui form berikut.</p>
                <form method="POST" action="{{ route('pengajuan-surat.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="pemohon">Pemohon</label>
                        <select class="form-control" id="pemohon" name="pemohon">
                            @foreach ($keluarga as $klrg)
                                <option value="{{ $klrg->NIK }}">{{ $klrg->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="fetched-data">

                    </div>
                    <div class="form-group">
                        <label for="suratDiajukan">Surat yang Diajukan</label>
                        <select class="form-control" id="suratDiajukan" name="suratDiajukan">
                            <option hidden> ---</option>
                            @foreach ($surat as $jenisSurat)
                                <option value="{{ $jenisSurat->id }}">{{ $jenisSurat->jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="detailUsaha">
                        <input class="form-control" id="sktu" name="sktu" type="hidden">

                        <div class="form-group">
                            <label for="namaUsaha">Nama Usaha</label>
                            <input class="form-control" id="namaUsaha" name="namaUsaha" type="text">
                        </div>

                        <div class="form-group">
                            <label for="jenisUsaha">Jenis Usaha</label>
                            <input class="form-control" id="jenisUsaha" name="jenisUsaha" type="text">
                        </div>

                        <div class="form-group">
                            <label for="alamatUsaha">Alamat Usaha</label>
                            <input class="form-control" id="alamatUsaha" name="alamatUsaha" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Fotokopi Kartu Keluarga (KK)</label>
                        <input type="file" class="form-control-file" id="fileKK" name="fileKK">
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-purple">Ajukan</button>
                        <button type="reset" class="btn btn-outline-secondary reset">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptPlace')
    {{-- init default view --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#detailUsaha").attr('hidden',true);
        });
    </script>

    {{-- init select for keluarga --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pemohon").select2();
        });
    </script>

    {{-- init select for surat --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#suratDiajukan").select2();
        });
    </script>

    {{-- change when kelaurga click --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pemohon").change(function(){
                var nikPassed = $("#pemohon").val();

                $.get('/penduduk/fetchData/'+nikPassed, function(data){
                    $(".fetched-data").html(data);
                });
            });
        });
    </script>

    {{-- change when surat = Keterangan usaha --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#suratDiajukan").change(function(){
                var idSurat = $("#suratDiajukan").select2('data');
                var extractedData = idSurat[0].text;

                if(extractedData == "Surat Keterangan Usaha"){
                    $("#detailUsaha").attr('hidden',false);
                    $("#sktu").val("Surat Keterangan Usaha");
                }else{
                    $("#detailUsaha").attr('hidden',true);
                }
            });
        });
    </script>

@endsection
