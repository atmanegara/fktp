<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataBukuKasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-buku-kas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nourut') ?>

    <?= $form->field($model, 'id_ref_skpd') ?>

    <?= $form->field($model, 'id_ref_kegiatan') ?>

    <?= $form->field($model, 'id_ref_program') ?>

    <?php // echo $form->field($model, 'id_ref_sub_skpd') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'pendapatan') ?>

    <?php // echo $form->field($model, 'belanja') ?>

    <?php // echo $form->field($model, 'saldo') ?>

    <?php // echo $form->field($model, 'notransaksi') ?>

    <?php // echo $form->field($model, 'nobukti') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
