<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp2b */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lap-sp2b-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_skpd')->textInput() ?>

    <?= $form->field($model, 'no_sp2b')->textInput() ?>

    <?= $form->field($model, 'tgl_sp2b')->textInput() ?>

    <?= $form->field($model, 'id_lap_sp3b')->textInput() ?>

    <?= $form->field($model, 'id_tnd_tnagn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
