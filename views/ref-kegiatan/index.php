<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefKegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Kegiatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kegiatan-index">

  
    <p>
    <h1>Tabel Kegiatan</h1>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

   [
       'header'=>'Kode Keg',
       'value'=>function($data){
        $kd_bidang=$data['kd_bidang'];
        $kd_urusan=$data['kd_unit'];
        $kd_unit=$data['kd_unit'];
        $kd_sub=$data['kd_sub'];
        $kd_prog=$data['kd_prog'];
        $kd_keg=$data['kd_keg'];
        return $kd_bidang.'.'.$kd_urusan.'.'.$kd_unit.'.'.$kd_sub.'.'.$kd_prog.'.'.$kd_keg;
       }
   ],
           'ket_kegiatan',
            //'lokasi',
            //'sasaran',
         'pagu_anggaran',
            //'aktif',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
    ]); ?>


</div>
