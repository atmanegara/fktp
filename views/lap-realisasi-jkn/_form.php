<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\RefSubSkpd;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiJkn */
/* @var $form yii\widgets\ActiveForm */
$bulan = [
    '1'=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Juli','Agustus','September','Oktober','November','Desembar'
];
        $dataSubSkp = ArrayHelper::map(RefSubSkpd::find()->asArray()->all(),'id','nm_sub_unit');
?>

<div class="lap-realisasi-jkn-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model,'id_skpd')->widget(Select2::className(),[
        'data'=>$dataSubSkp,
        'options'=>[
            'placeholder'=>'Pilih SKPD..'
        ]
    ])?>

    <?= $form->field($model, 'nomor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl')->widget(DatePicker::className(),[
        'dateFormat'=>'yyyy-MM-dd',
        'options'=>[
            'class'=>'form-control'
        ]
    ]) ?>

    <?= $form->field($model, 'bln_realisasi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
