<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\RefSubSkpd;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaBelanjaRincSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Belanja';
$this->params['breadcrumbs'][] = $this->title;

$dataSubSkpd = yii\helpers\ArrayHelper::map(RefSubSkpd::find()->asArray()->all(),'id' ,'nm_sub_unit');
?>
<div class="ta-belanja-rinc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
    </p>
    <p>
       <?= GridView::widget([
        'dataProvider' => $dataProvider,
  //     'pjax' => true, 'pjaxSettings' => [ 'options' => [ 'enablePushState' => false, ] ],
       'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
              'header'=>'Kode Rekening',
                'value'=>function($data){
                return $data['kd_rek_1'].'.'.$data['kd_rek_2'].'.'.$data['kd_rek_3'].'.'.$data['kd_rek_4'].'.'.$data['kd_rek_5'];
                }
            ],
                         //   'id_penyelenggara',
            [
                'attribute' => 'id_skpd',
                'label' => 'Nama SKPD',
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'id_skpd',
                    'data' => $dataSubSkpd,
                    'options' => [
                        'placeholder' => 'Pilih Ukom',
                    ],
                  'pluginOptions' => [
        'allowClear' => true,
        
    ],
                ]),
                'format' => 'raw',
                'value' => function ($data) {

                        $skpd = app\models\RefSubSkpd::findOne($data['id_skpd'])->nm_sub_unit;
                    return $skpd;
                },
            ],
             'keterangan',
                    [
                     'header'=>'Pagu',
                        'value'=>function($data){
                            return Yii::$app->formatter->asDecimal($data['total'],2);
                        }
                    ],
            //'aktif',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update}'],
        ],
    ]); ?>    
    </p>
 

</div>
