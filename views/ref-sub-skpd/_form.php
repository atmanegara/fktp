<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefSubSkpd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-sub-skpd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_bidang')->textInput() ?>

    <?= $form->field($model, 'kd_urusan')->textInput() ?>

    <?= $form->field($model, 'kd_unit')->textInput() ?>

    <?= $form->field($model, 'kd_sub')->textInput() ?>

    <?= $form->field($model, 'nm_sub_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
