<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp2bSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lap-sp2b-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_skpd') ?>

    <?= $form->field($model, 'no_sp2b') ?>

    <?= $form->field($model, 'tgl_sp2b') ?>

    <?= $form->field($model, 'id_lap_sp3b') ?>

    <?php // echo $form->field($model, 'id_tnd_tnagn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
