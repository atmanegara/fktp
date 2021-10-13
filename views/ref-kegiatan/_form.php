<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_urusan')->textInput() ?>

    <?= $form->field($model, 'kd_bidang')->textInput() ?>

    <?= $form->field($model, 'kd_urusan1')->textInput() ?>

    <?= $form->field($model, 'kd_bidang1')->textInput() ?>

    <?= $form->field($model, 'kd_unit')->textInput() ?>

    <?= $form->field($model, 'kd_sub')->textInput() ?>

    <?= $form->field($model, 'kd_prog')->textInput() ?>

    <?= $form->field($model, 'kd_keg')->textInput() ?>

    <?= $form->field($model, 'id_prog')->textInput() ?>

    <?= $form->field($model, 'ket_kegiatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sasaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pagu_anggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
