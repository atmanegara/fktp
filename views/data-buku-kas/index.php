<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataBukuKasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Buku Kas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-buku-kas-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
           'nm_unit',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{detail}',
                'buttons'=>[
                    'detail'=>function($url,$data){
//                        $url = Url::to(['index-buku-kas','id'])
        return Html::a('Detail', ['data-saldo','id_skpd'=>$data['id']],[
            'class'=>'btn btn-warning'
        ]);
                    }
                ]
                ],
        ],
    ]); ?>


</div>
