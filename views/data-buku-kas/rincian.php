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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nourut',
            'tgl_transaksi',
            'nobukti',
       //     'id_ref_program',
            //'id_ref_sub_skpd',
            //'tahun',
            //'bulan',
            'pendapatan',
            'belanja',
            'saldo',
            //'notransaksi',
            //'nobukti',
            //'aktif',
        ],
    ]); ?>


</div>
