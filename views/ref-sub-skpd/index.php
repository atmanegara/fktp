<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefSubSkpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Sub Skpds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-sub-skpd-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
//        'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

   //         'id',
     //       'kd_bidang',
       //     'kd_urusan',
         //   'kd_unit',
           // 'kd_sub',
            'nm_sub_unit:text:Nama Unit',
            //'aktif',

         ['class' => 'yii\grid\ActionColumn',
             'template'=>'{program} {kegiatan}',
             'buttons'=>[
                 'program'=>function($url,$data){
                 $url = yii\helpers\Url::to(['/ref-program/index','kd_urusan'=>$data['kd_urusan'],'kd_bidang'=>$data['kd_bidang'],'kd_unit'=>$data['kd_unit'],'kd_sub'=>$data['kd_sub']]);
                 return Html::a('Program', $url, ['class'=>'btn btn-flat btn-info']);
                 },
                         
                 'kegiatan'=>function($url,$data){
                 $url = yii\helpers\Url::to(['/ref-kegiatan/index','kd_urusan'=>$data['kd_urusan'],'kd_bidang'=>$data['kd_bidang'],'kd_unit'=>$data['kd_unit'],'kd_sub'=>$data['kd_sub']]);
                 return Html::a('Kegiatan', $url, ['class'=>'btn btn-flat btn-warning']);
                 }
             ]
             ],
        ],
    ]); ?>


</div>
