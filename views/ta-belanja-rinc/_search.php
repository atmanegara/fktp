<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\RefSubSkpd;
/* @var $this yii\web\View */
/* @var $model app\models\TaBelanjaRincSearch */
/* @var $form yii\widgets\ActiveForm */

$dataSubSkpd = yii\helpers\ArrayHelper::map(RefSubSkpd::find()->asArray()->all(),'id' ,'nm_sub_unit');
?>

<div class="ta-belanja-rinc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
        'data-pjax' => 1
    ],
    ]); ?>


    <?= $form->field($model, 'kd_urusan')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'kd_bidang')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'kd_unit')->label(false)->hiddenInput() ?>

    <?=$form->field($model, 'kd_sub')->label(false)->hiddenInput() ?>

    <?= Select2::widget([
        'name'=>'subskpd',
        'id'=>'subskpd',
        'data'=>$dataSubSkpd,
        'options'=>[
            'placeholder'=>'Pilih SKPD...',
            'onChange'=>'getkode(this.value)',
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>
    <p>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Reset',['index'], ['class' => 'btn btn-default btn-flat']) ?>
    </div>
        
    </p>

    <?php ActiveForm::end(); ?>

</div>
<script>

    function getkode(id){

//  var formData = new FormData();
//  formData.append('id',id);
    fetch('<?= yii\helpers\Url::to(['/ref-sub-skpd/getkode'])?>?id='+id,{
        method:'GET',
  //      body:JSON.stringify({id : id})
    })
            .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Pesan :' + response.statusText + ', Url : ' + response.url)
                    }
                })
               .then(function (data) {
             //       var dataJson = JSON.parse(data);
                    $("#tabelanjarincsearch-kd_urusan").val(data.kd_urusan);
                    $("#tabelanjarincsearch-kd_bidang").val(data.kd_bidang);
                    $("#tabelanjarincsearch-kd_unit").val(data.kd_unit);
                    $("#tabelanjarincsearch-kd_sub").val(data.kd_sub);
                })
               .catch(function(e){
                         console.log(e)
                     })
    }
    
    </script>