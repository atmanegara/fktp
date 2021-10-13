<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\RefSubSkpd;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\LapTanggungJwb */
/* @var $form yii\widgets\ActiveForm */
$hakuser = Yii::$app->user->identity->hakuser;
$dataSubskpd = ArrayHelper::map(RefSubSkpd::find()->where(['aktif'=>'Y'])->asArray()->all(),'id','nm_sub_unit');
?>

<div class="lap-tanggung-jwb-form">

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
   <?= $form->field($model, 'tahun')->textInput() ?>


    <?= $form->field($model, 'bulan')->textInput() ?>
 
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
