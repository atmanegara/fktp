<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style2 {
	border-collapse: collapse;
}
.auto-style4 {
	border-style: solid;
	border-width: 1px;
}
.auto-style6 {
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style7 {
	border-style: solid;
	border-width: 1px;
	background-color: #C0C0C0;
}
.auto-style8 {
	border-style: solid;
	border-width: 1px;
	background-color: #9FFFEC;
}
.auto-style9 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	background-color: #9FFFEC;
}
.auto-style10 {
	text-align: center;
}
.auto-style11 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
}
</style>
</head>

<body>

<table class="auto-style2" style="width: 100%">
	<tr>
		<td class="auto-style11" colspan="7"><strong>LAPORAN REALISASI ANGAGRAN</strong></td>
	</tr>
	<tr>
		<td class="auto-style10" colspan="7"><strong>FKTP <?= strtoupper(\app\models\RefSubSkpd::findOne($model['id_skpd'])->nm_sub_unit);?>
		</strong></td>
	</tr>
	<tr>
            <td class="auto-style10" colspan="7"><strong>UNTUK BULAN <?= strtoupper(app\component\BulanComponent::NamaBulan($model['bulan']).'  '.$model['tahun']) ?>
			</strong></td>
	</tr>
	<tr>
		<td class="auto-style6" style="height: 24px; width: 147px;"></td>
		<td class="auto-style6" style="height: 24px; width: 453px;"></td>
		<td class="auto-style6" style="height: 24px; width: 107px;"></td>
		<td class="auto-style6" style="height: 24px; width: 116px;"></td>
		<td class="auto-style6" style="height: 24px; width: 122px;"></td>
		<td class="auto-style6" style="height: 24px; width: 92px;"></td>
		<td class="auto-style6" style="height: 24px"></td>
	</tr>
	<tr>
		<td class="auto-style6" style="height: 24px; width: 147px;">&nbsp;</td>
		<td class="auto-style6" style="height: 24px; width: 453px;">&nbsp;</td>
		<td class="auto-style6" style="height: 24px; width: 107px;">&nbsp;</td>
		<td class="auto-style6" style="height: 24px; width: 116px;">&nbsp;</td>
		<td class="auto-style6" style="height: 24px; width: 122px;">&nbsp;</td>
		<td class="auto-style6" style="height: 24px; width: 92px;">&nbsp;</td>
		<td class="auto-style6" style="height: 24px">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style9" colspan="2">Rekening</td>
		<td class="auto-style9" colspan="5">Pendapatan</td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 147px">Kode</td>
		<td class="auto-style8" style="width: 453px">Uraian</td>
		<td class="auto-style8" style="width: 107px">anggaran</td>
		<td class="auto-style8" style="width: 116px">realisasi bulan ini</td>
		<td class="auto-style8" style="width: 122px">realiasai sd bulan lalu</td>
		<td class="auto-style8" style="width: 92px">realiasasi bulan ini</td>
		<td class="auto-style8">selisih anggaran dengan realisasi</td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 147px">1</td>
		<td class="auto-style8" style="width: 453px">2</td>
		<td class="auto-style8" style="width: 107px">3</td>
		<td class="auto-style8" style="width: 116px">4</td>
		<td class="auto-style8" style="width: 122px">5</td>
		<td class="auto-style8" style="width: 92px">6</td>
		<td class="auto-style8">7</td>
	</tr>
    <?php 
         $total_anggaran =0;
      $total_real_bulan_ini =0;
      $total_real_bln_lalu =0;
      $total_real_sd_bulan_ini =0;
      $total_real_selisih =0;
      
    foreach($query_pendapatan as $value_pendapatan){ ?>
	<tr>
            <td class="auto-style4" style="width: 147px"><?=$value_pendapatan['kode_rek']?></td>
		<td class="auto-style4" style="width: 453px"><?=$value_pendapatan['keterangan']?></td>
		<td class="auto-style4" style="width: 107px"><?=Yii::$app->formatter->asDecimal($value_pendapatan['anggaran'],2)?></td>
		<td class="auto-style4" style="width: 116px"><?=Yii::$app->formatter->asDecimal($value_pendapatan['real_bulan_ini'],2)?></td>
		<td class="auto-style4" style="width: 122px"><?=Yii::$app->formatter->asDecimal($value_pendapatan['real_bln_lalu'],2)?></td>
		<td class="auto-style4" style="width: 92px"><?=Yii::$app->formatter->asDecimal($value_pendapatan['real_sd_bulan_ini'],2)?></td>
		<td class="auto-style4"><?=Yii::$app->formatter->asDecimal($value_pendapatan['real_selisih'],2)?></td>
	</tr>
 
    <?php 
      $total_anggaran +=$value_pendapatan['anggaran'];
      $total_real_bulan_ini +=$value_pendapatan['real_bulan_ini'];
      $total_real_bln_lalu +=$value_pendapatan['real_bln_lalu'];
      $total_real_sd_bulan_ini +=$value_pendapatan['real_sd_bulan_ini'];
      $total_real_selisih +=$value_pendapatan['real_selisih'];
    
    }?>
	<tr>
		<td class="auto-style4" style="width: 147px">&nbsp;</td>
		<td class="auto-style4" style="width: 453px">&nbsp;</td>
		<td class="auto-style4" style="width: 107px">&nbsp;</td>
		<td class="auto-style4" style="width: 116px">&nbsp;</td>
		<td class="auto-style4" style="width: 122px">&nbsp;</td>
		<td class="auto-style4" style="width: 92px">&nbsp;</td>
		<td class="auto-style4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" class="auto-style7">Jumlah pendapatan</td>
		<td class="auto-style7" style="width: 107px"><?=Yii::$app->formatter->asDecimal($total_anggaran,2)?></td>
		<td class="auto-style7" style="width: 116px"><?=Yii::$app->formatter->asDecimal($total_real_bulan_ini,2)?></td>
		<td class="auto-style7" style="width: 122px"><?=Yii::$app->formatter->asDecimal($total_real_bln_lalu,2)?></td>
		<td class="auto-style7" style="width: 92px"><?=Yii::$app->formatter->asDecimal($total_real_sd_bulan_ini,2)?></td>
		<td class="auto-style7"><?=Yii::$app->formatter->asDecimal($total_real_selisih,2)?></td>
	</tr>
</table>
<p>
</p>
<table class="auto-style2" style="width: 100%">
	<tr>
		<td colspan="2" class="auto-style9">Rekening</td>
		<td colspan="5" class="auto-style9">Belanja</td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 155px">Kode</td>
		<td class="auto-style8" style="width: 447px">Uraian</td>
		<td class="auto-style8" style="width: 104px">anggaran</td>
		<td class="auto-style8" style="width: 119px">realisasi bulan ini</td>
		<td class="auto-style8" style="width: 121px">realiasai sd bulan lalu</td>
		<td class="auto-style8" style="width: 96px">realiasasi bulan ini</td>
		<td class="auto-style8">selisih anggaran dengan realisasi</td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 155px">1</td>
		<td class="auto-style8" style="width: 447px">2</td>
		<td class="auto-style8" style="width: 104px">3</td>
		<td class="auto-style8" style="width: 119px">4</td>
		<td class="auto-style8" style="width: 121px">5</td>
		<td class="auto-style8" style="width: 96px">6</td>
		<td class="auto-style8">7</td>
	</tr>
	 <?php 
         $total_anggaran =0;
      $total_real_bulan_ini =0;
      $total_real_bln_lalu =0;
      $total_real_sd_bulan_ini =0;
      $total_real_selisih =0;
      
    foreach($query_belanja as $value_belanja){ ?>
	<tr>
		<td class="auto-style4" style="width: 155px"><?=$value_belanja['kode_rek']?></td>
		<td class="auto-style4" style="width: 447px"><?=$value_belanja['keterangan']?></td>
		<td class="auto-style4" style="width: 104px"><?=Yii::$app->formatter->asDecimal($value_belanja['anggaran'],2)?></td>
		<td class="auto-style4" style="width: 119px"><?=Yii::$app->formatter->asDecimal($value_belanja['real_bulan_ini'],2)?></td>
		<td class="auto-style4" style="width: 121px"><?=Yii::$app->formatter->asDecimal($value_belanja['real_bln_lalu'],2)?></td>
		<td class="auto-style4" style="width: 96px"><?=Yii::$app->formatter->asDecimal($value_belanja['real_sd_bulan_ini'],2)?></td>
		<td class="auto-style4"><?=Yii::$app->formatter->asDecimal($value_belanja['real_selisih'],2)?></td>
	</tr>
 
    <?php 
      $total_anggaran +=$value_belanja['anggaran'];
      $total_real_bulan_ini +=$value_belanja['real_bulan_ini'];
      $total_real_bln_lalu +=$value_belanja['real_bln_lalu'];
      $total_real_sd_bulan_ini +=$value_belanja['real_sd_bulan_ini'];
      $total_real_selisih +=$value_belanja['real_selisih'];
    
    }?>
	<tr>
		<td colspan="2" class="auto-style7">jumlah belanja</td>
	<td class="auto-style7" style="width: 104px"><?=Yii::$app->formatter->asDecimal($total_anggaran,2)?></td>
		<td class="auto-style7" style="width: 119px"><?=Yii::$app->formatter->asDecimal($total_real_bulan_ini,2)?></td>
		<td class="auto-style7" style="width: 121px"><?=Yii::$app->formatter->asDecimal($total_real_bln_lalu,2)?></td>
		<td class="auto-style7" style="width: 96px"><?=Yii::$app->formatter->asDecimal($total_real_sd_bulan_ini,2)?></td>
		<td class="auto-style7"><?=Yii::$app->formatter->asDecimal($total_real_selisih,2)?></td>
	</tr>
</table>

</body>

</html>
