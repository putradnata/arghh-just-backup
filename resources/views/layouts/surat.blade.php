<html>
    <head>
        <link rel="stylesheet" href="{{ asset('suratAssets/960.css') }}" type="text/css" media="screen">
		<link rel="stylesheet" href="{{ asset('suratAssets/screen.css') }}" type="text/css" media="screen" />
		<link rel="stylesheet" href="{{ asset('suratAssets/print-preview.css') }}" type="text/css" media="screen">
		<link rel="stylesheet" href="{{ asset('suratAssets/print.css') }}" type="text/css" media="print" />
        <link rel="shortcut icon" href="#"/>
		<link rel="shortcut icon" href="#"/>
		<script src="{{ asset('suratAssets/jquery.tools.min.js') }}"></script>
		<script src="{{ asset('suratAssets/jquery.print-preview.js') }}" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript">
			$(function()
			{
				$("#feature > div").scrollable({interval: 2000}).autoscroll();

				$('#aside').prepend('<a class="print-preview">Cetak </a>');
				$('a.print-preview').printPreview();

				//$(document).bind('keydown', function(e) {
				var code = 80;
				//if (code == 80 && !$('#print-modal').length) {
				$.printPreview.loadPrintPreview();
				//return false;
				//}
				//});
			});
        </script>
    </head>
	<body>
		<div id="content" class="container_12 clearfix">
			<div id="content-main" class="grid_7">
				<link href="{{ asset('suratAssets/surat.css') }}" rel="stylesheet" type="text/css" />
				<div>
					<table width="100%">
						<div class="header">
                            <img src="{{ asset('suratAssets/images/kop_surat.png') }}">
                        </div>

						<div align="center"><u><h4 class="kop">SURAT TEST</h4></u></div>
						<div align="center"><h4 class="kop">Nomor : </h4></div>
					</table>
					<table width="100%">
						<td class="indentasi">Yang bertanda tangan dibawah ini, saya Kepala Dusun [nama Banjar], Desa Sumerta Kaja,
                            Denpasar Timur, Denpasar, dengan ini menerangkan bahwa: </td></tr>
					</table>
					<div id="isi3">
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr><td>
							<table width="100%">
								<tr><td width="20%">Nama Lengkap</td><td width="2%">:</td><td width="64%"></td></tr>
								<tr><td>Nomor KTP</td><td>:</td><td></td></tr>
								<tr><td>Tempat dan Tgl. Lahir </td><td>:</td><td> , </td></tr>
								<tr><td>Jenis Kelamin</td><td>:</td><td></td></tr>
								<tr><td>Alamat/ Tempat Tinggal</td><td>:</td><td>RT., RW. , Dusun , Desa , Kec. , Kab. </td></tr>
								<tr><td>Agama</td><td>:</td><td></td></tr>
								<tr><td>Status</td><td>:</td><td></td></tr>
								<tr><td>Pendidikan</td><td>:</td><td></td></tr>
								<tr><td>Pekerjaan</td><td>:</td><td></td></tr>
								<tr><td>Kewarganegaraan </td><td>:</td><td></td></tr>
								<tr><td>Keterangan </td><td>:</td><td> </td></tr>
								<tr><td>Keperluan </td><td>:</td><td> </td></tr>
								<tr><td>Berlaku mulai </td><td>:</td><td>sampai dengan  </td></tr>
							</table>
							<table width="100%">
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr><td  class="indentasi">Demikian Surat Keterangan ini  kami buat untuk dapat dipergunakan sebagaimana mestinya. </td></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
							</table>
						</div>
						<table width="100%">
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr><td></td><td width="30%"></td><td align="center">, </td></tr>
							<tr><td></td><td width="30%"></td><td align="center"></td></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr><td> <td></td><td align="center">(  )</td></tr>
						</table>
					</div>
				</div>
			</div>
			<div id="aside"></div>
			<div id="footer" class="container_12"></div>
		</div>
	</body>
</html>
