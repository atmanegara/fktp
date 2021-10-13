<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\RefSubSkpd;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiAnggaran */
/* @var $form yii\widgets\ActiveForm */
$id_sub_skpd = Yii::$app->user->identity->id_skpd;
$hakuser = Yii::$app->user->identity->hakuser;
$dataSubskpd = ArrayHelper::map(RefSubSkpd::find()->where(['aktif'=>'Y'])->asArray()->all(),'id','nm_sub_unit');
$bulan=[
    1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
];
$tahun = \app\models\RefTahun::findOne(['aktif'=>'Y'])->tahun;;
?>

<div class="lap-realisasi-anggaran-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?php
    if(in_array($hakuser, ['11'])){
        echo     $form->field($model, 'id_skpd')->label('Nama SKPD')->widget(Select2::className(),[
            'data'=>$dataSubskpd,
            'options'=>[
                'placeholder'=>'Pilih SKPD...',
            ],
            'pluginOptions'=>[
                'allowClear'=>true
            ]
        ]) ;
    }else{
        $skpd = RefSubSkpd::findOne($id_sub_skpd)->nm_sub_unit;
         echo   $form->field($model, 'id_skpd')->label(false)->hiddenInput(['value'=>$id_sub_skpd]) ;
         echo Html::textInput('id_skpd', $skpd, ['class'=>'form-control','disabled'=>true]) ;
    }
?>
    <p>
   <?= $form->field($model, 'bulan')->label('Bulan  <small><i>*) Pilih bulan yang akan dilaporakan</i></small>    ')->dropDownList($bulan,[
        'prompt'=>"Pilih Bulan yang akan dilaporan.."
    ]) ?>
           
    </p>


     <?= $form->field($model, 'tahun')->textInput(['value'=>$tahun]) ?>

    <?= $form->field($model, 'tgl_buat')->label(false)->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
