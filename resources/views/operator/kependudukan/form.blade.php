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
            <form method="POST" action="{{ route('kependudukan.store') }}">
                @else
                <form method="POST" action="{{ route('kependudukan.update', $pendudukFind->NIK) }}">
                    @method('put')
                    @endif

                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="nik">Nomor Induk Kependudukan</label>
                            <input class="form-control @error('nikpenduduk') is-invalid @enderror" id="nik"
                                name="nikpenduduk" type="text" placeholder="NIK" autofocus value="{{ old('nikpenduduk', $request->NIK) }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nokk">Nomor Kartu Keluarga</label>
                            <input class="form-control" id="noKK" name="noKK" type="text"
                                placeholder="Nomor Kartu Keluarga" value="{{ old('noKK', $request->noKK) }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="namaLengkap">Nama Lengkap</label>
                            <input class="form-control" id="namaLengkap" name="namaLengkap" type="text"
                                placeholder="Nama Lengkap Penduduk" value="{{ old('namaLengkap',$request->nama) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input jenisKelamin check-red" id="lakiLaki" type="radio"
                                        value="L" name="jenisKelamin" {{ old('jenisKelamin') == 'L' ? "checked" : $request->jenisKelamin == 'L' ? "checked" : "" }}>
                                    <label class="form-check-label" for="lakiLaki"><label class="mr-2"></label> Laki -
                                        laki</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input jenisKelamin check-red" id="perempuan" type="radio"
                                        value="P" name="jenisKelamin" {{ old('jenisKelamin')  == 'P' ? "checked" : $request->jenisKelamin == 'P' ? "checked" : "" }}>
                                    <label class="form-check-label" for="perempuan"><label class="mr-2"></label>
                                        Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="street">Status Perkawinan</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check-red" id="sudahMenikah" type="radio" value="S"
                                        name="statusPerkawinan" {{ old('statusPerkawinan') == 'S' ? "checked" :  $request->statusPerkawinan == 'S' ? "checked" : "" }}>
                                    <label class="form-check-label" for="sudahMenikah"><label class="mr-2"></label>
                                        Sudah Menikah</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="belumMenikah" type="radio" value="B"
                                        name="statusPerkawinan" {{ old('statusPerkawinan') == 'B' ? "checked" : $request->statusPerkawinan == 'B' ? "checked" : "" }}>
                                    <label class="form-check-label" for="belumMenikah"><label class="mr-2"></label>
                                        Belum Menikah</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="ceraiHidup" type="radio" value="CH"
                                        name="statusPerkawinan" {{ old('statusPerkawinan') == 'CH' ? "checked" : $request->statusPerkawinan == 'CH' ? "checked" : "" }}>
                                    <label class="form-check-label" for="ceraiHidup"><label class="mr-2"></label>
                                        Cerai Hidup</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="ceraiMati" type="radio" value="CM"
                                        name="statusPerkawinan" {{ old('statusPerkawinan') == 'CM' ? "checked" : $request->statusPerkawinan == 'CM' ? "checked" : "" }}>
                                    <label class="form-check-label" for="ceraiMati"><label class="mr-2"></label>
                                        Cerai Mati</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="statusKeluarga">Status dalam Keluarga</label>
                            <div class="col-md-12 col-form-label">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check-red" id="kepalaKeluarga" type="radio"
                                        value="KK" name="statusKeluarga" {{ old('statusKeluarga') == 'KK' ? "checked" : $request->kedudukanKeluarga == 'KK' ? "checked" : "" }}>
                                    <label class="form-check-label" for="kepalaKeluarga"><label class="mr-2"></label>
                                        Kepala Keluarga</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="istri" type="radio" value="I"
                                        name="statusKeluarga" {{ old('statusKeluarga') == 'I' ? "checked" : $request->kedudukanKeluarga == 'I' ? "checked" : "" }}>
                                    <label class="form-check-label" for="istri"><label class="mr-2"></label>
                                        Istri</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="anakKandung" type="radio" value="AK"
                                        name="statusKeluarga" {{ old('statusKeluarga') == 'AK' ? "checked" : $request->kedudukanKeluarga == 'AK' ? "checked" : "" }}>
                                    <label class="form-check-label" for="anakKandung"><label class="mr-2"></label> Anak
                                        Kandung</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="orangTua" type="radio" value="OT"
                                        name="statusKeluarga" {{ old('statusKeluarga') == 'OT' ? "checked" : $request->kedudukanKeluarga == 'OT' ? "checked" : "" }}>
                                    <label class="form-check-label check-red" for="orangTua"><label
                                            class="mr-2"></label> Orang Tua</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input check-red" id="familiLain" type="radio" value="FL"
                                        name="statusKeluarga" {{ old('statusKeluarga') == 'FL' ? "checked" : $request->kedudukanKeluarga == 'FL' ? "checked" : "" }}>
                                    <label class="form-check-label check-red" for="familiLain"><label
                                            class="mr-2"></label> Famili Lain</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="tempatLahir">Tempat Lahir</label>
                            <input class="form-control" type="text" id="tempatLahir" name="tempatLahir"
                                placeholder="Tempat Lahir" value="{{ old('tempatLahir',$request->tempatLahir) }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="tanggalLahir">Tanggal Lahir</label>
                            <input class="form-control" id="tanggalLahir" name="tanggalLahir" type="text" value="{{ old('tanggalLahir',$request->tanggalLahir) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="namaAyah">Nama Ayah</label>
                            <input class="form-control" type="text" id="namaAyah" name="namaAyah"
                                placeholder="Nama Ayah" value="{{ old('namaAyah',$request->namaAyah) }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="namaIbu">Nama Ibu</label>
                            <input class="form-control" id="namaIbu" name="namaIbu" type="text" placeholder="Nama Ibu" value="{{ old('namaIbu',$request->namaIbu) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="street">Agama</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input check-red" id="hindu" type="radio" value="H"
                                    name="agama" {{ old('agama') == 'H' ? "checked" : $request->agama == 'H' ? "checked" : "" }}>
                                <label class="form-check-label" for="hindu"><label class="mr-2"></label>Hindu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input check-red" id="islam" type="radio" value="I"
                                    name="agama" {{ old('agama') == 'I' ? "checked" : $request->agama == 'I' ? "checked" : "" }}>
                                <label class="form-check-label" for="islam"><label class="mr-2"></label>Islam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input check-red" id="kristenKatolik" type="radio" value="KK"
                                    name="agama" {{ old('agama') == 'KK' ? "checked" : $request->agama == 'KK' ? "checked" : "" }}>
                                <label class="form-check-label" for="kristenKatolik"><label class="mr-2"></label>Kristen
                                    Katolik</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input check-red" id="kristenProtestan" type="radio" value="KP"
                                    name="agama" {{ old('agama') == 'KP' ? "checked" : $request->agama == 'KP' ? "checked" : "" }}>
                                <label class="form-check-label" for="kristenProtestan"><label
                                        class="mr-2"></label>Kristen Protestan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input check-red" id="budha" type="radio" value="B"
                                    name="agama" {{ old('agama') == 'B' ? "checked" : $request->agama == 'B' ? "checked" : "" }}>
                                <label class="form-check-label" for="budha"><label class="mr-2"></label>Budha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input check-red" id="konghucu" type="radio" value="KH"
                                    name="agama" {{ old('agama') == 'KH' ? "checked" : $request->agama == 'KH' ? "checked" : "" }}>
                                <label class="form-check-label" for="konghucu"><label
                                        class="mr-2"></label>Konghucu</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                            <select class="form-control" id="pendidikanTerakhir" name="pendidikanTerakhir">
                                <option value=""> ------</option>
                                <option value="TDKSEKOLAH" {{ old('pendidikanTerakhir') == 'TDKSEKOLAH' ? "selected" : $request->pendidikanTerakhir == "TDKSEKOLAH" ? "selected" : "" }}>Tidak Sekolah</option>
                                <option value="SD" {{ old('pendidikanTerakhir') == 'SD' ? "selected" : $request->pendidikanTerakhir == "SD" ? "selected" : "" }}>Sekolah Dasar</option>
                                <option value="SMP" {{ old('pendidikanTerakhir') == 'SMP' ? "selected" : $request->pendidikanTerakhir == "SMP" ? "selected" : "" }}>Sekolah Menengah Pertama</option>
                                <option value="SMA" {{ old('pendidikanTerakhir') == 'SMA' ? "selected" : $request->pendidikanTerakhir == "SMA" ? "selected" : "" }}>Sekolah Menengah Atas</option>
                                <option value="SMK" {{ old('pendidikanTerakhir') == 'SMK' ? "selected" : $request->pendidikanTerakhir == "SMK" ? "selected" : "" }}>Sekolah Menengah Kejuruan</option>
                                <option value="DIPLOMA-I" {{ old('pendidikanTerakhir') == 'DIPLOMA-I' ? "selected" : $request->pendidikanTerakhir == "DIPLOMA-I" ? "selected" : "" }}>Diploma I</option>
                                <option value="DIPLOMA-II" {{ old('pendidikanTerakhir') == 'DIPLOMA-II' ? "selected" : $request->pendidikanTerakhir == "DIPLOMA-II" ? "selected" : "" }}>Diploma II</option>
                                <option value="DIPLOMA-III" {{ old('pendidikanTerakhir') == 'DIPLOMA-III' ? "selected" : $request->pendidikanTerakhir == "DIPLOMA-III" ? "selected" : "" }}>Diploma III</option>
                                <option value="STRATA-1" {{ old('pendidikanTerakhir') == 'STRATA-1' ? "selected" : $request->pendidikanTerakhir == "STRATA-1" ? "selected" : "" }}>Strata I</option>
                                <option value="STRATA-2" {{ old('pendidikanTerakhir') == 'STRATA-2' ? "selected" : $request->pendidikanTerakhir == "STRATA-2" ? "selected" : "" }}>Strata II</option>
                                <option value="STRATA-3" {{ old('pendidikanTerakhir') == 'STRATA-3' ? "selected" : $request->pendidikanTerakhir == "STRATA-3" ? "selected" : "" }}>Strata III</option>
                                <option value="lainnya" {{ old('pendidikanTerakhir') == 'lainnya' ? "selected" : $request->pendidikanTerakhir == "lainnya" ? "selected" : "" }}>Lain - lain</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input class="form-control" id="pekerjaan" name="pekerjaan" type="text"
                                placeholder="Pekerjaan" value="{{ old('pekerjaan', $request->pekerjaan) }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="street">Kebutuhan Khusus</label>
                            <small><i>Biarkan Kosong Bila Tidak Terdapat Kebutuhan Khusus</i></small>
                                <input class="form-control" id="kebutuhanKhusus" type="text" name="kebutuhanKhusus" value="{{ old('kebutuhanKhusus', $request->kebutuhanKhusus) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4 pendidikanLainnya">
                            <label for="pendidikanLainnya">Lainnya</label>
                            @if(($request->pendidikanTerakhir == 'TDKSEKOLAH')||($request->pendidikanTerakhir == 'SD')||($request->pendidikanTerakhir == 'SMP')||($request->pendidikanTerakhir == 'SMA')||($request->pendidikanTerakhir == 'SMK')||($request->pendidikanTerakhir == 'DIPLOMA-I')||($request->pendidikanTerakhir == 'DIPLOMA-II')||($request->pendidikanTerakhir == 'DIPLOMA-III')||($request->pendidikanTerakhir == 'STRATA-1')||($request->pendidikanTerakhir == 'STRATA-2')||($request->pendidikanTerakhir == 'STRATA-3'))
                            <input class="form-control" id="pendidikanLainnya" type="text" name="pendidikanLainnya" value="">
                            @else
                                <input class="form-control" id="pendidikanLainnya" type="text" name="pendidikanLainnya" value="{{ old('pendidikanLainnya',$request->pendidikanTerakhir) }}">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="alamatPenduduk">Alamat</label>
                            <textarea class="form-control" name="alamatPenduduk" id="alamatPenduduk"
                                placeholder="Alamat Lengkap">{{ old('alamatPenduduk',$request->alamatLengkap) }}</textarea>
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="street">Banjar</label>
                            <div class="col-md-9 col-form-label">
                                @foreach ($banjar as $bjr)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input check-red" id="{{ $bjr->nama }}" type="radio" value="{{ $bjr->id }}"
                                            name="banjar" {{ old('banjar') == $bjr->id ? "checked" : $request->idBanjar == $bjr->id ? "checked" : "" }}>
                                        <label class="form-check-label" for="{{ $bjr->nama }}"> <label class="mr-2"></label>{{ $bjr->nama }}</label>

                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="form-group col-sm-2">
                            <label for="street">Rumah Tangga Miskin</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input check-red" id="rumahTanggaMiskin" type="radio" value="Y"
                                        name="rumahTanggaMiskin" {{ old('rumahTanggaMiskin') == 'Y' ? "checked" : $request->rumahTanggaMiskin == 'Y' ? "checked" : "" }}>
                                    <label class="form-check-label" for="rumahTanggaMiskin"> <label class="mr-2"></label>Ya</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>


                    <button class="btn btn-secondary reset" type="reset" data-dismiss="modal">Ulang</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
        </div>
    </div>
@endsection

@section('scriptPlace')
<!-- Form Customization -->
<script>
    // Init Hidden
    $(".pendidikanLainnya").attr('hidden', true);

    // when pendidikan lainnya not null
    if($("#pendidikanTerakhir").val() == ""){
        $(".pendidikanLainnya").attr('hidden', false);
    }

    $(document).ready(function () {
        $("#pendidikanTerakhir").change(function () {
            var pendidikanTerakhir = $("#pendidikanTerakhir").val();

            if (pendidikanTerakhir == "lainnya")
                $(".pendidikanLainnya").attr('hidden', false);
            else
                $(".pendidikanLainnya").attr('hidden', true);
        });
    });


    $(document).ready(function () {
        $(".reset").click(function () {
            $(".pendidikanLainnya").attr('hidden', true);
        });
    });
</script>

<!-- Init iCheck -->
<script type="text/javascript">
$(document).ready(function(){
    $('.check-red').iCheck({
        //checkboxClass: 'icheckbox_square-red',
        radioClass: 'iradio_square-red',
        increaseArea: '20%' // optional
    });
});
</script>

<!-- Init Zebra Date Picker -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#tanggalLahir").Zebra_DatePicker();
    });
</script>
@endsection
