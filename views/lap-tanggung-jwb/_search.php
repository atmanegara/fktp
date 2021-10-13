<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LapTanggungJwbSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lap-tanggung-jwb-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'id_skpd') ?>

    <?= $form->field($model, 'notransaksi') ?>

    <?= $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'format_fktp') ?>

    <?php // echo $form->field($model, 'tgl_jam') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
