<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefRek3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-rek3-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_rek_1')->textInput() ?>

    <?= $form->field($model, 'kd_rek_2')->textInput() ?>

    <?= $form->field($model, 'kd_rek_3')->textInput() ?>

    <?= $form->field($model, 'nm_rek_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saldonorm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
