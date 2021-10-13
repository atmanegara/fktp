<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaBelanjaRinc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ta-belanja-rinc-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
   $norek = $model['kd_rek_1'].'.'.$model['kd_rek_2'].'.'.$model['kd_rek_3'].'.'.$model['kd_rek_4'].'.'.$model['kd_rek_5'];
   echo Html::label('Norek');
  echo Html::textInput('norek',$norek,['class'=>'form-control','readOnly'=>true]);
    ?>
    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
