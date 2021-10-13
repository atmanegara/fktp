<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>LAPORAN REALISASI DANA KAPITASI</title>
<style type="text/css">
.auto-style1 {
	border-collapse: collapse;
}
.auto-style2 {
	border-left-style: solid;
	border-left-width: 1px;
}
.auto-style3 {
	border-right-style: solid;
	border-right-width: 1px;
}
.auto-style4 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
}
.auto-style5 {
	border-left-style: solid;
	border-left-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style6 {
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style7 {
	border-right-style: solid;
	border-right-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style8 {
	border-left-style: solid;
	border-left-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
}
.auto-style9 {
	border-top-style: solid;
	border-top-width: 1px;
}
.auto-style10 {
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
}
.auto-style11 {
	text-align: center;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
}
.auto-style13 {
	border-style: solid;
	border-width: 1px;
}
</style>
</head>

<body>

<table class="auto-style1" style="width: 100%">
	<tr>
		<td class="auto-style8">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style10">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style11" colspan="7">LAPORAN REALISASI DANA KAPITASI JKN 
		PADA FKTP PUSKESMAS AAA</td>
	</tr>
	<tr>
		<td class="auto-style11" colspan="7">KABUPATEN HULU SUNGAI TENGAH 
		PROVINSI KALIMATAN SELATAN</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style4" colspan="7">Bersama ini kami laporakan realisasi 
		atas [enggunaan dana kapitasi JKN untuk bulan 00 9999, sebagai berkut</td>
	</tr>
	<tr>
		<td class="auto-style5">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style13">No</td>
		<td class="auto-style13">uraian</td>
		<td class="auto-style13">jumlah anggaran (Rp.)</td>
		<td class="auto-style13">Jumlah realisasi (Rp.)</td>
		<td class="auto-style13">Selisih/(kurang)</td>
		<td class="auto-style2">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style13">1</td>
		<td class="auto-style13"><?=$keterangan?></td>
		<td class="auto-style13">-</td>
		<td class="auto-style13"><?=Yii::$app->formatter->asDecimal($dataSaldoAwal['saldo'])?></td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style2">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	
		<?php 
      //  $data = $dataProvider->getModels();
        $no=0;
        foreach($query as $value){
        ?>



	<tr>
		<td class="auto-style13">&nbsp;</td>
              
		<td class="auto-style13"><?=$value['kode_rek']." ".$value['keterangan']?></td>
		<td class="auto-style13"><?=Yii::$app->formatter->asDecimal($value['pendapatan'])?></td>
		<td class="auto-style13"><?=Yii::$app->formatter->asDecimal($value['belanja'])?></td>
		<td class="auto-style13"><?=Yii::$app->formatter->asDecimal($value['saldo'])?></td>
		<td class="auto-style2">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
                <?php  }
 ?>
	<tr>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style2">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style13">Jumlah Sampain dengan Bulan <?= app\component\BulanComponent::NamaBulan($bulan).' '.date('Y') ?></td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style13"><?=Yii::$app->formatter->asDecimal($jumsaldosampaibulanx['pendapatan']-$jumsaldosampaibulanx['belanja'])?></td>
		<td class="auto-style13">&nbsp;</td>
		<td class="auto-style2">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style8">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td class="auto-style9">&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>demikian laporan realisasi ini dibuat untuk digunakan sebagaimana 
		mestinya</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>barabai, November 2000</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>kepala fkpt puskesmas kasarangan</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>h.hermansyah skep</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style5">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style6">nip00000000</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style6">&nbsp;</td>
		<td class="auto-style7">&nbsp;</td>
	</tr>
</table>

</body>

</html>
