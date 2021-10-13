<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style2 {
	border-collapse: collapse;
}
.auto-style3 {
	border-style: solid;
	border-width: 1px;
}
</style>
</head>

<body>

<p>Surat Pernyataan Tanggung Jawab</p>
<p>No : 445 /................../...................../ 2018</p>
<p>&nbsp;</p>
<table class="auto-style2" style="width: 100%">
	<tr>
		<td>1. Nama FKTP</td>
		<td>:</td>
		<td>FKTP <?=$dataskpd['nm_sub_unit']?></td>
	</tr>
	<tr>
		<td>2. Kode Organisasi</td>
		<td>:</td>
		<td>1.02.1.02.01 <?=$dataskpd['nm_sub_unit']?></td>
	</tr>
	<tr>
		<td>3. Nomor / tanggal DPA-SKPD</td>
		<td>:</td>
		<td>1.02.01.01.16.22.5.2 , Tanggal : 31 Desembar 2018</td>
	</tr>
	<tr>
		<td>4. Kegiatan</td>
		<td>:</td>
		<td>1.0.02.1.02.01.01.16.22 Program upaya kesehatan masyarakat</td>
	</tr>
</table>
<p>&nbsp;</p>
<p>Yang bertanda tangan dibawah ini, saya kepala FKPT PUskesmas kasarangna.</p>
<p>Menyatakan bahwa saya bertanggung jawab atas semua realiasi pendapatan yang 
telah diterima dan belnaj yang telah dibayar kepada yang berhak menerima, yang 
dananya bersumber dari dana Kapitasi JKN dan digunkana langsung oleh FKPT pada 
Bulan Desember 2018 dengan rincian sebagai berikut</p>
<p>&nbsp;</p>
<table class="auto-style2" style="width: 100%">
	<tr>
		<td class="auto-style1" colspan="3">Pendapatan</td>
		<td class="auto-style1" colspan="3">Belanja</td>
	</tr>
	<tr>
		<td class="auto-style1" colspan="2">Rekening</td>
		<td class="auto-style3" rowspan="2">JUmlah</td>
		<td class="auto-style1" colspan="2">Rekening</td>
		<td class="auto-style3" rowspan="2">Jumlah</td>
	</tr>
	<tr>
		<td class="auto-style3">Kode Rekening</td>
		<td class="auto-style3">Nama rekening</td>
		<td class="auto-style3">Kode Rekening</td>
		<td class="auto-style3">Nama Rekening</td>
	</tr>
	<tr>
		<td class="auto-style1">1</td>
		<td class="auto-style1">2</td>
		<td class="auto-style1">3</td>
		<td class="auto-style1">4</td>
		<td class="auto-style1">5</td>
		<td class="auto-style1">6</td>
	</tr>
    <?php foreach ($datakas as $value) {?>
	<tr>
            <!-- Pendapatan -->
		<td class="auto-style3"><?=$value['pendapatan']>0 ? $value['kd_rek']: ' ' ?></td>
		<td class="auto-style3"><?=$value['pendapatan']>0 ? $value['keterangan'] : ' ' ?></td>
		<td class="auto-style3"><?=$value['pendapatan']>0 ? $value['pendapatan']: ' ' ?></td>
                 <!-- belanja -->
	<td class="auto-style3"><?=$value['belanja']>0 ? $value['kd_rek'] : '' ?></td>
		<td class="auto-style3"><?=$value['belanja']>0 ? $value['keterangan']:' ' ?></td>
		<td class="auto-style3"><?=$value['belanja']>0 ? $value['belanja'] : '' ?></td>
	</tr>
	
    <?php } ?>
	<tr>
		<td class="auto-style3" colspan="2">JUmlah Pendapatan</td>
		<td class="auto-style3">&nbsp;</td>
		<td class="auto-style3" colspan="2">JUmlah Belanja</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
</table>
<p>&nbsp;</p>
<p>Bukti-bukti pendapatan dan/atau belanja diatas disimpan sesuai ketentyan yang 
berlaku untuk kelengkapan administrasi dan keperluan pemeriksaan aparat 
pengawas.</p>
<p>apabula dikemudian hari terjadi kerugian daerah, saya bertanggung jawab 
sepenuhnya atas kerugian daerah dimaksud dan dapat dituntung penggantian sesuai 
dengan ketentuan peratturan perundang-undangan.</p>
<p>demikian surat pernyataan ini dibuat dengan sebenarnya&nbsp;&nbsp;&nbsp; </p>
<table style="width: 100%">
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>barabai,........... Januari 2017</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>Kepala FKTP <?=$dataskpd['nm_sub_unit']?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>Anamaanama</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width: 837px">&nbsp;</td>
		<td>NIP.9809809809</td>
		<td>&nbsp;</td>
	</tr>
</table>

</body>

</html>
