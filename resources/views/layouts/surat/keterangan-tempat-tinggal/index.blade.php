<?php
    use \Carbon\Carbon;

    $tanggal = Carbon::parse($surat->created_at)->locale('id');

    $tanggalLahir = Carbon::parse($pemohon->tanggalLahir)->locale('id');
?>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">

span.cls_002 {
    font-family: Times, serif;
    font-size: 22.0px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

div.cls_002 {
    font-family: Times, serif;
    font-size: 22.0px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_003 {
    font-family: Times, serif;
    font-size: 18.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

div.cls_003 {
    font-family: Times, serif;
    font-size: 18.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_004 {
    font-family: Times, serif;
    font-size: 15.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

div.cls_004 {
    font-family: Times, serif;
    font-size: 15.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_005 {
    font-family: Times, serif;
    font-size: 13.0px;
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none
}

div.cls_005 {
    font-family: Times, serif;
    font-size: 13.0px;
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none
}

span.cls_009 {
    font-family: Times, serif;
    font-size: 14.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: underline
}

div.cls_009 {
    font-family: Times, serif;
    font-size: 14.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none
}

span.cls_008 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none
}

div.cls_008 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none
}

span.cls_010 {
    font-family: Times, serif;
    font-size: 12.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: underline
}

div.cls_010 {
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
            <img src="{{ public_path().'/newBackAssets/surat/keterangan-tempat-tinggal/background1.jpg' }}" width=612
                height=936></div>
        <div style="position:absolute;left:160.82px;top:83.42px" class="cls_002"><span class="cls_002">PEMERINTAH KOTA
                DENPASAR</span></div>
        <div style="position:absolute;left:189.89px;top:108.98px" class="cls_003"><span class="cls_003">KECAMATAN
                DENPASAR TIMUR</span></div>
        <div style="position:absolute;left:253.73px;top:129.86px" class="cls_004"><span class="cls_004">DESA SUMERTA
                KAJA</span></div>
        <div style="position:absolute;left:215.93px;top:147.02px" class="cls_005"><span class="cls_005">KELIAN BANJAR
                DINAS BANJAR {{ strtoupper($pemohon->namaBanjar) }}</span></div>
        <div style="position:absolute;left:159.26px;top:217.22px" class="cls_009"><span class="cls_009">SURAT KETERANGAN
                TEMPAT TINGGAL</span></div>
        <div style="position:absolute;left:232.49px;top:233.18px" class="cls_008"><span class="cls_008">Nomor : {{ $noSurat }}</span>
        </div>
        <div style="position:absolute;left:119.78px;top:288.53px" class="cls_008"><span class="cls_008">Yang bertanda
                tangan dibawah ini Kelian Banjar Dinas Banjar {{ $pemohon->namaBanjar }}, Desa</span></div>
        <div style="position:absolute;left:85.10px;top:306.53px" class="cls_008"><span class="cls_008">Sumerta Kaja,
                Kecamatan Denpasar Timur, Kota Denpasar dengan ini menerangkan</span></div>
        <div style="position:absolute;left:85.10px;top:324.41px" class="cls_008"><span class="cls_008">bahwa :</span>
        </div>
        <div style="position:absolute;left:119.78px;top:360.29px" class="cls_008"><span class="cls_008">Nama</span>
        </div>
        <div style="position:absolute;left:245.81px;top:360.29px" class="cls_008"><span class="cls_008">: {{ $pemohon->nama }}</span></div>
        <div style="position:absolute;left:119.78px;top:381.05px" class="cls_008"><span class="cls_008">Tempat Tgl.
                Lahir</span></div>
        <div style="position:absolute;left:245.81px;top:381.05px" class="cls_008"><span class="cls_008">: {{ $pemohon->tempatLahir }}, {{ $tanggalLahir->isoFormat('Do MMMM YYYY') }}</span></div>
        <div style="position:absolute;left:119.78px;top:401.69px" class="cls_008"><span class="cls_008">Jenis
                Kelamin</span></div>
        <div style="position:absolute;left:245.81px;top:401.69px" class="cls_008"><span class="cls_008">: @if ($pemohon->jenisKelamin == 'L')
            Laki - Laki
            @elseif($pemohon->jenisKelamin == 'P')
            Perempuan
        @endif</span></div>
        <div style="position:absolute;left:119.78px;top:422.45px" class="cls_008"><span class="cls_008">Agama</span>
        </div>
        <div style="position:absolute;left:245.81px;top:422.45px" class="cls_008">
            <span class="cls_008">:
                @if ($pemohon->agama == 'H')
                    Hindu
                @elseif($pemohon->agama == 'I')
                    Islam
                @elseif($pemohon->agama == 'KK')
                    Kristen Katolik
                @elseif($pemohon->agama == 'KP')
                    Kristen Protestan
                @elseif($pemohon->agama == 'B')
                    Budha
                @elseif($pemohon->agama == 'KH')
                    Konghucu
                @endif
            </span>
        </div>
        <div style="position:absolute;left:119.78px;top:443.11px" class="cls_008"><span class="cls_008">Pekerjaan</span>
        </div>
        <div style="position:absolute;left:245.81px;top:443.11px" class="cls_008"><span class="cls_008">: {{ $pemohon->pekerjaan }}</span></div>
        <div style="position:absolute;left:119.78px;top:463.87px" class="cls_008"><span class="cls_008">Alamat</span>
        </div>
        <div style="position:absolute;left:245.81px;top:463.87px" class="cls_008"><span class="cls_008">: {{ $pemohon->alamatLengkap }}</span></div>
        <div style="position:absolute;left:119.78px;top:484.51px" class="cls_008"><span class="cls_008">No. KK</span>
        </div>
        <div style="position:absolute;left:245.81px;top:484.51px" class="cls_008"><span class="cls_008">: {{ $pemohon->noKK }}</span></div>
        <div style="position:absolute;left:258.41px;top:484.51px" class="cls_008"><span class="cls_008"></span></div>
        <div style="position:absolute;left:119.78px;top:505.27px" class="cls_008"><span class="cls_008">No,
                KTP/NIK</span></div>
        <div style="position:absolute;left:245.81px;top:505.27px" class="cls_008"><span class="cls_008">: {{ $pemohon->NIK }}</span></div>
        <div style="position:absolute;left:258.41px;top:505.27px" class="cls_008"><span class="cls_008"></span></div>
        <div style="position:absolute;left:119.78px;top:546.67px" class="cls_008"><span class="cls_008">Memang benar
                nama tersebut di atas bertempat tinggal di {{ $pemohon->alamatLengkap }}</span></div>
        <div style="position:absolute;left:85.10px;top:582.55px" class="cls_008"><span class="cls_008">Timur.</span>
        </div>
        <div style="position:absolute;left:119.78px;top:600.43px" class="cls_008"><span class="cls_008">Demikian surat
                keterangan ini kami buat dengan sebenarnya untuk dapat</span></div>
        <div style="position:absolute;left:85.10px;top:618.46px" class="cls_008"><span class="cls_008">dipergunakan
                sebagai perlengkapan administrasi .</span></div>
        <div style="position:absolute;left:326.23px;top:677.62px" class="cls_008"><span class="cls_008"></span></div>
        <div style="position:absolute;left:312.07px;top:691.42px" class="cls_008"><span class="cls_008">Kelian Banjar
                Dinas Banjar {{ $pemohon->namaBanjar }}</span></div>
        <div style="position:absolute;left:357.07px;top:760.66px" class="cls_010"><span class="cls_010">{{ $kelian->namaKelian }}</span></div>
    </div>

</body>
</html>
