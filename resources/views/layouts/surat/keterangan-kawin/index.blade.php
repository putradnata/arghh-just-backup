<?php
    use \Carbon\Carbon;

    $tanggal = Carbon::parse($surat->created_at)->locale('id');

    $tanggalLahir = Carbon::parse($pemohon->tanggalLahir)->locale('id');

    $tanggalLahirIstri = Carbon::parse($istri->tanggalLahir)->locale('id');
?>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">

span.cls_002 {
    font-family: Times, serif;
    font-size: 18.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

div.cls_002 {
    font-family: Times, serif;
    font-size: 18.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_003 {
    font-family: Times, serif;
    font-size: 16.0px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

div.cls_003 {
    font-family: Times, serif;
    font-size: 16.0px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_004 {
    font-family: Times, serif;
    font-size: 14.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

div.cls_004 {
    font-family: Times, serif;
    font-size: 14.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_005 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none
}

div.cls_005 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none
}

span.cls_008 {
    font-family: Times, serif;
    font-size: 14.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: underline
}

div.cls_008 {
    font-family: Times, serif;
    font-size: 14.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_009 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: underline
}

div.cls_009 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

</style>

</head>
<body>
    <div style="position:absolute;left:50%;margin-left:-306px;top:0px;width:612px;height:936px;overflow:hidden">
        <div style="position:absolute;left:0px;top:0px">
            <img src="{{ public_path().'/newBackAssets/surat/keterangan-kawin/background1.jpg' }}" width=612 height=936>
        </div>
        <div style="position:absolute;left:174.62px;top:83.66px" class="cls_002"><span class="cls_002">PEMERINTAH KOTA
                DENPASAR</span></div>
        <div style="position:absolute;left:188.21px;top:104.54px" class="cls_003"><span class="cls_003">KECAMATAN
                DENPASAR TIMUR</span></div>
        <div style="position:absolute;left:241.37px;top:123.02px" class="cls_004"><span class="cls_004">DESA SUMERTA
                KAJA</span></div>
        <div style="position:absolute;left:130.70px;top:138.98px" class="cls_005"><span class="cls_005">JALAN KECUBUNG
                GANG MERAK TELP. 224898, KODE POS 80236</span></div>
        <div style="position:absolute;left:200.09px;top:208.10px" class="cls_008"><span class="cls_008">SURAT KETERANGAN
                KAWIN</span></div>
        <div style="position:absolute;left:232.49px;top:224.06px" class="cls_005"><span class="cls_005">Nomor : {{ $noSurat }}</span>
        </div>
        <div style="position:absolute;left:119.78px;top:279.41px" class="cls_005"><span class="cls_005">Yang bertanda
                tangan dibawah ini Kelian Banjar Dinas Banjar {{ $pemohon->namaBanjar }}, Sumerta</span></div>
        <div style="position:absolute;left:85.10px;top:297.29px" class="cls_005"><span class="cls_005">Kaja, Kecamatan
                Denpasar Timur, Kota Denpasar dengan ini menerangkan bahwa :</span></div>
        <div style="position:absolute;left:119.78px;top:328.97px" class="cls_005"><span class="cls_005">Nama</span>
        </div>
        <div style="position:absolute;left:245.81px;top:328.97px" class="cls_005"><span class="cls_005">: {{ $pemohon->nama }}</span></div>
        <div style="position:absolute;left:119.78px;top:356.57px" class="cls_005"><span class="cls_005">Tempat Tgl.
                Lahir</span></div>
        <div style="position:absolute;left:245.81px;top:356.57px" class="cls_005"><span class="cls_005">: {{ $pemohon->tempatLahir }}, {{ $tanggalLahir->isoFormat('Do MMMM YYYY') }}</span></div>
        <div style="position:absolute;left:258.41px;top:356.57px" class="cls_005"><span class="cls_005"></span></div>
        <div style="position:absolute;left:119.78px;top:384.17px" class="cls_005"><span class="cls_005">Jenis
                Kelamin</span></div>
        <div style="position:absolute;left:245.81px;top:384.17px" class="cls_005"><span class="cls_005">: @if ($pemohon->jenisKelamin == 'L')
            Laki - Laki
            @elseif($pemohon->jenisKelamin == 'P')
            Perempuan
        @endif</span></div>
        <div style="position:absolute;left:119.78px;top:411.77px" class="cls_005"><span class="cls_005">Alamat</span>
        </div>
    <div style="position:absolute;left:245.81px;top:411.77px" class="cls_005"><span class="cls_005">: {{ $pemohon->alamatLengkap }}</span></div>
        <div style="position:absolute;left:119.78px;top:439.51px" class="cls_005"><span class="cls_005">Memang benar
                orang yang namanya tersebut di atas telah melangsungkan</span></div>
        <div style="position:absolute;left:85.10px;top:457.39px" class="cls_005"><span class="cls_005">perkawinan
                dengan :</span></div>
        <div style="position:absolute;left:119.78px;top:493.15px" class="cls_005"><span class="cls_005">Nama</span>
        </div>
        <div style="position:absolute;left:245.81px;top:493.15px" class="cls_005"><span class="cls_005">: {{ $istri->nama }}</span></div>
        <div style="position:absolute;left:119.78px;top:520.75px" class="cls_005"><span class="cls_005">Tempat Tgl.
                Lahir</span></div>
        <div style="position:absolute;left:245.81px;top:520.75px" class="cls_005"><span class="cls_005">: {{ $istri->tempatLahir }}, {{ $tanggalLahirIstri->isoFormat('Do MMMM YYYY') }}</span></div>
        <div style="position:absolute;left:258.41px;top:520.75px" class="cls_005"><span class="cls_005"></span></div>
        <div style="position:absolute;left:119.78px;top:548.35px" class="cls_005"><span class="cls_005">Jenis
                Kelamin</span></div>
        <div style="position:absolute;left:245.81px;top:548.35px" class="cls_005"><span class="cls_005">: @if ($istri->jenisKelamin == 'L')
            Laki - Laki
            @elseif($istri->jenisKelamin == 'P')
            Perempuan
        @endif</span></div>
        <div style="position:absolute;left:119.78px;top:575.95px" class="cls_005"><span class="cls_005">Alamat</span>
        </div>
        <div style="position:absolute;left:245.81px;top:575.95px" class="cls_005"><span class="cls_005">: {{ $istri->alamatLengkap }}</span></div>
        <div style="position:absolute;left:119.78px;top:621.70px" class="cls_005"><span class="cls_005">Demikian surat
                keterangan ini kami buat dengan sebenarnya untuk dapat</span></div>
        <div style="position:absolute;left:85.10px;top:639.58px" class="cls_005"><span class="cls_005">dipergunakan
                perlengkapan proses pembuatan Akta Kelahiran.</span></div>
        <div style="position:absolute;left:326.23px;top:684.94px" class="cls_005"><span class="cls_005">Denpasar, {{ $tanggal->isoFormat('dddd, Do MMMM YYYY') }}
            </span></div>
        <div style="position:absolute;left:97.46px;top:698.74px" class="cls_005"><span class="cls_005">Perbekel Desa
                Sumerta Kaja</span></div>
        <div style="position:absolute;left:312.07px;top:698.74px" class="cls_005"><span class="cls_005">Kelian Banjar
                Dinas Banjar {{ $pemohon->namaBanjar }}</span></div>
        <div style="position:absolute;left:108.38px;top:767.98px" class="cls_009"><span class="cls_009"></span></div>
        <div style="position:absolute;left:357.07px;top:767.98px" class="cls_009"><span class="cls_009">{{ $kelian->namaKelian }}</span></div>
    </div>

</body>

</html>
