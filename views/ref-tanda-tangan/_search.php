<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefTandaTanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-tanda-tangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_ref_sub_skpd') ?>

    <?= $form->field($model, 'kd_report') ?>

    <?= $form->field($model, 'title_report') ?>

    <?= $form->field($model, 'ttd1_id_ref_pegawai') ?>

    <?php // echo $form->field($model, 'ttd2_id_ref_pegawai') ?>

    <?php // echo $form->field($model, 'ttd3_id_ref_pegawai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
