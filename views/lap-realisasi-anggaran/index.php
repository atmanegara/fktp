<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LapRealisasiAnggaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lap Realisasi Anggarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-realisasi-anggaran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lap Realisasi Anggaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'header'=>'Bulan - Tahun',
                'value'=>function($data){
        $bulantahun = app\component\BulanComponent::NamaBulan($data['bulan']).' - '.$data['tahun'];
        return $bulantahun;       
        }
            ],
         [
             'header'=>'Nama SKPD',
             'value'=>function($data){
             $skpd = app\models\RefSubSkpd::findOne($data['id_skpd'])->nm_sub_unit;
             return $skpd;
             }
         ],
            'tgl_buat:text:Tanggal Buat Laporan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
