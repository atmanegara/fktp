<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RefSubSkpd;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */


$dataSubskpd = yii\helpers\ArrayHelper::map(app\models\RefSubSkpd::find()->asArray()->all(),'id','nm_sub_unit')
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    if($model->isNewRecord){
    echo $form->field($model, 'id_skpd')->label('SKPD')->widget(Select2::class,[
        'data'=>$dataSubskpd,
        'options'=>[
            'placeholder'=>'Pilih SKPD..'
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]);
    
    }else{
        $subskpd = RefSubSkpd::find()->where(['id'=>$model->id_skpd])->one();
     //   echo var_dump($subskpd);
        echo $form->field($model, 'id_skpd')->label('SKPD')->textInput([
            'value'=>$subskpd['nm_sub_unit'],'readOnly'=>true]);
    } ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_hash')->label('Password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput() ?>
    <?php
    $items=[
        '10'=>'Aktif',
        '0'=>'Tidak Aktif'
    ];
    echo $form->field($model, 'status')->dropDownList($items,[
        'prompt'=>'Pilih Status Akun User'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
