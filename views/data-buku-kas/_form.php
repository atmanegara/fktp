<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataBukuKas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-buku-kas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nourut')->textInput() ?>

    <?= $form->field($model, 'id_ref_skpd')->textInput() ?>

    <?= $form->field($model, 'id_ref_kegiatan')->textInput() ?>

    <?= $form->field($model, 'id_ref_program')->textInput() ?>

    <?= $form->field($model, 'id_ref_sub_skpd')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput() ?>

    <?= $form->field($model, 'pendapatan')->textInput() ?>

    <?= $form->field($model, 'belanja')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <?= $form->field($model, 'notransaksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nobukti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
