<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefRek1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-rek1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_rek_1')->textInput() ?>

    <?= $form->field($model, 'nm_rek_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
