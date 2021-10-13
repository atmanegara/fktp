<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp3b */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lap-sp3b-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_skpd')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput() ?>

    <?= $form->field($model, 'no_sp3b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_sp3b')->textInput() ?>

    <?= $form->field($model, 'no_dppa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_dppa')->textInput() ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
