<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\RefFktp;
use kartik\number\NumberControl;
/* @var $this yii\web\View */
/* @var $model app\models\DataSaldo */
/* @var $form yii\widgets\ActiveForm */



    $hakuser = Yii::$app->user->identity->hakuser;
    $id_skpd = Yii::$app->user->identity->id_skpd;
if(in_array($hakuser,['11'])){
$dataSkpd = RefFktp::getFktp();
}else{
$dataSkpd = RefFktp::getFktpBySkpd($id_skpd);
    
}
$tahun = \app\models\RefTahun::findOne(['aktif'=>'Y'])->tahun;
$bulan=[
    1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
];
?>

<div class="data-saldo-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?= $form->field($model, 'bulan')->dropDownList($bulan,[
        'prompt'=>"Pilih Bulan.."
    ]) ?>

    <?= $form->field($model, 'tahun')->textInput(['value'=>$tahun]) ?>

  <?= $form->field($model, 'id_skpd')->label('SKPD')->widget(Select2::class,[
        'data'=>$dataSkpd,
        'options'=>[
            'placeholder'=>'Pilih SubSKPD',
            'onChange'=>'notransaksi(this.value)'
        ],
        'pluginOptions'=>[
            'allowClose'=>true,
            'allowClear'=>true
        ]
    ]) ?>
    <?= $form->field($model, 'notransaksi')->textInput(['maxlength' => true,'readOnly'=>true]) ?>

    <?= $form->field($model, 'saldo')->label('Saldo <small>(*saldo terakhir)</small>')->widget(NumberControl::class,[
        'maskedInputOptions' => [
                        'prefix' => 'Rp ',
                        'groupSeparator' => '.',
                        'radixPoint' => ','
            ]
    ]) ?>
<?php
    if(!$model->isNewRecord){
    ?>
    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
    <?php } ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function notransaksi(idskpd)
    {
        var bulan = $("#datasaldo-bulan").val();
        var tahun = $("#datasaldo-tahun").val();
        
        if(bulan=='' || tahun==''){
            alert('data kosong')
            return false;
        }
        var getskpd = $.get("<?= \yii\helpers\Url::to(['/ref-fktp/get-fktp-by-idskpd']) ?>",{
            idskpd : idskpd
        })
                .always(function(data){
                    var datajson = JSON.parse(data);
                    var format_fktp = datajson.format_fktp;
       $("#datasaldo-notransaksi").val(bulan+'.'+tahun+'.'+format_fktp);
                });
        
    }
    </script>