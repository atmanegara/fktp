<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefSubSkpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-sub-skpd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_bidang') ?>

    <?= $form->field($model, 'kd_urusan') ?>

    <?= $form->field($model, 'kd_unit') ?>

    <?= $form->field($model, 'kd_sub') ?>

    <?php // echo $form->field($model, 'nm_sub_unit') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
