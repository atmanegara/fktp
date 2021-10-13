<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefTandaTangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-tanda-tangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_ref_sub_skpd')->textInput() ?>

    <?= $form->field($model, 'kd_report')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_report')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ttd1_id_ref_pegawai')->textInput() ?>

    <?= $form->field($model, 'ttd2_id_ref_pegawai')->textInput() ?>

    <?= $form->field($model, 'ttd3_id_ref_pegawai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
