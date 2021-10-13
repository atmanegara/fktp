<?php

use yii\jui\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\TaBelanjaRinc;
use app\models\RefSkpd;
use kartik\number\NumberControl;
use yii\helpers\Url;

$kd_urusan = $refSubSkpd['kd_urusan'];
$kd_bidang = $refSubSkpd['kd_bidang'];
$kd_unit = $refSubSkpd['kd_unit'];
$kd_sub = $refSubSkpd['kd_sub'];
$dataRekening = ArrayHelper::map(TaBelanjaRinc::getTaBelanja($kd_urusan, $kd_bidang, $kd_unit, $kd_sub), 'id',
                function($model, $attribute) {
            return sprintf('%s :  %s', $model['kd_rek_1'] . '.' . $model['kd_rek_2'] . '.' . $model['kd_rek_3'] . '.' . $model['kd_rek_4'] . '.' . $model['kd_rek_5'], $model['keterangan']);
        });
?>
<table>
    <thead>
        <tr>
            <th>Tgl Transaksi</th>
            <th>Belanja</th>
            <th>Nominal</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="200px"><?php
            $tahun=date('Y');
echo DatePicker::widget([
    'name' => 'tgl_transksi',
    'value' => date('Y-m-d', strtotime($tahun."-".$bulan."-01")),
    'id' => 'tgl_transaksi',
    'dateFormat' => 'yyyy-MM-dd',
    'options'=>[
        'class'=>'form-control'
    ],

    'clientOptions' => [
        'showAnim'=>'fold',
        'maxDate'=>0
    ]
])
?></td>
            <td width="600px"><?=
                Select2::widget([
                    'name' => 'belanja',
                    'id' => 'belanja',
                    'data' => $dataRekening,
                    'options' => [
                        'onChange' => 'getRekening(this.value)',
                        'placeholder' => 'Pilih Belanja..'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
  echo \yii\helpers\Html::hiddenInput('bulan', $bulan, [
                    'id' => 'bulan'
                ]);
                echo \yii\helpers\Html::hiddenInput('kd_rek_1', null, [
                    'id' => 'kd_rek_1'
                ]);
                echo \yii\helpers\Html::hiddenInput('kd_rek_2', null, [
                    'id' => 'kd_rek_2'
                ]);
                echo \yii\helpers\Html::hiddenInput('keterangan', null, [
                    'id' => 'keterangan'
                ]);
                ?></td>
            <td width="300px"><?=
                NumberControl::widget([
                    'name' => 'nominal',
                    'id' => 'nominal',
                    'maskedInputOptions' => [
                        'prefix' => 'Rp ',
                        'groupSeparator' => '.',
                        'radixPoint' => ','
            ]])
                ?></td>
            <td><?=
                \yii\bootstrap\Html::button('Simpan', [
                    'class' => 'btn btn-primary',
                    'onClick' => 'aksiSimpan()'
                ])
                ?></td>
        </tr>
    </tbody>
</table>

<script>
    function getRekening(kode_rekening) {
        var kode_rekening = kode_rekening;

        $.post("<?= \yii\helpers\Url::to(['/ref/get-rekening-ta-belanja']) ?>", {
            id: kode_rekening
        })
                .done(function () {
                    console.log('done')
                })

                .fail(function () {
                    console.log('fail')
                })
                .always(function (data) {
                    var datajson = JSON.parse(data);
                    $("#kd_rek_1").val(datajson['kd_rek_1']);
                    $("#kd_rek_2").val(datajson['kd_rek_2']);
                    $("#keterangan").val(datajson['keterangan']);
                });
    }
    function aksiSimpan() {
        var id_ref_skpd = "<?= $refSubSkpd['id'] ?>";
        var tgl_transaksi = $("#tgl_transaksi").val();
        var id_ta_belanja = $("#belanja").val();
        var kd_rek_1 = $("#kd_rek_1").val();
        var kd_rek_2 = $("#kd_rek_2").val();
        var keterangan = $("#keterangan").val();
        var nominal = $("#nominal").val();
        var bulan = $("#bulan").val();
        //  alert(tgl_transaksi);
        $.post("<?= Url::to(['simpan-data-buku-kas']) ?>", {
            id_ref_skpd: id_ref_skpd,
            tgl_transaksi: tgl_transaksi,
            id_ta_belanja_rinc: id_ta_belanja,
            nominal: nominal,
            bulan : bulan
        })
                .done(function (data) {
                    console.log('done')
                })
                .fail(function (data) {
                    console.log('fail')
                })
                .always(function (data) {
                    console.log('sukses')
                    $.pjax.reload({container: '#pjax-data-buku-kas'});
                });
    }
</script>