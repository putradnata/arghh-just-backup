<?php
    use \Carbon\Carbon;

    $tanggal = Carbon::parse($surat->created_at)->locale('id')
?>
<html>
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
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
    font-size: 15.1px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    font-style: normal;
    text-decoration: underline
}

div.cls_008 {
    font-family: Times, serif;
    font-size: 15.1px;
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

    <div style="position:absolute;left:50%;margin-left:-304px;top:0px;width:609px;height:935px;overflow:hidden">
        <div style="position:absolute;left:0px;top:0px">
        <img src="{{ public_path().'/newBackAssets/surat/keterangan-usaha/background1.jpg' }}" width=609 height=935></div>
        <div style="position:absolute;left:173.30px;top:68.72px" class="cls_002"><span class="cls_002">PEMERINTAH KOTA
                DENPASAR</span></div>
        <div style="position:absolute;left:186.89px;top:89.62px" class="cls_003"><span class="cls_003">KECAMATAN
                DENPASAR TIMUR</span></div>
        <div style="position:absolute;left:240.17px;top:108.10px" class="cls_004"><span class="cls_004">DESA SUMERTA
                KAJA</span></div>
        <div style="position:absolute;left:129.50px;top:124.06px" class="cls_005"><span class="cls_005">JALAN KECUBUNG
                GANG MERAK TELP. 224898, KODE POS 80236</span></div>
        <div style="position:absolute;left:192.29px;top:193.18px" class="cls_008"><span class="cls_008">SURAT KETERANGAN
                USAHA</span></div>
        <div style="position:absolute;left:227.45px;top:210.34px" class="cls_005"><span class="cls_005">Nomor : {{ $noSurat }}</span>
        </div>
        <div style="position:absolute;left:124.70px;top:265.57px" class="cls_005"><span class="cls_005">Yang bertanda
                tangan dibawah ini Kelian Banjar Dinas Banjar {{ $pemohon->namaBanjar }} Desa</span></div>
        <div style="position:absolute;left:90.02px;top:282.13px" class="cls_005"><span class="cls_005">Sumerta Kaja,
                Kecamatan Denpasar Timur, Kota Denpasar, menerangkan dengan</span></div>
        <div style="position:absolute;left:90.02px;top:298.69px" class="cls_005"><span class="cls_005">sebenarnya bahwa
                :</span></div>
        <div style="position:absolute;left:121.46px;top:329.05px" class="cls_005"><span class="cls_005">Nama
                Pemohon</span></div>
        <div style="position:absolute;left:238.13px;top:329.05px" class="cls_005"><span class="cls_005">: {{ $pemohon->nama }}</span></div>
        <div style="position:absolute;left:121.46px;top:349.81px" class="cls_005"><span class="cls_005">Alamat</span>
        </div>
        <div style="position:absolute;left:238.13px;top:349.81px" class="cls_005"><span class="cls_005">: {{ $pemohon->alamatLengkap }}</span></div>
        <div style="position:absolute;left:121.46px;top:370.45px" class="cls_005"><span class="cls_005">Nama
                Perusahaan</span></div>
        <div style="position:absolute;left:238.13px;top:370.45px" class="cls_005"><span class="cls_005">: {{ $usaha->nama }}</span></div>
        <div style="position:absolute;left:121.46px;top:391.21px" class="cls_005"><span class="cls_005">Jenis
                Usaha</span></div>
        <div style="position:absolute;left:238.13px;top:391.21px" class="cls_005"><span class="cls_005">: {{ $usaha->jenisUsaha }}</span></div>
        <div style="position:absolute;left:124.70px;top:425.53px" class="cls_005"><span class="cls_005">Memang benar
                yang bersangkutan sepanjang pengetahuan kami memiliki</span></div>
        <div style="position:absolute;left:90.02px;top:439.33px" class="cls_005"><span class="cls_005">usaha yang
                beralamat :</span></div>
        <div style="position:absolute;left:121.46px;top:467.07px" class="cls_005"><span class="cls_005">Alamat
                Usaha</span></div>
        <div style="position:absolute;left:238.13px;top:467.07px" class="cls_005"><span class="cls_005">: {{ $usaha->alamat }}</span></div>
        <div style="position:absolute;left:121.46px;top:487.83px" class="cls_005"><span
                class="cls_005">Lingkungan</span></div>
        <div style="position:absolute;left:238.13px;top:487.83px" class="cls_005"><span class="cls_005">: {{ $pemohon->namaBanjar }}</span></div>
        <div style="position:absolute;left:121.46px;top:508.47px" class="cls_005"><span class="cls_005">Desa</span>
        </div>
        <div style="position:absolute;left:238.13px;top:508.47px" class="cls_005"><span class="cls_005">: Sumerta Kaja</span></div>
        <div style="position:absolute;left:121.46px;top:529.23px" class="cls_005"><span class="cls_005">Kecamatan</span>
        </div>
        <div style="position:absolute;left:238.13px;top:529.23px" class="cls_005"><span class="cls_005">: Denpasar Timur</span></div>
        <div style="position:absolute;left:121.46px;top:549.87px" class="cls_005"><span class="cls_005">Kota</span>
        </div>
        <div style="position:absolute;left:238.13px;top:549.87px" class="cls_005"><span class="cls_005">: Denpasar</span></div>
        <div style="position:absolute;left:124.70px;top:587.07px" class="cls_005"><span class="cls_005">Demikian surat
                keterangan usaha ini kami buat agar dapat dipergunakan</span></div>
        <div style="position:absolute;left:90.02px;top:603.63px" class="cls_005"><span class="cls_005">untuk {{ $surat->keperluan }}.</span></div>
        <div style="position:absolute;left:90.02px;top:678.18px" class="cls_005"><span class="cls_005">Mengetahui</span>
        </div>
        <div style="position:absolute;left:345.19px;top:678.18px" class="cls_005"><span class="cls_005">Sumerta Kaja, {{ $tanggal->isoFormat('dddd, Do MMMM YYYY') }}
            </span></div>
        <div style="position:absolute;left:90.02px;top:691.98px" class="cls_005"><span class="cls_005">Perbekel Desa
                Sumerta Kaja</span></div>
        <div style="position:absolute;left:345.19px;top:691.98px" class="cls_005"><span class="cls_005">Kelian Banjar
                Dinas Banjar {{ $pemohon->namaBanjar }}</span></div>
        <div style="position:absolute;left:90.02px;top:761.22px" class="cls_009"><span class="cls_009"></span></div>
        <div style="position:absolute;left:342.07px;top:761.22px" class="cls_009"><span class="cls_009">{{ $kelian->namaKelian }}</span></div>
    </div>

</body>

</html>
