<?php
    use \Carbon\Carbon;

    $tanggal = Carbon::parse($surat->created_at)->locale('id');

    $tanggalLahir = Carbon::parse($pemohon->tanggalLahir)->locale('id');

    $tanggalLahirIstri = Carbon::parse($istri->tanggalLahir)->locale('id');
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>SURAT KETERANGAN BELUM KAWIN</TITLE>
<META name="generator" content="BCL easyConverter SDK 5.0.210">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 67px 0px 178px 68px;padding: 0px;border: none;width: 748px;}

#page_1 #p1dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:672px;height:122px;}
#page_1 #p1dimg1 #p1img1 {width:672px;height:122px;}

.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

.ft0{font: bold 29px 'Times New Roman';line-height: 32px;}
.ft1{font: bold 24px 'Times New Roman';line-height: 26px;}
.ft2{font: bold 20px 'Times New Roman';line-height: 23px;}
.ft3{font: 17px 'Times New Roman';line-height: 19px;}
.ft4{font: bold 19px 'Times New Roman';text-decoration: underline;line-height: 22px;}
.ft5{font: 16px 'Times New Roman';line-height: 19px;}
.ft6{font: 16px 'Times New Roman';line-height: 22px;}
.ft7{font: 1px 'Times New Roman';line-height: 1px;}
.ft8{font: italic 16px 'Times New Roman';text-decoration: underline;line-height: 21px;}
.ft9{font: 16px 'Times New Roman';line-height: 21px;}
.ft10{font: bold 16px 'Times New Roman';text-decoration: underline;line-height: 19px;}

.p0{text-align: left;padding-left: 123px;margin-top: 9px;margin-bottom: 0px;}
.p1{text-align: left;padding-left: 161px;margin-top: 2px;margin-bottom: 0px;}
.p2{text-align: left;padding-left: 247px;margin-top: 1px;margin-bottom: 0px;}
.p3{text-align: left;padding-left: 196px;margin-top: 0px;margin-bottom: 0px;}
.p4{text-align: left;padding-left: 180px;margin-top: 56px;margin-bottom: 0px;}
.p5{text-align: left;padding-left: 264px;margin-top: 0px;margin-bottom: 0px;}
.p6{text-align: left;padding-left: 83px;padding-right: 114px;margin-top: 54px;margin-bottom: 0px;text-indent: 46px;}
.p7{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p8{text-align: left;padding-left: 42px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p9{text-align: left;padding-left: 16px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 13px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: justify;padding-left: 83px;padding-right: 114px;margin-top: 37px;margin-bottom: 0px;text-indent: 46px;}
.p12{text-align: justify;padding-left: 83px;padding-right: 115px;margin-top: 6px;margin-bottom: 0px;text-indent: 46px;}
.p13{text-align: left;padding-left: 409px;margin-top: 79px;margin-bottom: 0px;}
.p14{text-align: left;padding-left: 382px;margin-top: 0px;margin-bottom: 0px;}
.p15{text-align: left;padding-left: 446px;margin-top: 73px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 182px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 20px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 349px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 369px;vertical-align: bottom;}

.tr0{height: 22px;}
.tr1{height: 42px;}
.tr2{height: 37px;}
.tr3{height: 36px;}
.tr4{height: 38px;}

.t0{width: 551px;margin-left: 83px;font: 16px 'Times New Roman';}

</STYLE>
</HEAD>

<BODY>
<DIV id="page_1">
<DIV id="p1dimg1">
<IMG src="header.jpg" id="p1img1"></DIV>


<DIV class="dclr"></DIV>
<P class="p0 ft0">PEMERINTAH KOTA DENPASAR</P>
<P class="p1 ft1">KECAMATAN DENPASAR TIMUR</P>
<P class="p2 ft2">DESA SUMERTA KAJA</P>
<P class="p3 ft3">KELIAN BANJAR DINAS BANJAR SIMA</P>
<P class="p4 ft4">SURAT KETERANGAN BELUM KAWIN</P>
<P class="p5 ft5">Nomor : {{ $noSurat }}</P>
<P class="p6 ft6">Yang bertanda tangan dibawah ini Kelian Banjar Dinas Banjar {{ $pemohon->namaBanjar }}, Desa Sumerta Kaja, Kecamatan Denpasar Timur, Kota Denpasar dengan ini</P>
<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD class="tr0 td0"><P class="p7 ft5">menerangkan bahwa :</P></TD>
	<TD class="tr0 td1"><P class="p7 ft7">&nbsp;</P></TD>
	<TD class="tr0 td2"><P class="p7 ft7">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr1 td0"><P class="p8 ft5">Nama</P></TD>
	<TD colspan=2 class="tr1 td3"><P class="p9 ft5">: {{ $pemohon->nama }}</P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p8 ft5">Tempat/Tgl. Lahir</P></TD>
	<TD colspan=2 class="tr2 td3"><P class="p9 ft5">: {{ $pemohon->tempatLahir }}, {{ $tanggalLahir->isoFormat('Do MMMM YYYY') }}</P></TD>
</TR>
<TR>
	<TD class="tr3 td0"><P class="p8 ft5">Agama</P></TD>
	<TD colspan=2 class="tr3 td3"><P class="p9 ft5">: HINDU</P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p8 ft5">Jenis Kelamin</P></TD>
	<TD colspan=2 class="tr2 td3"><P class="p9 ft5">: PEREMPUAN</P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p8 ft5">Kebangsaan</P></TD>
	<TD colspan=2 class="tr2 td3"><P class="p9 ft5">: INDONESIA</P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p8 ft5">Pekerjaan</P></TD>
	<TD class="tr2 td1"><P class="p9 ft5">:</P></TD>
	<TD class="tr2 td2"><P class="p10 ft5">-</P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p8 ft5">Alamat</P></TD>
	<TD colspan=2 class="tr2 td3"><P class="p9 ft5">: {{ $pemohon->alamatLengkap }}</P></TD>
</TR>
<TR>
	<TD class="tr3 td0"><P class="p8 ft5">No. KK</P></TD>
	<TD class="tr3 td1"><P class="p9 ft5">:</P></TD>
	<TD class="tr3 td2"><P class="p10 ft5">{{ $pemohon->noKK }}</P></TD>
</TR>
<TR>
	<TD class="tr4 td0"><P class="p8 ft5">No. KTP</P></TD>
	<TD class="tr4 td1"><P class="p9 ft5">:</P></TD>
	<TD class="tr4 td2"><P class="p10 ft5">{{ $pemohon->NIK }}</P></TD>
</TR>
</TABLE>
<P class="p11 ft9">Sepanjang pengetahuan kami memang benar orang yang namanya tersebut di atas berstatus <SPAN class="ft8">belum kawin</SPAN>.</P>
<P class="p12 ft9">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan dimana perlu.</P>
<P class="p13 ft5">Denpasar, {{ $tanggal->isoFormat('dddd, Do MMMM YYYY') }}</P>
<P class="p14 ft5">Kelihan Banjar Dinas Banjar {{ $pemohon->namaBanjar }}</P>
<P class="p15 ft10">{{ $kelian->namaKelian }}</P>
</DIV>
</BODY>
</HTML>
