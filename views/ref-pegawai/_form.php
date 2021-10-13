<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RefSubSkpd;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model app\models\RefPegawai */
/* @var $form yii\widgets\ActiveForm */

$url = \yii\helpers\Url::to(['/ref-sub-skpd/sub-skpd-list']);
?>

<div class="ref-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

 
    <?= $form->field($model, 'nip_peg')->label('NIP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_peg')->label('Nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabt_peg')->label('Jabatan')->textInput(['maxlength' => true]) ?>
    
    <?php
    if(!$model->isNewRecord){
         $skpd = \app\models\RefSubSkpd::findOne($model['id_skpd'])->nm_sub_unit;
    }
    echo $form->field($model, 'id_skpd')->label('SKPD')->widget( 
                    Select2::class,[
                     //   'id' => 'id_pptk',
                      //  'name' => 'id_pptk',
                     'initValueText' => $skpd, // set the initial display text
                        'options' => ['placeholder' => 'Cari Sub SKPD ...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 3,
                            'language' => [
                                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                            ],
                            'ajax' => [
                                'url' => $url,
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                            'templateResult' => new JsExpression('function(subskpd) { return subskpd.text; }'),
                            'templateSelection' => new JsExpression('function (subskpd) { return subskpd.text; }'),
                        ],
                    ]
                    )?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
