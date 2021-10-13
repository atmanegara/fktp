<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use app\models\RefSubSkpd;
use app\models\RefTahun;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RefFktp */
/* @var $form yii\widgets\ActiveForm */

$RefSkpd = ArrayHelper::map(RefSubSkpd::find()->where(['aktif' => 'Y'])->asArray()->all(), 'id', 'nm_sub_unit');
$reftahun = RefTahun::find()->where(['aktif'=>'Y'])->one();
?>

<div class="ref-fktp-form">

    <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model,'thn_fktp')->label(false)->hiddenInput(['value'=>$reftahun['inisial']])?>
      <?=
    $form->field($model, 'id_sub_skpd')->label('SKPD')->widget(Select2::class, [
        'data' => $RefSkpd,
        'options' => [
            'placeholder' => 'Pilih SubSkpd'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])
    ?>
    <?= $form->field($model, 'kode_fktp', [

        'addon' => [

      'prepend' => ['content'=>$reftahun['inisial'], 'asButton' => false],

  //    'append' => ['content' => '.00']

   ]
])->textInput(['maxlength' => true]) ?>
      
  
    <?php
    if(!$model->isNewRecord){
    ?>
        <?= $form->field($model, 'aktif')->dropDownList(['Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>

    <?php
    }
    ?>
    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
