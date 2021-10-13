<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefKegiatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-kegiatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_urusan') ?>

    <?= $form->field($model, 'kd_bidang') ?>

    <?= $form->field($model, 'kd_urusan1') ?>

    <?= $form->field($model, 'kd_bidang1') ?>

    <?php // echo $form->field($model, 'kd_unit') ?>

    <?php // echo $form->field($model, 'kd_sub') ?>

    <?php // echo $form->field($model, 'kd_prog') ?>

    <?php // echo $form->field($model, 'kd_keg') ?>

    <?php // echo $form->field($model, 'id_prog') ?>

    <?php // echo $form->field($model, 'ket_kegiatan') ?>

    <?php // echo $form->field($model, 'lokasi') ?>

    <?php // echo $form->field($model, 'sasaran') ?>

    <?php // echo $form->field($model, 'pagu_anggaran') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
