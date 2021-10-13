<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabel Program';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-program-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           [
               'header'=>'Kode',
               'value'=>function($data){
                return $data['kd_urusan'].' '.$data['kd_bidang'].$data['kd_urusan1'].' '.$data['kd_bidang1'].' '.$data['kd_unit'].' '.$data['kd_prog'];
               }
           ],
//            'kd_urusan',
//            'kd_bidang',
//            'kd_urusan1',
//            'kd_bidang1',   
//            'kd_unit',
//           'kd_prog',
            'ket_program',
            //'tahun',
            //'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
