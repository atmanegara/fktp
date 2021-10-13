<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp3bSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lap-sp3b-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_skpd') ?>

    <?= $form->field($model, 'bulan') ?>

    <?= $form->field($model, 'no_sp3b') ?>

    <?= $form->field($model, 'tgl_sp3b') ?>

    <?php // echo $form->field($model, 'no_dppa') ?>

    <?php // echo $form->field($model, 'tgl_dppa') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
