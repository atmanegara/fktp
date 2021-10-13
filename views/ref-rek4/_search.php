<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefRek4Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-rek4-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_rek_1') ?>

    <?= $form->field($model, 'kd_rek_2') ?>

    <?= $form->field($model, 'kd_rek_3') ?>

    <?= $form->field($model, 'kd_rek_4') ?>

    <?php // echo $form->field($model, 'nm_rek_4') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
